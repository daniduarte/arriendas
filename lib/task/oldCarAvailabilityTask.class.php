<?php

// Este task debería correr todos los días
// Este task revisa si mañana es feriado o fin de semana y envía un correo a los dueños
//  de autos disponibles, preguntando si su auto realmente estrará disponible el fin de semana.

// FALTA VER UNA FORMA DE NO ENVIAR DENUEVO LOS CORREOS SI EL TASK SE LLEGASE A CORRER AGAIN

class CarAvailabilityTask extends sfBaseTask {

    protected function configure() {

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'frontend'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine')
        ));

        $this->namespace = 'arriendas';
        $this->name = 'carAvailability';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
The [CarAvailability|INFO] task does things.
Call it with:

  [php symfony arriendas:carAvailability|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array()) {

        $config = ProjectConfiguration::getApplicationConfiguration("frontend", "prod", TRUE);
        sfContext::createInstance($config);

        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $conn = $databaseManager->getDatabase($options['connection'])->getConnection();

        try {

            $this->log("Chequeando...");

            $Holiday = Doctrine_Core::getTable("Holiday")->findOneByDate(date("Y-m-d"));
            if (date("N") == 6 || date("N") == 7 || $Holiday) {
                $this->log("Es fin de semana o festivo. Terminado");
                exit;
            }

            $week = array(
                1 => "Lunes",
                2 => "Martes",
                3 => "Miércoles",
                4 => "Jueves",
                5 => "Viernes",
                6 => "Sábado",
                7 => "Domingo"
            );

            $weekendDays = Utils::isWeekend(true);

            $daysCount = count($weekendDays);
            $daysPhrase = "";
            foreach ($weekendDays as $i => $day){

                if ($i > 0) {
                    
                    $daysPhrase .= $day;
                    
                    if ($i < $daysCount - 2) {
                        $daysPhrase .= ", ";
                    } elseif ($i < $daysCount - 1) {
                        $daysPhrase .= " y ";
                    }
                }
            }

            if ($options['env'] == 'dev') {
                $host = 'http://test.arriendas.cl';
            } else {
                $host = 'http://www.arriendas.cl';
            }

            $routing = $this->getRouting();
            $imageUrl = $host . $routing->generate('availabilityEmailOpen');

            $from .= " 12:00:00";
            $to   .= " 23:59:59";

            $q = Doctrine_Core::getTable("Car")
                ->createQuery('C')
                ->where('C.activo = 1')
                ->andWhere('C.seguro_ok = 4')
                ->andWhere('C.region = 13')
                /*->andWhereNotIn('C.id', array(398123))*/
                ->orderBy('C.ratio_aprobacion DESC');

            $Cars = $q->execute();

            $this->log(count($Cars)." autos encontrados");

            if (count($Cars) == 0) {
                $this->log("No hay autos disponibles");
                exit;
            }

            foreach ($Cars as $Car) {

                if (!$Car->hasReserve($from, $to)) {

                    $CarAvailabilityEmail = new CarAvailabilityEmail();

                    $CarAvailabilityEmail->setCar($Car);
                    $CarAvailabilityEmail->setSentAt(date("Y-m-d H:i:s"));
                    $CarAvailabilityEmail->save();

                    $url_all_ava  = $host . $routing->generate('availability', array(
                        'id' => $CarAvailabilityEmail->getId(),
                        'o' => 2,
                        'signature' => $CarAvailabilityEmail->getSignature()
                    ));

                    $url_one_ava  = $host . $routing->generate('availability', array(
                        'id' => $CarAvailabilityEmail->getId(),
                        'o' => 1,
                        'signature' => $CarAvailabilityEmail->getSignature()
                    ));

                    $url_cus_ava  = $host . $routing->generate('availability', array(
                        'id' => $CarAvailabilityEmail->getId(),
                        'o' => 0,
                        'signature' => $CarAvailabilityEmail->getSignature()
                    ));

                    $this->log("Enviando consulta a auto ID: ".$Car->getId());

                    $User = $Car->getUser();

                    $firstname = ucfirst(strtolower($User->getFirstname()));
                    $lastname = ucfirst(strtolower($User->getLastname()));

                    $subject = "¿Tienes disponibilidad para recibir clientes este fin de semana? [E".$CarAvailabilityEmail->getId()."]";

                    $body = "<p>".$firstname.",</p>";
                    $body .= "<p>Necesitaríamos que nos indiques en qué horarios podrías recibir clientes durante los próximos días.</p>";
                    $body .= "<ul>";
                    $body .= "<li>Si puedes recibir clientes el ".$daysPhrase." entre 8am y 8pm, has <a href='{$url_all_ava}'>click aquí</a>.</li>";
                    $body .= "<li>Si sólo puedes recibir clientes el ".$days[1]." entre 8am y 8pm, has <a href='{$url_one_ava}'>click aquí</a>.</li>";
                    $body .= "<li>Si puedes recibir clientes en horarios específicos, has <a href='{$url_cus_ava}'>click aquí</a>.</li>";
                    $body .= "</ul>";
                    $body .= "<p>Se te informará con un mínimo de 3 horas de anticipación para que puedas gestionar la entrega. Tu auto figurará como disponible para el pago, para reservas iniciadas en esos horarios.</p>";
                    $body .= "<br>";
                    $body .= "<p style='color: #aaa; font-size:14px; margin: 0; padding: 3px 0 0 0'>Atentamente</p>";
                    $body .= "<p style='color: #aaa; font-size:14px; margin: 0; padding: 3px 0 0 0'>Equipo Arriendas.cl</p>";
                    $body .= "<img src='{$imageUrl}?id={$CarAvailabilityEmail->getId()}'>";

                    $message = $this->getMailer()->compose();
                    $message->setSubject($subject);
                    $message->setBody($body, "text/html");
                    $message->setFrom('soporte@arriendas.cl', 'Soporte Arriendas.cl');
                    $message->setTo(array($User->getEmail() => $firstname." ".$lastname));
                    $message->setBcc(array(
                            "cristobal@arriendas.cl" => "Cristóbal Medina Moenne"
                        ));
                    
                    $this->getMailer()->send($message);
                } else {

                    $this->log("Auto ID: ".$Car->getId()." ya posee una reserva");
                }
            }
        } catch (Exeception $e) {

            Utils::reportError($e->getMessage(), "profile/CarAvailabilityTask");
        }
    }
}
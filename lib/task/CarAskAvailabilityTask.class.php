<?php

class CarAskAvailabilityTask extends sfBaseTask {

    protected function configure() {

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'frontend'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'local'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine')
        ));

        $this->namespace = 'car';
        $this->name = 'askAvailability';
        $this->briefDescription = 'Envía un correo preguntando por la disponibilidad del auto para el fin de semana o festivo';
        $this->detailedDescription = <<<EOF
The [CarAskAvailability|INFO] task does things.
Call it with:

  [php symfony car:askAvailability|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array()) {

        $config = ProjectConfiguration::getApplicationConfiguration("frontend", "prod", TRUE);
        $context = sfContext::createInstance($this->configuration);
        $context->getConfiguration()->loadHelpers('Partial');

        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $conn = $databaseManager->getDatabase($options['connection'])->getConnection();

        $host = 'http://local.arriendas.cl';
        if ($options['env'] == 'dev') {
            $host = 'http://dev.arriendas.cl';
        } elseif ($options['env'] == 'prod') {
            $host = 'http://www.arriendas.cl';
        }

        $days = null;

        $sentEmails = 0;

        try {

            $tomorrow = strtotime("+1 day");

            if (date("N", $tomorrow) == 6 || date("N", $tomorrow) == 7 || Doctrine_Core::getTable("Holiday")->findOneByDate(date("Y-m-d", $tomorrow))) {

                $this->log("[".date("Y-m-d H:i:s")."] Mañana ".date("Y-m-d", $tomorrow)." es fin de semana o festivo.");

                $days = Utils::isWeekend(true, true); // envio de viernes
                /*$days = Utils::isWeekend(true, false); // envio de sabado*/
            } else {
                $this->log("[".date("Y-m-d H:i:s")."] Mañana ".date("Y-m-d", $tomorrow)." NO es fin de semana o festivo.");
                exit;
            }

            $this->log("[".date("Y-m-d H:i:s")."] Buscando autos activos...");
            /*$oCars = Doctrine_Core::getTable("Car")->findCarsActives(false, false, true);*/
            $oCars = Doctrine_Core::getTable("Car")->findCarsActives(3, false, false); // TODOS
            $this->log("[".date("Y-m-d H:i:s")."] Autos encontrados: ".count($oCars));

            if ($oCars) {

                $routing = $this->getRouting();
                
                $from = $days[0] .= " 00:00:00";
                $to   = $days[count($days)-1] .= " 23:59:59";

                foreach ($oCars as $oCar) {
                    if (!$oCar->hasReserve($from, $to)) {

                        $CarAvailabilityEmail = new CarAvailabilityEmail();

                        $CarAvailabilityEmail->setCar($oCar);
                        $CarAvailabilityEmail->setSentAt(date("Y-m-d H:i:s"));
                        $CarAvailabilityEmail->save();

                        $imageUrl = $host . $routing->generate('car_availability_email_open', array("id" => $CarAvailabilityEmail->id));

                        $urlAllAva  = $host . $routing->generate('car_availability_email', array(
                            'id' => $CarAvailabilityEmail->getId(),
                            'o' => 2,
                            'signature' => $CarAvailabilityEmail->getSignature()
                        ));

                        $urlOneAva  = $host . $routing->generate('car_availability_email', array(
                            'id' => $CarAvailabilityEmail->getId(),
                            'o' => 1,
                            'signature' => $CarAvailabilityEmail->getSignature()
                        ));

                        $urlCusAva  = $host . $routing->generate('car_availability_email', array(
                            'id' => $CarAvailabilityEmail->getId(),
                            'o' => 0,
                            'signature' => $CarAvailabilityEmail->getSignature()
                        ));

                        $this->log("[".date("Y-m-d H:i:s")."] Enviando consulta a ".$oCar->getUser()->firstname." ".$oCar->getUser()->lastname." Car ".$oCar->getId());                        

                        $subject = "¿Tienes disponibilidad para recibir clientes este fin de semana? [E".$CarAvailabilityEmail->getId()."]";
                        $body    = get_partial('emails/carAskAvailabilityMailingWeek', array(
                            'Car' => $oCar,
                            'days' => $days,
                            'imageUrl' => $imageUrl,
                            'urlAllAva' => $urlAllAva,
                            'urlOneAva' => $urlOneAva,
                            'urlCusAva' => $urlCusAva,
                            'urlMisAutos' => $routing->generate('cars')
                        ));
                        $from  = array("soporte@arriendas.cl" => "Soporte Arriendas.cl");
                        $to    = array($oCar->getUser()->email => $oCar->getUser()->firstname." ".$oCar->getUser()->lastname);

                        $message = $this->getMailer()->compose();
                        $message->setSubject($subject);
                        $message->setBody($body, 'text/html');
                        $message->setFrom($from);
                        /*$message->setTo($to);*/
                        $message->setBcc(array(
                            "cristobal@arriendas.cl" => "Cristóbal Medina Moenne",
                            "franco.inostrozah@gmail.com" => "Franco Inostroza Hinojoza"
                            /*"francofre@arriendas.cl" => "Francisca Cofré Ulloa"*/
                        ));
                        
                        $this->getMailer()->send($message);

                        $sentEmails++;
                    } else {
                        $this->log("[".date("Y-m-d H:i:s")."] Car ".$oCar->getId()." ya posee una reserva para el fin de semana");
                    }
                }

                $this->log("[".date("Y-m-d H:i:s")."] Emails enviados: ".$sentEmails);

            } else {
                $this->log("[".date("Y-m-d H:i:s")."] No se encontraron autos para solicitar disponibilidad");
            }

        } catch (Exception $e) {
            $this->log("[".date("Y-m-d H:i:s")."] ERROR: ".$e->getMessage());
            Utils::reportError($e->getMessage(), "CarAskAvailabilityTask");
        }
    }
}
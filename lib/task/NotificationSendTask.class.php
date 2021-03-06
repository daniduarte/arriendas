<?php

class NotificationSendTask extends sfBaseTask {

    protected function configure() {

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'frontend'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'local'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine')
        ));

        $this->namespace = 'notification';
        $this->name = 'send';
        $this->briefDescription = 'Envía las notificaciones pendientes de la tabla UserNotification';
        $this->detailedDescription = <<<EOF
The [send|INFO] task does things.
Call it with:

  [php symfony notification:send|INFO]
EOF;
    }



    protected function execute($arguments = array(), $options = array()) {

        $config = ProjectConfiguration::getApplicationConfiguration("frontend", "prod", TRUE);
        sfContext::createInstance($config);
        $context = sfContext::createInstance($this->configuration);
        $context->getConfiguration()->loadHelpers('Partial');

        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

        // contadores 
        $countoTotalNotification    = count($UsersNotifications);

        $countBar                   = 0;
        $countBarPropietario        = 0;

        $countSMS                   = 0;
        $countSMSPropietario        = 0;

        $countEmail                 = 0;
        $countEmailPropietario      = 0;

        $countSoporte               = 0;
        $countError                 = 0;

        $countDefaults              = 0;

        $countSents                 = 0;
        $countNotActive             = 0;

        try {
            $this->log("[".date("Y-m-d H:i:s")."] Buscando notificaciones por enviar");
            $startTime = microtime(true);

            $UsersNotifications = Doctrine_core::getTable("UserNotification")->findBySentAtAsNull();

            $countoTotalNotification = count($UsersNotifications);
            $this->log("[".date("Y-m-d H:i:s")."] ".count($UsersNotifications). " notificaciones encontradas");

            if (count($UsersNotifications) > 0) {
                foreach ($UsersNotifications as $UserNotification) {

                    $alreadySent = true;

                    $User         = $UserNotification->getUser();
                    $Reserve      = $UserNotification->getReserve();
                    $Notification = $UserNotification->getNotification();   
                    $Action       = $Notification->getAction();
                    $Type         = $Notification->getNotificationType();

                    if($Reserve){
                        $Owner = $Reserve->getCar()->getUser();

                        $OwnerTitle   = Notification::translator($User->id, $Notification->message_title, $Reserve ? $Reserve->id : null );
                        $OwnerNotificationMessage = Notification::translator($User->id, $Notification->message, $Reserve ? $Reserve->id : null );
                    } else {
                        $OwnerTitle = Notification::translator($User->id, $Notification->message_title, $Reserve ? $Reserve->id : null );
                        $OwnerNotificationMessage = Notification::translator($User->id, $Notification->message, $Reserve ? $Reserve->id : null );
                    }

                    $UserTitle   = Notification::translator($User->id, $Notification->message_title, $Reserve ? $Reserve->id : null );
                    $UserNotificationMessage = Notification::translator($User->id, $Notification->message, $Reserve ? $Reserve->id : null );

                    if($Notification->is_active && $Action->is_active && $Type->is_active) {
                        switch ($Type->id) {

                            case 1:
                                // tipo de notificacion BARRA
                                // se ejecuta a traves de un filtro
                                $countBar++;
                                break;

                            case 2:
                                // tipo de notificacion SMS
                                $SMS = new SMS("Arriendas");

                                // si el titulo es diferente de null o vacío, le añade un salto de linea.
                                if ($UserTitle) {
                                    $UserTitle = $UserTitle.chr(0x0D).chr(0x0A);
                                } else {
                                    $UserTitle = "";
                                }

                                if ($options["env"] != "prod") {

                                    $SMS->send($UserTitle.$UserNotificationMessage, "66010666");
                                } else {

                                    $SMS->send($UserTitle.$UserNotificationMessage, $User->telephone);
                                }
                                

                                $countSMS++;
                                break;

                            case 3:
                                // tipo de notificacion EMAIL USUARIO


                                $subject = $UserTitle;
                                $body    = nl2br($UserNotificationMessage);
                                $from    = array("no-reply@arriendas.cl" => "Notificaciones Arriendas.cl");

                                if ($options["env"] != "prod") {

                                    $to      = array("franco.inostrozah@gmail.com", "rgrimoldi@gmail.com");
                                } else {

                                    $to      = array($User->email => $User->firstname." ".$User->lastname);
                                }

                                $message = Swift_Message::newInstance();
                                $message->setSubject($subject);
                                $message->setBody($body, 'text/html');
                                $message->setFrom($from);
                                $message->setTo($to);
                                $message->setReplyTo(array("ayuda@arriendas.cl" => "Ayuda Arriendas.cl"));
                                //$message->setBcc(array("cristobal@arriendas.cl" => "Cristóbal Medina Moenne"));
                                
                                $this->getMailer()->send($message);

                                $countEmail++;
                                break;

                             /*case 10:
                                if($Reserve) {
                                    // tipo de notificacion BARRA PROPIETARIO
                                    // se ejecuta a traves de un filtro
                                    $countBarPropietario++;
                                }
                                break;*/


                            /*case 11:
                                // tipo de notificacion SMS PROPIETARIO
                                if($Reserve) {
                                      $SMS = new SMS("Arriendas");

                                    // si el titulo es diferente de null o vacío, le añade un salto de linea.
                                    if ($OwnerTitle) {
                                        $OwnerTitle = $OwnerTitle.chr(0x0D).chr(0x0A);
                                    } else {
                                        $OwnerTitle = "";
                                    }

                                    $SMS->send($OwnerTitle.$OwnerNotificationMessage, $Owner->telephone);

                                    $countSMSPropietario++;
                                }
                                break;

                            case 4:
                                // tipo de notificacion EMAIL PROPIETARIO
                                if($Reserve) {
                                    $mail    = new Email();
                                    $mailer  = $mail->getMailer();
                                    $message = $mail->getMessage(); 

                                    $subject = $OwnerTitle;
                                    $body    = $OwnerNotificationMessage;
                                    $from    = array("no-reply@arriendas.cl" => "Notificaciones Arriendas.cl");
                                    $to      = array($Owner->email => $Owner->firstname." ".$Owner->lastname);

                                    $message->setSubject($subject);
                                    $message->setBody($body, 'text/html');
                                    $message->setFrom($from);
                                    $message->setTo($to);
                                    $message->setReplyTo(array("ayuda@arriendas.cl" => "Ayuda Arriendas.cl"));
                                    //$message->setBcc(array("cristobal@arriendas.cl" => "Cristóbal Medina Moenne"));
                                    
                                    $mailer->send($message);

                                    $countEmailPropietario++;
                                }
                                break;

                            
                            case 5:
                                // tipo de notificacion SOPORTE
                                $mail    = new Email();
                                $mailer  = $mail->getMailer();
                                $message = $mail->getMessage();     

                                $subject = $UserTitle;
                                $body    = $UserNotificationMessage;
                                $from    = array("no-reply@arriendas.cl" => "Notificaciones Arriendas.cl");
                                $to      = array("soporte@arriendas.cl" => "Soporte Arriendas.cl");

                                $message->setSubject($subject);
                                $message->setBody($body, 'text/html');
                                $message->setFrom($from);
                                $message->setTo($to);
                                //$message->setBcc(array("cristobal@arriendas.cl" => "Cristóbal Medina Moenne"));
                                
                                $mailer->send($message);
                                $countSoporte++;
                                break;

                            case 6:
                                // tipo de notificacion ERROR
                                $mail    = new Email();
                                $mailer  = $mail->getMailer();
                                $message = $mail->getMessage();     

                                $subject = $UserTitle;
                                $body    = $UserNotificationMessage;
                                $from    = array("no-reply@arriendas.cl" => "Notificaciones Arriendas.cl");
                                $to      = array("cristobal@arriendas.cl" => "Cristóbal Medina Moenne");

                                $message->setSubject($subject);
                                $message->setBody($body, 'text/html');
                                $message->setFrom($from);
                                $message->setTo($to);
                                //$message->setBcc(array("cristobal@arriendas.cl" => "Cristóbal Medina Moenne"));
                                
                                $mailer->send($message);
                                $countError++;
                                break;*/
                              
                            default:
                                $alreadySent = false;
                                $countDefaults++;
                                break;
                        }

                        if ($alreadySent) {
                            $UserNotification->setSentAt(date("Y-m-d H:i:s"));
                            $UserNotification->save();
                            $countSents++;
                        }
                    } else {
                        $countNotActive++;
                    }
                     // Mensaje Log
                    $txtNotificationId  = str_pad("Notificacion ID: ".$Notification->id, 20);
                    $txtAction          = str_pad("Accion: ".$Action->name, 15);
                    $txtType            = str_pad("Tipo: ".$Type->name, 15);
                    $txtUser            = str_pad("Usuario ID: ".$User->id. "(".$User->firstname." ".$User->lastname.")",10);
                    $this->log($txtNotificationId.$txtAction.$txtType.$txtUser);      
                }
            } else {
                $this->log("[".date("Y-m-d H:i:s")."] No hay notificaciones por enviar");
            }

        } catch (Exeception $e) {
            $this->log("[".date("Y-m-d H:i:s")."] [NotificationSendTask] ERROR: ".$e->getMessage());
        }

        $endTime = microtime(true);

        $this->log("[".date("Y-m-d H:i:s")."] ---------------------------------------------------");
        $this->log("[".date("Y-m-d H:i:s")."] Total Notificaciones pendientes:          ".$countoTotalNotification);
        $this->log("[".date("Y-m-d H:i:s")."] ---------------------------------------------------");
        $this->log("[".date("Y-m-d H:i:s")."] Total Notificaciones de tipo desconocido: ".$countDefaults);
        $this->log("[".date("Y-m-d H:i:s")."] ");
        $this->log("[".date("Y-m-d H:i:s")."] ");
        $this->log("[".date("Y-m-d H:i:s")."] ---------------------------------------------------");
        $this->log("[".date("Y-m-d H:i:s")."] Total Notificaciones enviadas:            ".$countSents);
        $this->log("[".date("Y-m-d H:i:s")."] ---------------------------------------------------");
        $this->log("[".date("Y-m-d H:i:s")."] Total Notificaciones tipo Barra:          ".$countBar);
        $this->log("[".date("Y-m-d H:i:s")."] Total Notificaciones tipo SMS:            ".$countSMS);
        $this->log("[".date("Y-m-d H:i:s")."] Total Notificaciones tipo Email:          ".$countEmail);
        $this->log("[".date("Y-m-d H:i:s")."] ---------------------------------------------------");
        $this->log("[".date("Y-m-d H:i:s")."] ---------------------------------------------------");
        $this->log("[".date("Y-m-d H:i:s")."] Total Notificaciones tipo Barra propietario:   ".$countBarPropietario);
        $this->log("[".date("Y-m-d H:i:s")."] Total Notificaciones tipo SMS propietario:     ".$countSMSPropietario);
        $this->log("[".date("Y-m-d H:i:s")."] Total Notificaciones tipo Email propietario:   ".$countEmailPropietario);
        $this->log("[".date("Y-m-d H:i:s")."] ");
        $this->log("[".date("Y-m-d H:i:s")."] ");
        $this->log("[".date("Y-m-d H:i:s")."] Total Notificaciones tipo Soporte:        ".$countSoporte);
        $this->log("[".date("Y-m-d H:i:s")."] Total Notificaciones tipo Error:          ".$countError);
        $this->log("[".date("Y-m-d H:i:s")."] ");
        $this->log("[".date("Y-m-d H:i:s")."] ");
        $this->log("[".date("Y-m-d H:i:s")."] Total Notificaciones no activadas:        ".$countNotActive);

        $this->log("[".date("Y-m-d H:i:s")."] Tiempo total de procesamiento     ".round($endTime-$startTime, 2)." segundos");
    }
}
<?php

/**
 * Reserve
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    CarSharing
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Reserve extends BaseReserve {

    
    public function getFechaInicio2() {

        return date("Y-m-d H:i:s", strtotime($this->getDate()));
    }

    public function getFechaTermino2() {
        
        return date("Y-m-d H:i:s", strtotime("+".$this->getDuration()." hour", strtotime($this->getDate())));
    }

    public function getChangeOptions($withOriginalReserve = true) {

        $ChangeOptions = array();

        $q = Doctrine_Core::getTable("Reserve")
            ->createQuery('R')
            ->innerJoin('R.Transaction T')
            ->where('R.user_id = ?', $this->getUser()->id)
            ->andWhere('R.fecha_pago IS NOT NULL')
            ->andWhere('DATE_FORMAT(R.date, "%Y-%m-%d %H:%i") = ?', date("Y-m-d H:i", strtotime($this->date)))
            ->orderBy('T.completed DESC')
            ->addOrderBy('R.fecha_reserva ASC');

        $Reserves = $q->execute();
        
        foreach ($Reserves as $Reserve) {
            if ($Reserve->getReservaOriginal() == 0) {
                if ($withOriginalReserve) {
                    $ChangeOptions[] = $Reserve;
                }
            } elseif (!$Reserve->getCar()->hasReserve($this->getFechaInicio2(), $this->getFechaTermino2(), $this->getUserId())) {
                $ChangeOptions[] = $Reserve;
            }
        }
        
        return $ChangeOptions;
    }

    public function getRentalPrice() {

        $Car = $this->getCar();

        return CarTable::getPrice(
            $this->getFechaInicio2(),
            $this->getFechaTermino2(),
            $Car->getPricePerHour(),
            $Car->getPricePerDay(),
            $Car->getPricePerWeek(),
            $Car->getPricePerMonth()
        );
    }

    public function getSelectedCar() {

        $q = Doctrine_Core::getTable("Reserve")
            ->createQuery('R')
            ->innerJoin('R.Transaction T')
            ->where('R.user_id = ?', $this->getUser()->id)
            ->andWhere('DATE(R.date) = ?', date("Y-m-d", strtotime($this->date)))
            ->andWhere('T.completed = 1');

        return $q->fetchOne()->getCar();
    }

    public function getSignature() {

        return md5("Arriendas ~ ".$this->getDate());
    }

    // Métodos estáticos

    public static function calcularMontoLiberacionGarantia($price, $from, $to) {

        $duration = floor((strtotime($to) - strtotime($from))/3600);
        $days     = floor($duration/24);
        $hours    = $duration%24;
        
        if ($hours >= 6) {
            if ($days) {
                $total = ($days * $price) + $price;
            } else {
                $total = $price;
            }            
        } else {
            if ($days) {
                $total = ($days * $price) + (($hours/6) * $price);
            } else {
                $total = ($hours/6) * $price;
            }
        }

        return round($total);
    }

    public static function getPaidReserves($userId) {
        
        $q = Doctrine_Core::getTable("Reserve")
            ->createQuery('R')
            ->innerJoin('R.Transaction T')
            ->innerJoin('R.Car C')
            ->where('C.user_id = ?', $userId)
            /*->andWhere('R.confirmed = 0')*/
            ->andWhere('R.canceled = 0')
            ->andWhere("T.completed = 1")
            ->andWhere('NOW() < DATE_ADD(R.date, INTERVAL R.duration+4 HOUR)')
            ->addOrderBy("R.fecha_reserva ASC");

        return $q->execute();
    }

    public static function getReservesByUser($userId) {

        $q = Doctrine_Core::getTable("Reserve")
            ->createQuery('R')
            ->innerJoin('R.Transaction T')
            ->where('R.user_id = ?', $userId)
            ->andWhere("T.completed = 1")
            ->andWhere('NOW() < DATE_ADD(R.date, INTERVAL R.duration+4 HOUR)');

        return $q->execute();
    }

    //////////////////////////////////////////////////////////////////
    
    public function calcularIVA() {
        //Variable que define el IVA actual
        //TODO: modificar la obtenci�n de la variable IVA
        $iva = 1.19;
    }

    public function getFechaInicio() {
        $entrega = $this->getDate();
        $entrega = strtotime($entrega);
        $fechaEntrega = date("d/m/y", $entrega);
        return $fechaEntrega;
    }

    public function getHoraInicio() {
        $entrega = $this->getDate();
        $entrega = strtotime($entrega);
        $horaEntrega = date("H:i", $entrega);
        return $horaEntrega;
    }

    public function getFechaTermino() {
        $entrega = $this->getDate();
        $duracion = $this->getDuration();
        $entrega = strtotime($entrega);
        $fechaDevolucion = date("d/m/y", $entrega + ($duracion * 60 * 60));
        return $fechaDevolucion;
    }

    public function getHoraTermino() {
        $entrega = $this->getDate();
        $duracion = $this->getDuration();
        $entrega = strtotime($entrega);
        $horaDevolucion = date("H:i", $entrega + ($duracion * 60 * 60));
        return $horaDevolucion;
    }

    public function getTiempoArriendoTexto() {
        $duracion = $this->getDuration();

        $dias = floor($duracion / 24);
        $horas = $duracion % 24;

        //echo $dias." ".$horas."<br>";

        if ($dias == 0) {
            $dias = "";
        } elseif ($dias == 1) {
            $dias = $dias . " día";
        } else {
            $dias = $dias . " días";
        }
        //$dias = mb_convert_encoding($dias, 'utf-8');

        if ($horas == 0) {
            $horas = "";
        } elseif ($horas == 1) {
            $horas = $horas . " hora";
        } else {
            $horas = $horas . " horas";
        }

        if ($dias == "") {
            return $horas;
        }
        if ($horas == "") {
            return $dias;
        }

        return $dias . " y " . $horas;
    }

    //Metodo utilizado para crear un registro de calificacion dentro de nuestra tabla, que se habilitar�
    //una vez que la reserva sea pagada
    public function habilitarCalificacion() {
        //Obtenemos la fecha de la reserva y su duraci�n para determinar la fecha desde que estar� habilitada
        //la calificacion. La regla es que esta estar� disponible 2 horas tras el termino de la reserva
        $fecha_reserva = $this->getDate();
        $duracion = $this->getDuration();
        //Convertimos la fecha a timestamp
        $timestamp = strtotime($fecha_reserva);
        $timestamp = 60 * 60 * ($duracion + 2);
        $rating = new Rating();
        $rating->setIdRenter($this->getUserId());
        //Obtenemos el ID del propietario
        $car = Doctrine_Core::getTable("car")->findOneById($this->getCarId());
        $rating->setIdOwner($car->getUserId());
        $rating->setFechaHabilitadaDesde($this->formatearHoraChilena(strftime("%Y-%m-%d %H:%M:%S")), $timestamp);
        $rating->save();
        $this->setRatingId($rating->getId());
        $this->save();
    }

    public function formatearHoraChilena($fecha) {
        $horaChilena = strftime("%Y-%m-%d %H:%M:%S", strtotime('-4 hours', strtotime($fecha)));
        return $horaChilena;
    }

    public function encolarMailCalificaciones() {
        $mailCalificaciones = new MailCalificaciones();
        $mailCalificaciones->setReserveId($this->getId());
        $mailCalificaciones->setDate($this->getFechaHabilitacionRating());
        $mailCalificaciones->save();
    }

    //si es el que arrienda: fecha_pago - fecha_confirmacion
    public function getTiempoRespuestaArrendador() {

        $q = "SELECT fecha_confirmacion, fecha_pago FROM reserve WHERE id=" . $this->getId();
        $query = Doctrine_Query::create()->query($q);
        $autos = $query->toArray();

        $fechaPago = $autos[0]['fecha_pago'];
        $fechaConfirmacion = $autos[0]['fecha_confirmacion'];

        if ($fechaPago == null || $fechaConfirmacion == null) {
            return 0;
        }

        $fechaPago = strtotime($fechaPago);
        $fechaConfirmacion = strtotime($fechaConfirmacion);

        //echo $fechaPago - $fechaConfirmacion;
        //tiempo en minutos
        $duracion = $fechaPago - $fechaConfirmacion;

        return $duracion;
    }

    //si el al que le arriendan: fecha_confirmacion - fecha_reserva
    public function getTiempoRespuestaArrendatario($idCar) {

        $q = "SELECT fecha_confirmacion, fecha_reserva FROM reserve WHERE car_id=" . $idCar;
        $query = Doctrine_Query::create()->query($q);
        $autos = $query->toArray();

        $duracion[0] = 0;

        for ($i = 0; $i < count($autos); $i++) {
            $fechaReseva = $autos[0]['fecha_reserva'];
            $fechaConfirmacion = $autos[0]['fecha_confirmacion'];

            if ($fechaReseva == null || $fechaConfirmacion == null) {
                return 0;
            }

            $fechaReseva = strtotime($fechaReseva);
            $fechaConfirmacion = strtotime($fechaConfirmacion);

            $duracion[$i] = $fechaConfirmacion - $fechaReseva;
        }

        return $duracion;
    }

    public function getMarcaModelo() {
        $car = Doctrine_Core::getTable('car')->findOneById($this->getCarId());
        return $car->getMarcaModelo();
    }

    public function getEmailRenter() {
        $user = Doctrine_Core::getTable('user')->findOneById($this->getUserId());
        return $user->getUsername();
    }

    public function getCorreoRenter() {
        $user = Doctrine_Core::getTable('user')->findOneById($this->getUserId());
        return $user->getEmail();
    }

    public function getTypeCar() {
        $car = Doctrine_Core::getTable('car')->findOneById($this->getCarId());
        return $car->getUsoVehiculoId();
    }

    public function getPricePerDayCar() {
        $car = Doctrine_Core::getTable('car')->findOneById($this->getCarId());
        return $car->getPricePerDay();
    }

    public function getNameRenter() {
        $user = Doctrine_Core::getTable('user')->findOneById($this->getUserId());
        return $user->getFirstname();
    }

    public function getLastNameRenter() {
        $user = Doctrine_Core::getTable('user')->findOneById($this->getUserId());
        return $user->getLastname();
    }

    public function getEmailOwner() {
        $q = "SELECT u.username FROM user u, car c, reserve r WHERE u.id=c.user_id and c.id=r.car_id and r.id=" . $this->getId();
        $query = Doctrine_Query::create()->query($q);
        $owner = $query->toArray();
        return $owner[0]['username'];
    }

    public function getEmailOwnerCorreo() {
        $q = "SELECT u.email FROM user u, car c, reserve r WHERE u.id=c.user_id and c.id=r.car_id and r.id=" . $this->getId();
        $query = Doctrine_Query::create()->query($q);
        $owner = $query->toArray();
        return $owner[0]['email'];
    }

    public function getNameOwner() {
        $q = "SELECT u.firstname, u.lastname FROM user u, car c, reserve r WHERE u.id=c.user_id and c.id=r.car_id and r.id=" . $this->getId();
        $query = Doctrine_Query::create()->query($q);
        $owner = $query->toArray();
        return $owner[0]['firstname'];
    }

    public function getLastnameOwner() {
        $q = "SELECT u.firstname, u.lastname FROM user u, car c, reserve r WHERE u.id=c.user_id and c.id=r.car_id and r.id=" . $this->getId();
        $query = Doctrine_Query::create()->query($q);
        $owner = $query->toArray();
        return $owner[0]['lastname'];
    }

    public function getRutOwner() {
        $q = "SELECT u.rut FROM user u, car c, reserve r WHERE u.id=c.user_id and c.id=r.car_id and r.id=" . $this->getId();
        $query = Doctrine_Query::create()->query($q);
        $owner = $query->toArray();
        return $owner[0]['rut'];
    }

    public function getAddressCar() {
        $car = Doctrine_Core::getTable('car')->findOneById($this->getCarId());
        return $car->getAddress();
    }

    public function getOwner() {
        $car    = Doctrine_Core::getTable('car')->findOneById($this->getCarId());
        $owner  = Doctrine_Core::getTable('user')->findOneById($car->getUserId());
        return $owner;
    }

    public function getRenter() {
        $user = Doctrine_Core::getTable('user')->findOneById($this->getUserId());
        return $user;
    }

    public function getTelephoneRenter() {
        $user = Doctrine_Core::getTable('user')->findOneById($this->getUserId());
        return $user->getTelephone();
    }

    public function getConfirmedSMSRenter() {
        $user = Doctrine_Core::getTable('user')->findOneById($this->getUserId());
        return $user->getConfirmedSms();
    }

    public function getTelephoneOwner() {
        $q = "SELECT u.telephone FROM user u, car c, reserve r WHERE u.id=c.user_id and c.id=r.car_id and r.id=" . $this->getId();
        $query = Doctrine_Query::create()->query($q);
        $owner = $query->toArray();
        return $owner[0]['telephone'];
    }

    public function getConfirmedSMSOwner() {
        $q = "SELECT u.confirmed_sms FROM user u, car c, reserve r WHERE u.id=c.user_id and c.id=r.car_id and r.id=" . $this->getId();
        $query = Doctrine_Query::create()->query($q);
        $owner = $query->toArray();
        return $owner[0]['confirmed_sms'];
    }

    public function getIdOwner() {
        $q = "SELECT u.id FROM user u, car c, reserve r WHERE u.id=c.user_id and c.id=r.car_id and r.id=" . $this->getId();
        $query = Doctrine_Query::create()->query($q);
        $owner = $query->toArray();
        return $owner[0]['id'];
    }

    public function getIdRenter() {
        $user = Doctrine_Core::getTable('user')->findOneById($this->getUserId());
        return $user->getId();
    }

    public function getFechaHabilitacionRating() {
        $entrega = $this->getDate();
        $duracion = $this->getDuration();
        $entrega = strtotime($entrega) + ($duracion + 2) * 60 * 60;
        return date("Y-m-d H:i:s", $entrega);
    }

    /**
     * Check if the reserve is ready for initialize.
     * @return boolean isReady.
     */
    public function isReadyForInitialize() {
        $isReady = TRUE;
        $transaction = $this->getTransaction();
        if (is_null($transaction)) {
            $isReady = FALSE;
        } elseif (date("Y-m-d", strtotime ($this->getDate())) != date("Y-m-d")) {
            $isReady = FALSE;
        } elseif (!$transaction->getCompleted()) {
            $isReady = FALSE;
        }

        return $isReady;
    }
    
    /**
     * Check if the reserve is ready for finalize.
     * @return boolean isReady.
     */
    public function isReadyForFinalize() {
        $isReady = TRUE;
        
        if (!$this->getInicioArriendoOk()) {
            $isReady = FALSE;
        }

        return $isReady;
    }

   /* public function save(Doctrine_Connection $conn = null) {

        $this->setUniqueToken();

        return parent::save($conn);
    }*/
    
    public function setUniqueToken($replace = false){
        
        $iterate = true;
        $iteration = 1;
        $max_iterations = 10;        
        
        if (!$this->token || $replace) {
            while ($iterate) {
                
                $token = sha1($this->getDuration() . rand(11111, 99999));

                if (!Doctrine_Core::getTable('Reserve')->findOneBy('token', $token)) {
                    $this->setToken($token);
                    $iterate = false;
                }

                if ($iteration == $max_iterations) {
                    Utils::reportError("No se pudo definir un token para Reserve ".$this->id, "Reserve/setUniqueToken");
                    $iterate = false;
                }

                $iteration++;
            }            
        }
    }    
}

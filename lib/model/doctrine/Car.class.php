<?php

class Car extends BaseCar {

  public function getQuantityOfLatestRents($date = null ) { 

      if($date == null) {
        $date = date("Y-m-d H:i:s", strtotime("-2 month"));
      }

      $q = Doctrine_Core::getTable("Reserve")
          ->createQuery('R')
          ->innerJoin('R.Transaction T')
          ->where('R.confirmed = 1')
          ->andWhere('T.completed = 1')
          ->andWhere('R.car_id = ?', $this->id)
          ->andWhere('T.date >= ?', $date)
          ->andWhere('T.date <= Now()');

      $cant = $q->execute();

      return count($cant);
  }   

  public function getExistPatent($patent = false, $idCar = false){

      $q = Doctrine_Core::getTable("Car")
          ->createQuery('C')
          ->where('C.patente = ?', $patent);
          

      if($idCar){
            $q->andWhere('C.id != ?', $idCar);
      }
     

      return $q->execute();
  }
  
  public function getCurrentCarAvailabilityEmails() {

      $q = Doctrine_Core::getTable("CarAvailabilityEmail")
          ->createQuery('CAE')
          ->where('CAE.car_id = ?', $this->getId())
          ->andWhere("NOW() > CAE.sent_at")
          ->andWhere("NOW() < CAE.ended_at")
          ->andWhere("CAE.checked_at IS NOT NULL");

      return $q->execute();
  }

  public function getNearestMetro() {

      $q = Doctrine_Core::getTable("CarProximityMetro")
          ->createQuery('CPM')
          ->where('CPM.car_id = ?', $this->id)
          ->orderBy('CPM.distance ASC');

      return $q->fetchOne();
  }

  public function getOpportunities() {

      $maxDistance = 4;
      $maxOpportunitiesAllowed = 5;
      $Opportunities = array();

      // Obtención de reservas que cuenten con las características
      $q = Doctrine_Core::getTable("Reserve")
          ->createQuery('R')
          ->innerJoin('R.Transaction T')
          ->innerJoin('R.Car C')
          ->innerJoin('C.Model M')
          ->where('C.user_id != ?', $this->getUser()->id)
          ->andWhere('C.activo = 1')
          ->andWhere('C.seguro_ok = 4')
          ->andWhere('R.confirmed = 0')
          ->andWhere('R.comentario = "null"') // Es original
          ->andWhere('NOW() < DATE_ADD(R.date, INTERVAL 2 HOUR)')
          ->andWhere('T.completed = 1')
          ->andWhere('C.transmission = ?', $this->transmission)
          ->andWhere('distancia(C.lat, C.lng, ?, ?) < ?', array($this->lat, $this->lng, $maxDistance))
          ;
      
      if ($this->getModel()->getIdOtroTipoVehiculo() == 2) {
          $q->andWhere('M.id_otro_tipo_vehiculo IN (1,2)');
      } else {
          $q->andWhere('M.id_otro_tipo_vehiculo = ?', $this->getModel()->getIdOtroTipoVehiculo());  
      }

      $Reserves = $q->execute();

      // Revisamos que las reservas no tengan ya el máximo de oportunidades permitidas y
      // Revisamos que el auto no tenga ya una reserva confirmada en la fecha de la oportunidad
      foreach ($Reserves as $k => $Reserve) {

          $ChangeOptions = $Reserve->getChangeOptions(false);

          if (count($ChangeOptions) < $maxOpportunitiesAllowed && 
              !$this->hasReserve($Reserve->getFechaInicio2(), $Reserve->getFechaTermino2())) {

              // Revisamos que el usuario no haya ya postulado a la oportunidad
              $itsPresent = false;
              foreach ($ChangeOptions as $l => $CO) {
                  if ($CO->getCar()->getUser()->id == $this->getUser()->id) {
                      $itsPresent = true;
                      break;
                  }
              }

              if (!$itsPresent) {
                  $Opportunities[] = $Reserve;
              }
          }
      }

      return $Opportunities;
  }

    public function hasAvailability($date) {

        $q = Doctrine_Core::getTable("CarAvailability")
            ->createQuery('CA')
            ->where('CA.car_id = ?', $this->id);

        if (is_array($date)) {
            $q->andWhereIn('CA.day', implode(',', $date));
        } else {
            $q->andWhere('CA.day = ?', date("Y-m-d", strtotime($date)));
            $q->andWhere('? BETWEEN CA.started_at AND CA.ended_at', date("H:i:s", strtotime($date)));
        }

        $checkAvailability = $q->execute();

        if (count($checkAvailability)) {
            return true;
        }

        return false;
    }


  public function hasReserve($from, $to, $userId = false) {
      
      $q = Doctrine_Core::getTable("Reserve")
          ->createQuery('R')
          ->innerJoin('R.Transaction T')
          ->where('T.completed = 1')
          ->andWhere('R.canceled = 0')
          ->andWhere('R.car_id = ?', $this->id)
          ->andWhere('
              ? BETWEEN R.date AND DATE_ADD(R.date, INTERVAL R.duration HOUR)
              OR ? BETWEEN R.date AND DATE_ADD(R.date, INTERVAL R.duration HOUR)
              OR R.date BETWEEN ? AND ?
              OR DATE_ADD(R.date, INTERVAL R.duration HOUR) BETWEEN ? AND ?
          ', array($from, $to, $from, $to, $from, $to));

      if ($userId) {
        $q->andWhere('R.user_id != ?', $userId);
      }

      $checkAvailability = $q->execute();

      if (count($checkAvailability) == 0) {
          return false;
      }

      return true;
  }
  
  // Métodos estáticos

  public static function getTime($from, $to) {

      $from = date("Y-m-d H:i:s", strtotime($from));
      $to   = date("Y-m-d H:i:s", strtotime($to));

      $duration = Utils::calculateDuration($from, $to);
      $hours    = $duration % 24;
      $days     = floor($duration) - $hours;

      if ($hours >= 6) {
          $days = $days + 24;
          $hours = 0;
      }
      return floor($days + $hours);
  }

  public static function getReviews($id) {

      $q = Doctrine_Query::create()
          ->select("R.opinion_about_owner AS opinion, U.picture_file AS picture")
          ->from("Car C")
          ->innerJoin("Rating R ON R.IdOwner = C.user_id")
          ->innerJoin("User U ON U.id = R.IdRenter")
          ->where("C.id = ?", $id);

          /*"SELECT R.opinion_about_owner AS opinion, U.picture_file AS picture
          FROM Car C
          INNER JOIN Rating R ON R.IdOwner = C.user_id
          INNER JOIN User U ON R.IdRenter = U.id
          WHERE C.id = ".$id;*/

      return $q->execute()->toArray();
  }

/////////////////////////////////////////////////////////
 
  //TODO
  public function ingresarCalificacion($idUsuario, $recomienda, $comentarioRecomienda, $desperfecto, $comentarioDesperfecto,
                       $limpieza, $comentarioGeneral) {
    
  }
  
  public function autoVerificado() {
    if($this->getSeguroOK()==4 OR $this->getSeguroOk()==3) {
      return true;
    } else {
      return false;
    }
  }
  public function getCantidadCalificacionesPositivas(){
      $q = Doctrine_Query::create()->from('Rating')
      ->where('Rating.Reserve.Car.Id = ?', $this->getId())
      ->andWhere('Rating.Op_recom_car = ?', 1);
      $ratings = $q->execute();
      return $ratings->count();
  }
  public function getTypeTransmission(){

  }
  
  public function getVerificacionOK() {
    if($this->getSeguroFotoFrente()==NULL ||
       $this->getSeguroFotoCostadoDerecho() == NULL ||
       $this->getSeguroFotoCostadoIzquierdo() == NULL ||
       $this->getSeguroFotoTraseroDerecho() == NULL ||
       $this->getLlantaDelDer() == NULL ||
       $this->getLlantaDelIzq() == NULL ||
       $this->getLlantaTraDer() == NULL ||
       $this->getLlantaTraIzq() == NULL ||
       $this->getTablero() == NULL ||
       $this->getRuedaRepuesto() ==  NULL ||
       $this->getPadron() == NULL ||
       $this->getFotoPadronReverso() == NULL) {
      return false;
    } else {
      return true;
    }
  }
  
  public function getMarcaModelo() {
    $modelo= Doctrine_Core::getTable("model")->findOneById($this->getModelId());
    $marca= Doctrine_Core::getTable("brand")->findOneById($modelo->getBrandId());
    return $marca->getName()." ".$modelo->getName();
  }
  

  public function getFoto() {
      sfContext::getInstance()->getConfiguration()->loadHelpers(array('Url'));
      $photo = $this->getFotoPerfil();
      if(is_null($photo)) {
//  $idModelo= $this->getModelId();
//  $query = "SELECT foto_defecto from Model WHERE id='".$idModelo."'";
//  $rs = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($query);
//  $photo= "".$rs[0]['foto_defecto'];
    $photo= "../../images/img_asegura_tu_auto/seguroFotoCostadoDerecho.png"
;   return $photo;
      } else {
    return $photo;
      }
  }

  
  
  public function getPhotoFile($type)
  {

      $q = Doctrine_Query::create()->from('Photo')
      ->where('Photo.Type = ?', $type)
      ->andWhere('Photo.Car.Id = ?', $this->getId());
      $photo = $q->fetchOne();
    
      if(!$photo) {
    //En este caso, no hay foto del auto. Cargamos la foto por defecto del modelo
    $q = Doctrine_Manager::getInstance()->getCurrentConnection()->getDbh();
        $query= "SELECT Model.foto_defecto FROM Model, Car WHERE Car.id='".$this->getId()."' AND Model.id=Car.model_id";
    $stmt= $q->prepare($query);
    $stmt->execute();
    $result= $stmt->fetchAll();
        $temp= new Photo();
    $temp->setPath("default_".$result[0]['foto_defecto']);
    return $temp;
      }
      
      return $photo;
    

  }
  
 public function getPositiveRatings()
  {

     $q = Doctrine_Query::create()->from('Rating')
      ->where('Rating.Reserve.Car.Id = ?', $this->getId())
      ->andWhere('Rating.Qualified = ?', 1);
      $ratings = $q->execute();
     

      return $ratings->count();

  }

public function getNombreComuna() {

    $q = Doctrine_Query::create()
        ->from('Comunas')
        ->where('Comunas.codigoInterno = ?', $this->getComunaId());

    $comuna = $q->fetchOne();

    if (!is_object($comuna)) {
        return '';
    }
    
    return ucwords(strtolower($comuna->getNombre()));
}

    public function getAddressAprox(){
      $exp_frase=explode(" ",$this->getAddress());
      $num=count($exp_frase);

      for ($i=0,$k=0;$i<$num;$i++){
        if (is_numeric(trim($exp_frase[$i]))){
          $numeros[$k] = $exp_frase[$i];
          $k++;
        }
      }
      for($i=0;$i<count($numeros);$i++){
        $cant_dig = strlen($numeros[$i]);
        if($cant_dig>2){
          $numAux = substr($numeros[$i], 0, -2);
          $numAprox[$i] = $numAux."XX";
        }
      }
      $direccionAprox = "";
      for ($i=0;$i<$num;$i++){
        for($j=0;$j<count($numeros);$j++){
          if(trim($exp_frase[$i])==$numeros[$j]){
            if(isset($numAprox)) $exp_frase[$i] = $numAprox[$j];
            else $exp_frase[$i] = "";
          }
        }
        if($i==0) $direccionAprox = $exp_frase[$i];
        else $direccionAprox = $direccionAprox." ".$exp_frase[$i];
      } 
      return $direccionAprox;
    }


    public function getCarPercentile(){
        $carId = $this->getId();
        $query = "
        
        SELECT 
    c.id, c.score, ((100-ROUND(((@rank - rank) / @rank) * 100, 2))/100)*5 AS percentile_rank
FROM
    (SELECT 
    *,
        @prev:=@curr,
        @curr:=a.score,
        @rank:=IF(@prev = @curr, @rank, @rank + 1) AS rank
    FROM
        (SELECT id, greatest(1,velocidad_contesta_pedidos)/greatest(0.1,contesta_pedidos) as score FROM Car
        where activo=1 and (seguro_ok=3 or seguro_ok=4)) AS a,
        (SELECT @curr:= null, @prev:= null, @rank:= 0) AS b
ORDER BY score DESC) AS c
where c.id=

        ".$carId;
        
        $rs = Doctrine_Manager::getInstance()->getCurrentConnection()->fetchAssoc($query);
      


        return $rs[0]['percentile_rank'];
    }
    
    /*public function save(Doctrine_Connection $conn = null)  {
    
        if (!$this->getId() || $this->getCustomerio()<=0) {

            $brand = $this->getMarcaModelo();
            $patente = $this->getPatente();
            $comuna = $this->getNombreComuna();
        
            $session = curl_init();

            $customer_id = 'a_'.$this->getUserId(); // You'll want to set this dynamically to the unique id of the user
            $customerio_url = 'https://track.customer.io/api/v1/customers/'.$customer_id.'/events';
            $site_id = '3a9fdc2493ced32f26ee';
            $api_key = '4f191ca12da03c6edca4';

            sfContext::getInstance()->getLogger()->err($customerio_url);

            $data = array("name" => "subir_auto", "data[brand]" => $brand, "data[patente]" => $patente, "data[comuna]" => $comuna);

            curl_setopt($session, CURLOPT_URL, $customerio_url);
            curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($session, CURLOPT_HEADER, false);
            curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($session, CURLOPT_VERBOSE, 1);
            curl_setopt($session, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($session, CURLOPT_POSTFIELDS,http_build_query($data));

            curl_setopt($session,CURLOPT_USERPWD,$site_id . ":" . $api_key);

            //if(ereg("^(https)",$request)) 
            curl_setopt($session,CURLOPT_SSL_VERIFYPEER,false);

            curl_exec($session);
            curl_close($session);

            $this->setCustomerio(true);
        }

        $ret = parent::save($conn);

        $car = Doctrine_Core::getTable('car')->find($this->getId());
        $user = Doctrine_Core::getTable('user')->find($car->getUserId());   
        $ownerUserId=$user->getId();
        
        $percTotalContestadas=$user->getPercReservasContestadas();
        $velocidadContestaPedidos = $user->getVelocidadRespuesta('0');
        $CantReservasAprobadas= $user->getCantReservasAprobadasTotalOwner();
        $q = Doctrine_Manager::getInstance()->getCurrentConnection();
        $query = "update Car set Cant_Reservas_Aprobadas='$CantReservasAprobadas', contesta_pedidos='$percTotalContestadas', velocidad_contesta_pedidos='$velocidadContestaPedidos' where user_id='$ownerUserId'";

        $result = $q->execute($query);

        // NUEVO FLUJO

        // Se genera el calculo asociado al ratio de aprobacion del propietario
        $limit = 7;

        $table = Doctrine_Core::getTable('Reserve');
        $q = $table
            ->createQuery('r')
            ->select('ROUND(SUM(r.confirmed)/count(r.confirmed) * 100, 2) AS ratio')
            ->innerJoin('r.Car c')
            ->where('c.user_id = ?', $ownerUserId)
            ->andWhere('r.comentario = "null"')
            ->andWhere('(day(r.date) - day(r.fecha_reserva)) > 0')
            ->andWhere("hour(r.fecha_reserva) < 22 AND hour(r.fecha_reserva) > 5")
            ->limit($limit)
            ;

        $results = $q->execute();

        if (isset($results[0])) {

            $ratio = (float)$results[0]->getRatio();
        } else {

            $ratio = 100;
        }

        // Se setea el nuevo ratio para el auto en particular
        $this->setRatioAprobacion($ratio);

        parent::save($conn);

        return $ret;
    }*/

    // Función publica que devuelve un array con las distancias
    // del vehículo en relacion al metro mas próximo.
  public function getDistancesToMetros() {

      $Metros = Doctrine_Core::getTable("Metro")->findAll();
      $metroArray = array();
              
      foreach ($Metros as $Metro) {

          $distance = round(Utils::distance($this->lat, $this->lng, $Metro->lat, $Metro->lng), 2);
          $metroArray[$Metro->id] = $distance;
      }

      if($metroArray){
          return $metroArray;
      } else { 
          return false;
      }
  }

  public function getFotoPerfilS3($size){
    $Image = Doctrine_Core::getTable("image")->findOneByImageTypeIdAndCarId(3, $this->getId());
    if($Image){
      return $Image->getImageSize($size);
    }
    return null;
  }

  public function getArrayImages(){
    $Images = Doctrine_Core::getTable("image")->findByCarIdAndIsDeleted($this->id, 0);
    $arrayImages = array("fotoPerfil" => null,
      "fotoPadron" => null,
      "seguroFotoFrente" => null,
      "seguroFotoCostadoDerecho" => null,
      "seguroFotoCostadoIzquierdo" => null,
      "seguroFotoTraseroDerecho" => null,
      "seguroFotoTraseroIzquierdo" => null,
      "fotoLlantaDelanteraDerecha" => null,
      "fotoLlantaDelanteraIzquierda" => null,
      "fotoLlantaTraseraIzquierda" => null,
      "fotoLlantaTraseraDerecha" => null,
      "fotoTablero" => null,
      "fotoEquipoAudio" => null,
      "fotoRuedaRepuesto" => null,
      "fotoAccesorio1" => null,
      "fotoAccesorio2" => null,
      "fotoFrontalDerecho" => null,
      "fotoFrontalIzquierdo" => null,
      "fotoFrontalCentro" => null,
      "fotoTraseroIzquierdo" => null,
      "fotoTraseroDerecho" => null,
      "fotoTraseroCentro" => null,
      "fotoLateralDerecho" => null,
      "fotoLateralIzquierdo" => null,
      "fotoFrontal" => null,
      "otro" => null
    );

    foreach ($Images as $Image) {

      switch ($Image->image_type_id) {
        case 3:
          $arrayImages["fotoPerfil"] = $Image;
          break;

        case 4:
          $arrayImages["fotoPadron"] = $Image;
          break;

        case 5:
          $arrayImages["seguroFotoFrente"] = $Image;
          break;

        case 6:
          $arrayImages["seguroFotoCostadoDerecho"] = $Image;
          break;

        case 7:
          $arrayImages["seguroFotoCostadoIzquierdo"] = $Image;
          break;

        case 8:
          $arrayImages["seguroFotoTraseroDerecho"] = $Image;
          break;

        case 9:
          $arrayImages["seguroFotoTraseroIzquierdo"] = $Image;
          break;

        case 10:
          $arrayImages["fotoLlantaDelanteraDerecha"] = $Image;
          break;

        case 11:
          $arrayImages["fotoLlantaDelanteraIzquierda"] = $Image;
          break;

        case 12:
          $arrayImages["fotoLlantaTraseraIzquierda"] = $Image;
          break;

        case 13:
          $arrayImages["fotoLlantaTraseraDerecha"] = $Image;
          break;

        case 14:
          $arrayImages["fotoTablero"] = $Image;
          break;

        case 15:
          $arrayImages["fotoEquipoAudio"] = $Image;
          break;

        case 16:
          $arrayImages["fotoRuedaRepuesto"] = $Image;
          break;

        case 17:
          $arrayImages["fotoAccesorio1"] = $Image;
          break;

        case 18:
          $arrayImages["fotoAccesorio2"] = $Image;
          break;

        case 19:
          $arrayImages["fotoFrontalDerecho"] = $Image;
          break;

        case 20:
          $arrayImages["fotoFrontalIzquierdo"] = $Image;
          break;

        case 21:
          $arrayImages["fotoFrontalCentro"] = $Image;
          break;

        case 22:
          $arrayImages["fotoTraseroIzquierdo"] = $Image;
          break;

        case 23:
          $arrayImages["fotoTraseroDerecho"] = $Image;
          break;

        case 23:
          $arrayImages["fotoTraseroDerecho"] = $Image;
          break;

        case 24:
          $arrayImages["fotoTraseroCentro"] = $Image;
          break;

        case 25:
          $arrayImages["fotoLateralDerecho"] = $Image;
          break;

        case 26:
          $arrayImages["fotoLateralIzquierdo"] = $Image;
          break;

        case 27:
          $arrayImages["fotoFrontal"] = $Image;
          break;
          
        default:
          $arrayImages["otro"] = $Image;
          break;
      }

    }

    return $arrayImages;

  }

  public function getHTMLFormatForIphotosByCarId(){

    $Images = Doctrine_Core::getTable("image")->findByCarIdAndIsDeleted($this->id, 0);

    $preLoadImage = "";
    $return = "<ul style=\"display: none;\" class='scrubber'>";
    foreach ($Images as $Image) {
      if($Image->image_type_id != 6 && $Image->image_type_id != 4){
        $return = $return . "<li><img alt='".$Image->image_type_id."' src='".$Image->getImageSize("XS")."' height='75' width='110'></li>";
        
        if($Image->image_type_id == 3){
          $preLoadImage = "<img class='preLoadImage' alt='".$Image->image_type_id."' src='".$Image->getImageSize("XS")."' height='75' width='110'>";
        }
      }
    }

    return $preLoadImage . $return."</ul>";

  }

}
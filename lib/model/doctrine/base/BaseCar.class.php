<?php

/**
 * BaseCar
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $User_id
 * @property string $km
 * @property integer $City_id
 * @property integer $comuna_id
 * @property string $address
 * @property float $lat
 * @property float $lng
 * @property integer $offer
 * @property string $observations
 * @property decimal $price_per_hour
 * @property decimal $price_per_day
 * @property decimal $price_per_week
 * @property decimal $price_per_month
 * @property integer $Model_id
 * @property integer $year
 * @property string $patente
 * @property string $tipobencina
 * @property string $description
 * @property User $User
 * @property Model $Model
 * @property City $City
 * @property Doctrine_Collection $Availabilities
 * @property Doctrine_Collection $Damages
 * @property Doctrine_Collection $Photoes
 * @property Doctrine_Collection $Reserves
 * @property float $ratio_aprobacion
 * @property string accesoriosSeguro
 * @property Comunas $Comuna
 * @property integer $region
 * @property Commune $commune
 * @property datetime disabled_until
 * 
 * @method integer             getId()             Returns the current record's "id" value
 * @method integer             getUserId()         Returns the current record's "User_id" value
 * @method string              getKm()             Returns the current record's "km" value
 * @method integer             getCityId()         Returns the current record's "City_id" value
 * @method integer             getComunaId()       Returns the current record's "comuna_id" value
 * @method integer             getStateId()        Returns the current record's "State_id" value
 * @method string              getAddress()        Returns the current record's "address" value
 * @method float               getLat()            Returns the current record's "lat" value
 * @method float               getLng()            Returns the current record's "lng" value
 * @method integer             getOffer()          Returns the current record's "offer" value
 * @method string              getObservations()   Returns the current record's "observations" value
 * @method decimal             getPricePerHour()   Returns the current record's "price_per_hour" value
 * @method decimal             getPricePerDay()    Returns the current record's "price_per_day" value
 * @method decimal             getPricePerWeek()   Returns the current record's "price_per_week" value
 * @method decimal             getPricePerMonth()  Returns the current record's "price_per_month" value
 * @method integer             getModelId()        Returns the current record's "Model_id" value
 * @method integer             getYear()           Returns the current record's "year" value
 * @method string              getPatente()        Returns the current record's "patente" value
 * @method string              getTipoBencina()    Returns the current record's "tipobencina" value
 * @method string              getDescription()    Returns the current record's "description" value
 * @method User                getUser()           Returns the current record's "User" value
 * @method Model               getModel()          Returns the current record's "Model" value
 * @method City                getCity()           Returns the current record's "City" value
 * @method float               getRatioAprobacion() Returns the current record's "ratio_aprobacion" value
 * @method integer             getTransmission()   Returns the current record's "transmission" value
 * @method accesoriosSeguro    getAccesoriosSeguro() Returns the current record's "accesoriosSeguro" value
 * @method Comunas             getComuna()         Returns the current record's "Comuna" value
 * @method Commune             getCommune()        Returns the current record's "commune" value
 * @method integer             getRegion()
 * 
 * @method Doctrine_Collection getAvailabilities() Returns the current record's "Availabilities" collection
 * @method Doctrine_Collection getDamages()        Returns the current record's "Damages" collection
 * @method Doctrine_Collection getPhotoes()        Returns the current record's "Photoes" collection
 * @method Doctrine_Collection getReserves()       Returns the current record's "Reserves" collection
 * @method timestamp           getDisabledUntil()  Returns the current record's "disable_until" value
 *
 * @method Car                 setId()             Sets the current record's "id" value
 * @method Car                 setUserId()         Sets the current record's "User_id" value
 * @method Car                 setKm()             Sets the current record's "km" value
 * @method Car                 setCityId()         Sets the current record's "City_id" value
 * @method Car                 setComunaId()       Sets the current record's "Comuna_id" value
 * @method Car                 setStateId()        Sets the current record's "State_id" value
 * @method Car                 setAddress()        Sets the current record's "address" value
 * @method Car                 setLat()            Sets the current record's "lat" value
 * @method Car                 setLng()            Sets the current record's "lng" value
 * @method Car                 setOffer()          Sets the current record's "offer" value
 * @method Car                 setObservations()   Sets the current record's "observations" value
 * @method Car                 setPricePerHour()   Sets the current record's "price_per_hour" value
 * @method Car                 setPricePerDay()    Sets the current record's "price_per_day" value
 * @method Car                 setPricePerWeek()   Sets the current record's "price_per_week" value
 * @method Car                 setPricePerMonth()  Sets the current record's "price_per_month" value
 * @method Car                 setModelId()        Sets the current record's "Model_id" value
 * @method Car                 setYear()           Sets the current record's "year" value
 * @method Car                 setPatente()        Sets the current record's "patente" value
 * @method Car                 setTipoBencina()    Sets the current record's "tipobencina" value
 * @method Car                 setDescription()    Sets the current record's "description" value
 * @method Car                 setUser()           Sets the current record's "User" value
 * @method Car                 setModel()          Sets the current record's "Model" value
 * @method Car                 setCity()           Sets the current record's "City" value
 * @method Car                 setAvailabilities() Sets the current record's "Availabilities" collection
 * @method Car                 setDamages()        Sets the current record's "Damages" collection
 * @method Car                 setPhotos()         Sets the current record's "Photoes" collection
 * @method Car                 setReserves()       Sets the current record's "Reserves" collection
 * @method Car                 setRatioAprobacion() Sets the current record's "ratio_aprobacion" value
 * @method Car                 setTransmission()   Sets the current record's "transmission" value
 * @method Car                 setAccesoriosSeguro() Sets the current record's "accesoriosSeguro" value
 * @method Car                 setComuna()         Sets the current record's "Comuna" value
 * @method Car                 setRegion()         Sets the current record's "Region" value
 * @method Car                 setDisabledUntil()   Sets the current record's "disable_until" value
 *
 * @package    CarSharing
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCar extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('Car');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('User_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('km', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('City_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('State_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('address', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('lat', 'float', 10, array(
             'type' => 'float',
             'length' => 10,
             'scale' => '6',
             ));
        $this->hasColumn('lng', 'float', 10, array(
             'type' => 'float',
             'length' => 10,
             'scale' => '6',
             ));
        $this->hasColumn('offer', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('observations', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('price_per_hour', 'decimal', 10, array(
             'type' => 'decimal',
             'length' => 10,
             'scale' => '2',
             ));
        $this->hasColumn('price_per_day', 'decimal', 10, array(
             'type' => 'decimal',
             'length' => 10,
             'scale' => '2',
             ));
         $this->hasColumn('price_per_week', 'decimal', 10, array(
             'type' => 'decimal',
             'length' => 10,
             'scale' => '2',
             ));
        $this->hasColumn('price_per_month', 'decimal', 10, array(
             'type' => 'decimal',
             'length' => 10,
             'scale' => '2',
             ));
       $this->hasColumn('contesta_pedidos', 'float', 10, array(
             'type' => 'float',
             'length' => 10,
             'scale' => '2',
             ));
       $this->hasColumn('velocidad_contesta_pedidos', 'float', 10, array(
             'type' => 'float',
             'length' => 10,
             'scale' => '2',
             ));
       $this->hasColumn('cant_reservas_aprobadas', 'float', 10, array(
             'type' => 'float',
             'length' => 10,
             'scale' => '2',
             ));


        $this->hasColumn('Model_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('year', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('patente', 'string', 10, array(
             'type' => 'string',
             'length' => 10,
             ));
        $this->hasColumn('color', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('tipobencina', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('description', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
             ));
        $this->hasColumn('seguro_ok', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('doors', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
       $this->hasColumn('engine_num', 'string', 60, array(
             'type' => 'string',
             'length' => 60,
             ));
       $this->hasColumn('vin_num', 'string', 60, array(
             'type' => 'string',
             'length' => 60,
             ));
       $this->hasColumn('transmission', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
       $this->hasColumn('padron', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('tablero', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('equipo_audio', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('consultas', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('foto_perfil', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('photoS3', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 1,
             ));
       $this->hasColumn('verificationPhotoS3', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
       $this->hasColumn('foto_padron_reverso', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('radioMarca', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('radioModelo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('radioTipo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('parlantesMarca', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('parlantesModelo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('tweeMarca', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('tweeModelo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('ecuaMarca', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('ecuaModelo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('ampliMarca', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('ampliModelo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('compMarca', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('compModelo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('subwMarca', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('subwModelo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('sistMarca', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('sistModelo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('otros', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('accesoriosSeguro', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('seguroFotoFrente', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('seguroFotoCostadoDerecho', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('seguroFotoCostadoIzquierdo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('seguroFotoTraseroDerecho', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('seguroFotoTraseroIzquierdo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('region', 'integer', 11, array(
            'type' => 'integer',
            'length' => 11,
        ));
       $this->hasColumn('comuna_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
       $this->hasColumn('uso_vehiculo_id', 'integer', 255, array(
             'type' => 'integer',
             'length' => 11,
             ));
       $this->hasColumn('llanta_tra_der', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('llanta_del_der', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('llanta_tra_izq', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('llanta_del_izq', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('rueda_repuesto', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('accesorio1', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
       $this->hasColumn('accesorio2', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('activo', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('disabled_until', 'timestamp', null, array(
             'type' => 'timestamp',
             'default' => null
             ));
       $this->hasColumn('verification_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('fecha_subida', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('fecha_inicio_verificacion', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('fecha_fin_verificacion', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('fecha_validacion', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('customerio', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => '0',
            'default' => 0,
            ));             
        $this->hasColumn('disponibilidad_semana', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => '0',
            'default' => 1,
            ));
        $this->hasColumn('disponibilidad_finde', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => '0',
            'default' => 1,
            ));
        $this->hasColumn('ratio_aprobacion', 'float', null, array(
            'type' => 'float'
            ));

      $this->hasColumn('commune_id', 'integer', 11, array(
            'notnull' => true
      ));
      $this->index('fk_Car_Commune', array(
            'fields' => array(
                0 => 'commune_id',
            ),
      ));


        $this->index('fk_Car_User', array(
             'fields' => 
             array(
              0 => 'User_id',
             ),
             ));
        $this->index('fk_Car_Model1', array(
             'fields' => 
             array(
              0 => 'Model_id',
             ),
             ));
        $this->index('fk_Car_City1', array(
             'fields' => 
             array(
              0 => 'City_id',
             ),
             ));
        $this->index('id_UNIQUE', array(
             'fields' => 
             array(
              0 => 'id',
             ),
             'type' => 'unique',
             ));
        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('User', array(
             'local' => 'User_id',
             'foreign' => 'id',
             'onDelete' => 'no action',
             'onUpdate' => 'no action'));

        $this->hasOne('Model', array(
             'local' => 'Model_id',
             'foreign' => 'id',
             'onDelete' => 'no action',
             'onUpdate' => 'no action'));

        $this->hasOne('Comunas', array(
             'local' => 'comuna_id',
             'foreign' => 'codigoInterno',
             'onDelete' => 'no action',
             'onUpdate' => 'no action'));

        $this->hasOne('City', array(
             'local' => 'City_id',
             'foreign' => 'id',
             'onDelete' => 'no action',
             'onUpdate' => 'no action'));

        $this->hasMany('Availability as Availabilities', array(
             'local' => 'id',
             'foreign' => 'Car_id'));

        $this->hasMany('Damage as Damages', array(
             'local' => 'id',
             'foreign' => 'Car_id'));

        $this->hasMany('Photo as Photoes', array(
             'local' => 'id',
             'foreign' => 'Car_id'));
        $this->hasMany('Reserve as Reserves', array(
             'local' => 'id',
             'foreign' => 'Car_id'));

        $this->hasMany('CarAvailability as CarAvailabilities', array(
             'local' => 'id',
             'foreign' => 'car_id'));

        $this->hasMany('CarAvailabilityEmail as CarAvailabilityEmails', array(
             'local' => 'id',
             'foreign' => 'car_id'));

        $this->hasOne('Commune', array(
            'local' => 'commune_id',
            'foreign' => 'id',
            'onDelete' => 'no action',
            'onUpdate' => 'no action'
        ));
    }
}
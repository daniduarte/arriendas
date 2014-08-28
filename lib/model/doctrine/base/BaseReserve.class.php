<?php

/**
 * BaseReserve
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property timestamp $date
 * @property integer $duration
 * @property boolean $confirmed
 * @property boolean $owner_km_confirmed
 * @property boolean $user_km_confirmed
 * @property integer $User_id
 * @property integer $extend_user_id
 * @property integer $Car_id
 * @property integer $Rating_id
 * @property boolean $complete
 * @property boolean $inicioArriendoOk
 * @property boolean $finArriendoOk
 * @property User $User
 * @property Car $Car
 * @property Rating $Rating
 * @property Doctrine_Collection $Reports
 * @property Doctrine_Collection $ReserveFiles
 * @property Transaction $Transaction
 * @property decimal $price
 * @property integer $Extend
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method timestamp           getDate()        Returns the current record's "date" value
 * @method integer             getDuration()    Returns the current record's "duration" value
 * @method boolean             getConfirmed()   Returns the current record's "confirmed" value
 * @method integer             getUserId()      Returns the current record's "User_id" value
 * @method integer             getExtendUserId()      Returns the current record's "User_id" value
 * @method integer             getCarId()       Returns the current record's "Car_id" value
 * @method integer             getRatingId()    Returns the current record's "Rating_id" value
 * @method boolean             getComplete()    Returns the current record's "complete" value
 * @method boolean             getInicioArriendoOk()    Returns the current record's "inicio_arriendo_ok" value
 * @method boolean             getFinArriendoOk()    Returns the current record's "fin_arriendo_ok" value
 * @method integer             getSancion()     Returns the current record's "Sancion" value
 * @method User                getUser()        Returns the current record's "User" value
 * @method Car                 getCar()         Returns the current record's "Car" value
 * @method Rating              getRating()      Returns the current record's "Rating" value
 * @method Doctrine_Collection getReports()     Returns the current record's "Reports" collection
 * @method Doctrine_Collection getReserveFiles()     Returns the current record's "ReserveFiles" collection
 * @method Transaction         getTransaction() Returns the current record's "Transaction" value
 * @method Reserve             getCanceled()    Returns the current record's "Canceled" value
 * @method Reserve             getKminicial()   Return the current record's "Kminicial" value
 * @method Reserve             getKmfinal()     Return the current record's "Kmfinal" value
 * @method decimal         getPrice()              Returns the current record's "price" value
 * @method integer             getExtend()      Return the current record's "Extend" value
 * @method Reserve             setId()          Sets the current record's "id" value
 * @method Reserve             setDate()        Sets the current record's "date" value
 * @method Reserve             setDuration()    Sets the current record's "duration" value
 * @method Reserve             setConfirmed()   Sets the current record's "confirmed" value
 * @method Reserve             setUserId()      Sets the current record's "User_id" value
 * @method Reserve             setExtendUserId()      Sets the current record's "extend_user_id" value
 * @method Reserve             setCarId()       Sets the current record's "Car_id" value
 * @method Reserve             setRatingId()    Sets the current record's "Rating_id" value
 * @method Reserve             setComplete()    Sets the current record's "complete" value
 * @method Reserve             setInicioArriendoOk()    Sets the current record's "inicio_arriendo_ok" value
 * @method Reserve             setFinArriendoOk()    Sets the current record's "fin_arriendo_ok" value
 * @method Reserve             setSancion()     Sets the current record's "Sancion" value
 * @method Reserve             setUser()        Sets the current record's "User" value
 * @method Reserve             setCar()         Sets the current record's "Car" value
 * @method Reserve             setRating()      Sets the current record's "Rating" value
 * @method Reserve             setReports()     Sets the current record's "Reports" collection
 * @method Reserve             setReserveFiles()        Returns the current record's "ReserveFiles" collection
 * @method Reserve             setTransaction() Sets the current record's "Transaction" value
 * @method Reserve             setCanceled()    Sets the current record's "Canceled" value
 * @method Reserve             setIniKmConfirmed() Sets the current record's "ini_km_confirmed" value
 * @method Reserve             setEndKmConfirmed() Sets the current record's "end_km_confirmed" value
 * @method Reserve             setKminicial()   Sets the current record's "kminicial" value 
 * @method Reserve             setKmfinal()     Sets the current record's "kmfinal" value
 * @method Reserve             setPrice()       Sets the current record's "price" value
 * @method Integer             setExtend()      Sets the current record's "extend" value
 * 
 * @package    CarSharing
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseReserve extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('Reserve');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('date', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('duration', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('confirmed', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('User_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('extend_user_id', 'integer', 11, array(
             'type' => 'integer',
             'default' => 'null',
             'length' => 11,
             ));
        $this->hasColumn('Car_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('Rating_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('complete', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));

        $this->hasColumn('owner_confirmed', 'int', 11, array(
             'type' => 'int',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('canceled', 'integer', 11, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('visible_owner', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => 1,
            ));
        $this->hasColumn('visible_renter', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => 1,
            ));
        $this->hasColumn('sancion', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('ini_km_confirmed', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('end_km_confirmed', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('ini_km_owner_confirmed', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('end_km_owner_confirmed', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('kminicial', 'float', 6, array(
             'type' => 'float',
             'length' => 6,
             'scale' => '2',
             ));
        $this->hasColumn('kmfinal', 'float', 6, array(
             'type' => 'float',
             'length' => 6,
             'scale' => '2',
             ));
        $this->hasColumn('price', 'decimal', 10, array(
             'type' => 'decimal',
             'length' => 10,
             'scale' => '2',
             ));
        $this->hasColumn('extend', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'scale' => '2',
             ));
        $this->hasColumn('documentos_owner', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => 0,
            ));
        $this->hasColumn('documentos_renter', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => 0,
            ));
        $this->hasColumn('declaracion_danios', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => 0,
            ));
        $this->hasColumn('declaracion_devolucion', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => 0,
            ));
        $this->hasColumn('hora_devolucion', 'time', null, array(
             'type' => 'time',
             ));
        $this->hasColumn('estado', 'integer', 10, array(
             'type' => 'integer',
             'length' => 10,
             'default' => 'null',
             ));
        $this->hasColumn('comentario', 'string', 300, array(
            'type' => 'string',
            'length' => 300,
            'default' => 'null',
        ));
       $this->hasColumn('token', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
         $this->hasColumn('id_padre', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             'default' => 'null',
        ));
        $this->hasColumn('fecha_reserva', 'timestamp', null, array(
             'type' => 'timestamp',
        ));
        $this->hasColumn('fecha_confirmacion', 'timestamp', null, array(
             'type' => 'timestamp',
        ));
        $this->hasColumn('fecha_pago', 'timestamp', null, array(
             'type' => 'timestamp',
        ));
        $this->hasColumn('liberadoDeGarantia', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => "",
             ));
        $this->hasColumn('montoLiberacion', 'decimal', 10, array(
             'type' => 'decimal',
             'length' => 10,
             'scale' => '2',
             ));
        $this->hasColumn('cambioEstadoRapido', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => "",
             ));
        $this->hasColumn('payment_cancelled', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => 0,
            ));
        $this->hasColumn('cancel_reason', 'integer', 11, array(
             'type' => 'integer',
             'notnull' => '0',
             'default' => 0,
             ));
        $this->hasColumn('customerio', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => '0',
            'default' => 0,
            ));
        $this->hasColumn('inicio_arriendo_ok', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => '0',
            'default' => 0,
            ));
        $this->hasColumn('fin_arriendo_ok', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => '0',
            'default' => 0,
            ));
        $this->index('fk_Reserve_User1', array(
             'fields' => 
             array(
              0 => 'User_id',
             ),
             ));
        $this->index('fk_Reserve_Car1', array(
             'fields' => 
             array(
              0 => 'Car_id',
             ),
             ));
        $this->index('fk_Reserve_Rating1', array(
             'fields' => 
             array(
              0 => 'Rating_id',
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

        $this->hasOne('Car', array(
             'local' => 'Car_id',
             'foreign' => 'id',
             'onDelete' => 'no action',
             'onUpdate' => 'no action'));

        $this->hasOne('Rating', array(
             'local' => 'Rating_id',
             'foreign' => 'id',
             'onDelete' => 'no action',
             'onUpdate' => 'no action'));

        $this->hasMany('Report as Reports', array(
             'local' => 'id',
             'foreign' => 'Reserve_id'));
        
        $this->hasMany('ReserveFile as ReserveFiles', array(
             'local' => 'id',
             'foreign' => 'Reserve_id'));

        $this->hasOne('Transaction', array(
             'local' => 'id',
             'foreign' => 'Reserve_id'));
    }
}
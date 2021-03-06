<?php

/**
 * BaseUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $rut
 * @property int $llamado_registro
 * @property string $rut_dv
 * @property string $rut_old
 * @property string $username
 * @property string $comentario_recordar
 * @property string $password
 * @property string $facebook_id
 * @property string $url
 * @property string $email
 * @property string $firstname
 * @property string $lastname
 * @property string $apellido_materno
 * @property string $paypal_id
 * @property string $driver_license_number
 * @property string $driver_license_file
 * @property string $picture_file
 * @property string $telephone
 * @property string $identification
 * @property string $birthdate
 * @property boolean $menor
 * @property string $country
 * @property string $city
 * @property string $hash
 * @property string $tracked_ips
 * @property boolean $ip_ambigua
 * @property string $tracked_states
 * @property boolean $confirmed
 * @property boolean $autoconfirm
 * @property boolean $deleted
 * @property boolean $blocked
 * @property boolean $moroso
 * @property boolean $extranjero
 * @property boolean $chequeo_judicial
 * @property boolean $confirmed_fb
 * @property boolean $confirmed_sms
 * @property boolean $friend_invite
 * @property boolean $is_suspect
 * @property boolean $is_valid_license
 * @property Doctrine_Collection $Cars
 * @property Doctrine_Collection $Conversation
 * @property Doctrine_Collection $Message
 * @property Doctrine_Collection $Reserves
 * @property Doctrine_Collection $Transactions
 * @property Doctrine_Collection $Comuna
 * @property Doctrine_Collection $Region
 * @property Commune $commune
 * @property Doctrine_Collection $UserManagements
 * @property boolean $is_employee
 *
 * 
 * @method integer             getId()                    Returns the current record's "id" value
 * @method integer             getLlamadoRegistro()       Returns the current record's "llamado_registro" value
 * @method string              getUsername()              Returns the current record's "username" value
 * @method string              getComentariosRecordar()   Returns the current record's "comentarios_recordar" value
 * @method string              getPassword()              Returns the current record's "password" value
 * @method string              getFacebookId()            Returns the current record's "facebook_id" value
 * @method string              getUrl()                   Returns the current record's "url" value
 * @method string              getEmail()                 Returns the current record's "email" value
 * @method string              getFirstname()             Returns the current record's "firstname" value
 * @method string              getLastname()              Returns the current record's "lastname" value
 * @method string              getApellidoMaterno()       Returns the current record's "apellido_materno" value
 * @method string              getPaypalId()              Returns the current record's "paypal_id" value
 * @method string              getDriverLicenseNumber()   Returns the current record's "driver_license_number" value
 * @method string              getDriverLicenseFile()     Returns the current record's "driver_license_file" value
 * @method integer             getRut()                   Returns the current record's "rut" value
 * @method string              getRutDv()                 Returns the current record's "rut_dv" value
 * @method string              getRutOld()                Returns the current record's "rut_old" value
 * @method string              getRutFile()               Returns the current record's "rut_file" value
 * @method string              getPictureFile()           Returns the current record's "picture_file" value
 * @method string              getTelephone()             Returns the current record's "telephone" value
 * @method string              getIdentification()        Returns the current record's "identification" value
 * @method string              getBirthdate()             Returns the current record's "birthdate" value
 * @method boolean             getMenor()                 Returns the current record's "menor" value
 * @method string              getAddress()               Returns the current record's "address" value
 * @method string              getCountry()               Returns the current record's "country" value
 * @method string              getCity()                  Returns the current record's "city" value
 * @method string              getHash()                  Returns the current record's "hash" value
 * @method string              getTrackedIps()            Returns the current record's "tracked_ips" value
 * @method boolean             getIpAmbigua()             Returns the current record's "ip_ambigua" value
 * @method string              getTrackedStates()         Returns the current record's "tracked_stated" value
 * @method boolean             getConfirmed()             Returns the current record's "confirmed" value
 * @method boolean             getAutoconfirm()           Returns the current record's "autoconfirm" value
 * @method boolean             getDeleted()               Returns the current record's "deleted" value
 * @method boolean             getBlocked()               Returns the current record's "blocked" value
 * @method boolean             getMoroso()                Returns the current record's "moroso" value
 * @method boolean             getConfirmedFb()           Returns the current record's "confirmed_fb" value
 * @method boolean             getConfirmedSms()          Returns the current record's "confirmed_sms" value
 * @method boolean             getFriendInvite()          Returns the current record's "friend_invite" value
 * @method boolean             getExtranjero()            Returns the current record's "extranjero" value
 * @method boolean             getChequeoJudicial()       Returns the current record's "chequeo_judicial" value
 * @method boolean             getIsValidLicense()        Returns the current record's "is_valid_license" value
 * @method boolean             getIsSuspect()             Returns the current record's "is_suspect" value
 * @method Doctrine_Collection getCars()                  Returns the current record's "Cars" collection
 * @method Doctrine_Collection getConversation()          Returns the current record's "Conversation" collection
 * @method Doctrine_Collection getMessage()               Returns the current record's "Message" collection
 * @method Doctrine_Collection getReserves()              Returns the current record's "Reserves" collection
 * @method Doctrine_Collection getTransactions()          Returns the current record's "Transactions" collection
 * @method timestamp           getFechaRegistro()         Returns the current record's "fecha_registro" value
 * @method Commune             getCommune()               Returns the current record's "commune" value
 * @method Doctrine_Collection getUserManagements()       Returns the current record's "UserManagements" collection
 * @method boolean             getIsEmployee()            Returns the current record's "is_employee" collection
 * @method boolean             getUsuarioValidado()       Returns the current record's "usuario_validado" collection
 *
 * @method User                setId()                    Sets the current record's "id" value
 * @method User                setLlamadoRegistro()       Sets the current record's "llamado_registro" collection
 * @method User                setUsername()              Sets the current record's "username" value
 * @method User                setComentariosRecordar()   Sets the current record's "comentarios_recordar" value
 * @method User                setPassword()              Sets the current record's "password" value
 * @method User                setFacebookId()            Sets the current record's "facebook_id" value
 * @method User                setUrl()                   Sets the current record's "url" value
 * @method User                setEmail()                 Sets the current record's "email" value
 * @method User                setFirstname()             Sets the current record's "firstname" value
 * @method User                setLastname()              Sets the current record's "lastname" value
 * @method User                setApellidoMaterno         Sets the current record's "apellido_materno" value
 * @method User                setPaypalId()              Sets the current record's "paypal_id" value
 * @method User                setDriverLicenseNumber()   Sets the current record's "driver_license_number" value
 * @method User                setDriverLicenseFile()     Sets the current record's "driver_license_file" value
 * @method User                setPictureFile()           Sets the current record's "picture_file" value
 * @method user                setRut()                   Sets the current record's "rut" value
 * @method user                setRutDv()                 Sets the current record's "rut_dv" value
 * @method User                setRutOld()				  Sets the current record's "rut_old" value
 * @method User                setRutFile()				  Sets the current record's "rut_file" value
 * @method User                setTelephone()             Sets the current record's "telephone" value
 * @method User                setIdentification()        Sets the current record's "identification" value
 * @method User                setBirthdate()             Sets the current record's "birthdate" value
 * @method User                setMenor()                 Sets the current record's "menor" value
 * @method User                setAddress()               Sets the current record's "address" value
 * @method User                setCountry()               Sets the current record's "country" value
 * @method User                setCity()                  Sets the current record's "city" value
 * @method User                setHash()                  Sets the current record's "hash" value
 * @method User                setTrackedIps()            Sets the current record's "tracked_ips" value
 * @method User                setIpAmbigua()             Sets the current record's "ip_ambigua" value
 * @method User                setTrackedStates()         Sets the current record's "tracked_states" value
 * @method User                setConfirmed()             Sets the current record's "confirmed" value
 * @method User                setAutoconfirm()           Sets the current record's "autoconfirm" value
 * @method User                setDeleted()               Sets the current record's "deleted" value
 * @method User                setBlocked()               Sets the current record's "blocked" value
 * @method User                setMoroso()                Sets the current record's "moroso" value
 * @method User                setConfirmedFb()           Sets the current record's "confirmed_fb" value
 * @method User                setConfirmedSms()          Sets the current record's "confirmed_sms" value
 * @method User                setFriendInvite()          Sets the current record's "friend_invite" value
 * @method User                setExtranjero()            Sets the current record's "extranjero" value
 * @method User                setChequeoJudicial()       Sets the current record's "chequeo_judicial" value
 * @method User                setIsSuspect()             Sets the current record's "is_suspect" value
 * @method User                setCars()                  Sets the current record's "Cars" collection
 * @method User                setConversation()          Sets the current record's "Conversation" collection
 * @method User                setMessage()               Sets the current record's "Message" collection
 * @method User                setReserves()              Sets the current record's "Reserves" collection
 * @method User                setTransactions()          Sets the current record's "Transactions" collection
 * @method User                setCommune()               Sets the current record's "commune" value
 * @method User                setUserManagements()       Sets the current record's "UserManagements" collection
 * @method User                setIsEmployee()            Sets the current record's "is_employee" collection
 * @method User                setUsuarioValidado()       Sets the current record's "usuario_validado" collection
 * @method User                setIsValidLicense()        Sets the current record's "is_valid_license" collection
 * 
 * @package    CarSharing
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUser extends sfDoctrineRecord {

    public function setTableDefinition() {
        $this->setTableName('User');
        $this->hasColumn('id', 'integer', 4, array(
            'type' => 'integer',
            'primary' => true,
            'autoincrement' => true,
            'length' => 4,
        ));
        $this->hasColumn('username', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('comentarios_recordar', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('password', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('facebook_id', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
        ));
        $this->hasColumn('apellido_materno', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
        ));
        $this->hasColumn('serie_rut', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
        ));
        $this->hasColumn('url', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
        ));
        $this->hasColumn('email', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('firstname', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('lastname', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('paypal_id', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('driver_license_number', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('driver_license_file', 'string', 90, array(
            'type' => 'string',
            'length' => 90,
        ));
        $this->hasColumn('picture_file', 'string', 90, array(
            'type' => 'string',
            'length' => 90,
        ));
        $this->hasColumn('rut', 'integer', 20, array(
            'type' => 'integer',
            'length' => 20,
        ));
        $this->hasColumn('rut_dv', 'string', 1, array(
            'type' => 'string',
            'length' => 1,
        ));
        $this->hasColumn('rut_old', 'string', 20, array(
            'type' => 'string',
            'length' => 20,
        ));
        $this->hasColumn('rut_file', 'string', 90, array(
            'type' => 'string',
            'length' => 90,
        ));
        $this->hasColumn('telephone', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('identification', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('birthdate', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('menor', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('usuario_validado', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('is_valid_license', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('country', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('city', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('hash', 'string', 45, array(
            'type' => 'string',
            'length' => 45,
        ));
        $this->hasColumn('tracked_ips', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
        ));
        $this->hasColumn('ip_ambigua', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('tracked_states', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
        ));
        $this->hasColumn('confirmed', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('autoconfirm', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('deleted', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('blocked', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('moroso', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('confirmed_fb', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('confirmed_sms', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('friend_invite', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('extranjero', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        )); 
        $this->hasColumn('chequeo_judicial', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('is_suspect', 'boolean', false, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
        ));
        $this->hasColumn('address', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
        ));
        $this->hasColumn('region', 'integer', 11, array(
            'type' => 'integer',
            'length' => 11,
        ));
        $this->hasColumn('comuna', 'integer', 11, array(
            'type' => 'integer',
            'length' => 11,
        ));
        $this->hasColumn('fecha_registro', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('credito', 'integer', null, array(
            'type' => 'integer'
        ));
        $this->hasColumn('llamado_registro', 'integer', null, array(
            'type' => 'integer'
        ));
        $this->hasColumn('propietario', 'boolean', null, array(
            'type' => 'boolean'
        ));
        $this->hasColumn('codigo_confirmacion', 'string', 4, array(
            'type' => 'string',
            'length' => 4,
        ));
        $this->hasColumn('como', 'string', 200, array(
            'type' => 'string',
            'length' => 200,
        ));
        $this->hasColumn('customerio', 'boolean', null, array(
            'type' => 'boolean',
            'notnull' => '0',
            'default' => 0,
            ));
        $this->hasColumn('commune_id', 'integer', 11, array(
            'notnull' => true
        ));
        $this->hasColumn('is_employee', 'boolean', false, array(
            'type' => 'boolean',
            'notnull' => true,
            'default' => false,
            ));
        $this->index('fk_User_Commune', array(
            'fields' => array(
                0 => 'commune_id',
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

    public function setUp() {
        parent::setUp();
        $this->hasMany('Car as Cars', array(
            'local' => 'id',
            'foreign' => 'User_id'));

        $this->hasMany('Conversation', array(
            'local' => 'id',
            'foreign' => 'user_to_id'));

        $this->hasMany('Message', array(
            'local' => 'id',
            'foreign' => 'user_id'));

        $this->hasMany('Reserve as Reserves', array(
            'local' => 'id',
            'foreign' => '  '));

        $this->hasMany('Transaction as Transactions', array(
            'local' => 'id',
            'foreign' => 'User_id'));

        $this->hasMany('UserMailingConfig as UserMailingConfigs', array(
            'local' => 'id',
            'foreign' => 'user_mailing_config_id'));

        $this->hasMany('UserManagement as UserManagements', array(
            'local' => 'id',
            'foreign' => 'user_id'));
        
        $this->hasOne('Commune', array(
            'local' => 'commune_id',
            'foreign' => 'id',
            'onDelete' => 'no action',
            'onUpdate' => 'no action'
        ));

        $this->hasOne('BankAccount', array(
            'local' => 'id',
            'foreign' => 'user_id',
            'onDelete' => 'no action',
            'onUpdate' => 'no action'
        ));
    }

}
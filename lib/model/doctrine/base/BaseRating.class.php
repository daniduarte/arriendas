<?php

/**
 * BaseRating
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $description
 * @property string $user_owner_opnion
 * @property string $user_renter_opnion
 * @property boolean $complete
 * @property boolean $qualified
 * @property boolean $intime
 * @property boolean $km
 * @property string $clean_satisfied
 * @property Doctrine_Collection $Reserve
 * @property string $opinion_about_owner
 * @property integer $idOwner
 * @property integer $idRenter
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method string              getDescription()        Returns the current record's "description" value
 * @method string              getUserOwnerOpnion()    Returns the current record's "user_owner_opnion" value
 * @method string              getUserRenterOpnion()   Returns the current record's "user_renter_opnion" value
 * @method boolean             getComplete()           Returns the current record's "complete" value
 * @method boolean             getQualified()          Returns the current record's "qualified" value
 * @method boolean             getIntime()             Returns the current record's "intime" value
 * @method boolean             getKm()                 Returns the current record's "km" value
 * @method string              getCleanSatisfied()     Returns the current record's "clean_satisfied" value
 * @method Doctrine_Collection getReserve()            Returns the current record's "Reserve" collection
 * @method string              getOpinionAboutOwner()  Returns the current record's "opinion_about_owner" value
 * @method integer             getIdOwner()            Returns the current record's "idRenter" value
 * @method integer             getIdRenter()           Returns the current record's "idRenter" value
 *
 * @method Rating              setId()                 Sets the current record's "id" value
 * @method Rating              setDescription()        Sets the current record's "description" value
 * @method Rating              setUserOwnerOpnion()    Sets the current record's "user_owner_opnion" value
 * @method Rating              setUserRenterOpnion()   Sets the current record's "user_renter_opnion" value
 * @method Rating              setComplete()           Sets the current record's "complete" value
 * @method Rating              setQualified()          Sets the current record's "qualified" value
 * @method Rating              setIntime()             Sets the current record's "intime" value
 * @method Rating              setKm()                 Sets the current record's "km" value
 * @method Rating              setCleanSatisfied()     Sets the current record's "clean_satisfied" value
 * @method Rating              setReserve()            Sets the current record's "Reserve" collection
 * @method Rating              setIdOwner()            Sets the current record's "idOwner" value
 * @method Rating              setIdRenter()           Sets the current record's "idOwner" value
 * 
 * @package    CarSharing
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRating extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('Rating');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('fecha_habilitada_desde', 'datetime', null, array(
             'type' => 'datetime',
             ));
        $this->hasColumn('idOwner', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('idRenter', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('state_owner', 'boolean', 1, array(
             'type' => 'boolean',
             'length' => 1,
             ));
        $this->hasColumn('state_renter', 'boolean', 1, array(
             'type' => 'boolean',
             'length' => 1,
             ));
        $this->hasColumn('opinion_about_owner', 'string', 455, array(
             'type' => 'string',
             'length' => 455,
             ));
        $this->hasColumn('opinion_about_renter', 'string', 455, array(
             'type' => 'string',
             'length' => 455,
             ));
        $this->hasColumn('op_recom_car', 'integer', 10, array(
             'type' => 'integer',
             'length' => 10,
             ));
        $this->hasColumn('coment_no_recom_car', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('op_desp_car', 'integer', 10, array(
             'type' => 'integer',
             'length' => 10,
             ));
        $this->hasColumn('coment_si_desp_car', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('op_recom_owner', 'integer', 10, array(
             'type' => 'integer',
             'length' => 10,
             ));
        $this->hasColumn('coment_no_recom_owner', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('op_recom_renter', 'integer', 10, array(
             'type' => 'integer',
             'length' => 10,
             ));
        $this->hasColumn('coment_no_recom_renter', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('op_cleaning_about_owner', 'integer', 10, array(
             'type' => 'integer',
             'length' => 10,
             ));
        $this->hasColumn('op_cleaning_about_renter', 'integer', 10, array(
             'type' => 'integer',
             'length' => 10,
             ));
        $this->hasColumn('op_puntual_about_owner', 'integer', 10, array(
             'type' => 'integer',
             'length' => 10,
             ));
        $this->hasColumn('op_puntual_about_renter', 'integer', 10, array(
             'type' => 'integer',
             'length' => 10,
             ));
        $this->hasColumn('time_delay_start_owner', 'integer', 50, array(
             'type' => 'integer',
             'length' => 50,
             ));
        $this->hasColumn('time_delay_end_owner', 'integer', 50, array(
             'type' => 'integer',
             'length' => 50,
             ));
        $this->hasColumn('time_delay_start_renter', 'integer', 50, array(
             'type' => 'integer',
             'length' => 50,
             ));
        $this->hasColumn('time_delay_end_renter', 'integer', 50, array(
             'type' => 'integer',
             'length' => 50,
             ));
        $this->hasColumn('fecha_calificacion_owner', 'datetime', null, array(
             'type' => 'datetime',
             ));
        $this->hasColumn('fecha_calificacion_renter', 'datetime', null, array(
             'type' => 'datetime',
             ));
        $this->hasColumn('qualified', 'varchar', null, array(
             'type' => 'varchar',
             'length' => 1,
             ));
        $this->hasColumn('clean_satisfied', 'varchar', null, array(
             'type' => 'varchar',
             'length' => 1,
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
        $this->hasMany('Reserve', array(
             'local' => 'id',
             'foreign' => 'Rating_id'));
    }
}
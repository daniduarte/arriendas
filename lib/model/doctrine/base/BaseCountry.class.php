<?php

/**
 * BaseCountry
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $States
 * 
 * @method integer             getId()     Returns the current record's "id" value
 * @method string              getName()   Returns the current record's "name" value
 * @method Doctrine_Collection getStates() Returns the current record's "States" collection
 * @method Country             setId()     Sets the current record's "id" value
 * @method Country             setName()   Sets the current record's "name" value
 * @method Country             setStates() Sets the current record's "States" collection
 * 
 * @package    CarSharing
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCountry extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('Country');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('name', 'string', 45, array(
             'type' => 'string',
             'length' => 45,
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
        $this->hasMany('State as States', array(
             'local' => 'id',
             'foreign' => 'Country_id'));
    }
}
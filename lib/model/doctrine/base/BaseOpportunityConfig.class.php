<?php

/**
 * BaseOpportunityConfig
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $max_iterations
 * @property integer $km_per_iteration
 * @property integer $exclusivity_time
 * 
 * @method integer              getId()                Returns the current record's "id" value
 * @method integer              getMaxIterations()     Returns the current record's "max_iterations" value
 * @method integer              getKmPerIteration()    Returns the current record's "km_per_iteration" value
 * @method integer              getExclusivityTime()   Returns the current record's "exclusivity_time" value
 *
 * @method OpportunityConfig    setId()                Sets the current record's "id" value
 * @method OpportunityConfig    setMaxIterations()     Sets the current record's "max_iterations" value
 * @method OpportunityConfig    setKmPerIteration()    Sets the current record's "km_per_iteration" value
 * @method OpportunityConfig    setExclusivityTime()   Sets the current record's "exclusivity_time" value
 * 
 * @package    CarSharing
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseOpportunityConfig extends sfDoctrineRecord {

    public function setTableDefinition() {

        $this->setTableName('OpportunityConfig');

        $this->hasColumn('id', 'integer', 4, array(
            'type' => 'integer',
            'primary' => true,
            'autoincrement' => true,
            'length' => 4
        ));
        $this->hasColumn('max_iterations', 'integer', 4, array(
            'type' => 'integer',
            'notnull' => true,
            'length' => 4
        ));
        $this->hasColumn('km_per_iteration', 'integer', 4, array(
            'type' => 'integer',
            'notnull' => true,
            'length' => 4
        ));
        $this->hasColumn('exclusivity_time', 'integer', 4, array(
            'type' => 'integer',
            'notnull' => true,
            'length' => 4
        ));

        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp() {
        
        parent::setUp();
    }
}
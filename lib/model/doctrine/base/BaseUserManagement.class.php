<?php

/**
 * BaseUserManagement
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property User $user
 * @property Management $management
 * @property string $commnet
 * @property timestamp $created_at
 * @property boolean $is_deleted
 * 
 * @method integer              getId()                Returns the current record's "id" value
 * @method User                 getUser()              Returns the current record's "User" value
 * @method Management           getManagement()        Returns the current record's "Management" value
 * @method string               getComment()           Returns the current record's "comment" value
 * @method timestamp            getCreatedAt()         Returns the current record's "created_at" value 
 * @method bolean               getIsDeleted()         Returns the current record's "is_deleted" value 
 *
 * @method UserManagement       setId()                Sets the current record's "id" value
 * @method UserManagement       setUser()              Sets the current record's "User" value
 * @method UserManagement       setManagement()        Sets the current record's "Management" value
 * @method UserManagement       setComment()           Sets the current record's "comment" value
 * @method UserManagement       setCreatedAt()         Sets the current record's "created_at" value
 * @method UserManagement       setIsDeleted()         Sets the current record's "is_deleted" value
 * 
 * @package    UserManagementSharing
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserManagement extends sfDoctrineRecord {

    public function setTableDefinition() {

        $this->setTableName('UserManagement');

        $this->hasColumn('id', 'integer', 4, array(
            'type' => 'integer',
            'primary' => true,
            'autoincrement' => true,
            'length' => 4
        ));
        $this->hasColumn('user_id', 'integer', 4, array(
            'type' => 'integer',
            'notnull' => true,
            'length' => 4
        ));
        $this->hasColumn('management_id', 'integer', 4, array(
            'type' => 'integer',
            'notnull' => true,
            'length' => 4
        ));
        $this->hasColumn('comment', 'string', 50, array(
            'type' => 'string',
            'length' => 50
        ));

        $this->hasColumn('created_at', 'timestamp', null, array(
             'type' => 'timestamp',
        ));

        $this->hasColumn('is_deleted', 'boolean', null, array(
            "default" => false
        ));

        $this->index('id_UNIQUE', array(
            'fields' => array(0 => 'id'),
            'type' => 'unique',
        ));

        $this->index('fk_UserManagement_User', array(
            'fields' => array(0 => 'user_id'),
        ));

        $this->index('fk_UserManagement_Management', array(
            'fields' => array(0 => 'management_id'),
        ));

        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp() {
        
        parent::setUp();

        $this->hasOne('User', array(
            'local' => 'user_id',
            'foreign' => 'id',
            'onDelete' => 'no action',
            'onUpdate' => 'no action'
        ));

        $this->hasOne('Management', array(
            'local' => 'management_id',
            'foreign' => 'id',
            'onDelete' => 'no action',
            'onUpdate' => 'no action'
        ));
    }
}
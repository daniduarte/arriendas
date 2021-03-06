<?php

abstract class BaseNotificationType extends sfDoctrineRecord {

    public function setTableDefinition() {

        $this->setTableName('NotificationType');
        
        $this->hasColumn('id', array(
            'type' => 'integer',
            'length' => 4,
            'primary' => true,
            'autoincrement' => true
        ));

        $this->hasColumn('created_at', array(
            'type' => 'datetime',
            'notnull' => true
        ));
        
        $this->hasColumn('description', array(
            'type' => 'text'
        ));

        $this->hasColumn('is_active', array(
            'type' => 'boolean',
            'default' => false
        ));

        $this->hasColumn('name', array(
            'type' => 'string',
            'length' => 255,
            'notnull' => true
        ));

        $this->option('charset', 'utf8');
        $this->option('type', 'InnoDB');
    }

    public function setUp() {

        parent::setUp();
        
        $this->hasMany('Notifications as Notification', array(
             'local' => 'id',
             'foreign' => 'notification_id'
        ));
    }
}
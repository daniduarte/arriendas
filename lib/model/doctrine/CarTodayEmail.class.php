<?php

/**
 * CarTodayEmail
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    CarTodayEmailSharing
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class CarTodayEmail extends BaseCarTodayEmail {
    
    public function getSignature() {
        return md5("Arriendas ~ ".$this->getSentAt());
    }
}
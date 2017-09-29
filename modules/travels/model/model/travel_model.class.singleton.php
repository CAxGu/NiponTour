<?php

/* $path = $_SERVER['DOCUMENT_ROOT'] . '/2ndoDAW/NiponTour/';
define('SITE_ROOT', $path);
require (SITE_ROOT . "modules/travels/model/BLL/travel_bll.class.singleton.php"); */
require ($_SERVER['DOCUMENT_ROOT'] . '/2ndoDAW/NiponTour/modules/travels/model/BLL/travel_bll.class.singleton.php');

class travel_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = travel_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_travel($arrArgument) {
        return $this->bll->create_travel_BLL($arrArgument);
    }
    
}



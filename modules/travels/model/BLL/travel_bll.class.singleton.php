<?php

/* $path = $_SERVER['DOCUMENT_ROOT'] . '/2ndoDAW/NiponTour/';
define('SITE_ROOT', $path);
define('MODEL_PATH', SITE_ROOT . 'model/');

require (MODEL_PATH . "Db.class.singleton.php");
require (SITE_ROOT . "modules/travels/model/DAO/travel_dao.class.singleton.php"); */

require ($_SERVER['DOCUMENT_ROOT'] . '/2ndoDAW/NiponTour/model/Db.class.singleton.php');
require ($_SERVER['DOCUMENT_ROOT'] . '/2ndoDAW/NiponTour/modules/travels/model/DAO/travel_dao.class.singleton.php');


class travel_bll {
    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = travel_dao::getInstance();
        $this->db = Db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_travel_BLL($arrArgument) {
        return $this->dao->create_travel_DAO($this->db, $arrArgument);
    }
}

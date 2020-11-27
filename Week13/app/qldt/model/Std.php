<?php
    namespace qldt\model;
    require_once("app/core/model/PDOData.php");
          
    class Std {
        private $db;
        public function __construct() { $this->db = new \core\model\PDOData();}
        public function __destruct() { $this->db = null;}
        public function getAll() {
            $sql = "select * from sinhvien;";
            return $this->db->doQuery($sql);
        }
    }         

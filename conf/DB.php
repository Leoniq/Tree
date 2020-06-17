<?php

namespace conf;
use PDO;

class DB {
    
    private $db;

    public function __construct() {
        $config = require 'config.php';
        $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET."", DB_USER, DB_PASS);
        if (!$this->db) {
            echo $this->db->errorInfo();
        }
    }
    
    public function query($sql) {
        return $this->db->query($sql);
    }
}
?>
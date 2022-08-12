<?php
        
Class DBconn {
    
    private $pdo;
    
    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
    }
    
    public function getPdo() {
        return $this->pdo;
    }
}

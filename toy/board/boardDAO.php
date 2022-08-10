<?php

class boardDAO {
    
    public function getList() {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "SELECT * FROM BOARD";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        return $result;
        
    }
    
    public function setAdd($array) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "
                INSERT INTO BOARD (id, title, content, regDate)
                VALUES (?, ?, ?, NOW())
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($array['id'], $array['title'], $array['content']));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
}
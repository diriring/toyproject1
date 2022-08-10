<?php

class memberDAO {
    
    public function getLogin($id, $pw) {
  
        
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $stmt = $pdo->prepare("SELECT id FROM MEMBER WHERE id = ? AND password = ?");
        $stmt->execute(array($id, $pw));
        // Fetch 모드 설정
        $result=$stmt->fetch(PDO::FETCH_BOTH);
        
        return $result['id'];
        
    }
    
    public function setAdd($array) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "
                INSERT INTO MEMBER (id, password, name, email, phone, regDate)
                VALUES (?, ?, ?, ?, ?, NOW())
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($array['id'], $array['password'], $array['name'], $array['email'], $array['phone']));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
}
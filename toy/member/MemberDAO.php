<?php

class MemberDAO {
    
    public function getLogin($id, $pw) {
  
        
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $stmt = $pdo->prepare("SELECT id FROM MEMBER WHERE id = ? AND password = ? AND isDel = 0");
        $stmt->execute(array($id, $pw));
        // Fetch 모드 설정
        $result=$stmt->fetch(PDO::FETCH_BOTH);
        
        return $result['id'];
        
    }
    
    public function getMyInfo($id) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $stmt = $pdo->prepare("SELECT id, name, email, phone FROM MEMBER WHERE id = ? AND isDel = 0");
        $stmt->execute(array($id));
        // Fetch 모드 설정
        $result=$stmt->fetch(PDO::FETCH_BOTH);
        
        return $result;
    }
    
    public function getPW($id) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $stmt = $pdo->prepare("SELECT password FROM MEMBER WHERE id = ?");
        $stmt->execute(array($id));
        $result=$stmt->fetch(PDO::FETCH_BOTH);
        
        return $result;
    }
    
    public function getIdCheck($input) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "SELECT COUNT(id) FROM MEMBER WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($input));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    public function getEmailCheck($input) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "SELECT COUNT(id) FROM MEMBER WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($input));
        
        $count = $stmt->rowCount();
        
        return $count;
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
    
    public function setUpdate($array) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "
                UPDATE MEMBER SET
                name = ?, email = ?, phone = ?
                WHERE id = ?
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($array['name'], $array['email'], $array['phone'], $array['id']));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    public function setMemberDelete($id) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "
                UPDATE MEMBER SET
                isDel = 1
                WHERE id = ?
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($id));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
}
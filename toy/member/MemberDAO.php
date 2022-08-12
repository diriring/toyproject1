<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBconn.php';

class MemberDAO {
    
    private $pdo;
    
    // PDO 객체 생성
    public function getPdo() {
        $conn = new DBconn();
        $this->pdo = $conn->getPdo();
        return $this->pdo;
    }
    
    // 로그인
    public function getLogin($id, $pw) {
        $sql = 'SELECT id FROM MEMBER WHERE id = ? AND password = ? AND isDel = 0';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute(array($id, $pw));
        // Fetch 모드 설정
        $result=$stmt->fetch(PDO::FETCH_BOTH);
        
        return $result['id'];
        
    }
    
    // 마이페이지 정보 조회
    public function getMyInfo($id) {
        $sql = 'SELECT id, name, email, phone FROM MEMBER WHERE id = ? AND isDel = 0';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute(array($id));
        // Fetch 모드 설정
        $result=$stmt->fetch(PDO::FETCH_BOTH);
        
        return $result;
    }
    
    // 회원 비밀번호 조회
    public function getPW($id) {
        $sql = 'SELECT password FROM MEMBER WHERE id = ?';
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute(array($id));
        $result=$stmt->fetch(PDO::FETCH_BOTH);
        
        return $result;
    }
    
    // 아이디 중복 조회
    public function getIdCheck($input) {
        $sql = "SELECT COUNT(id) FROM MEMBER WHERE id = ?";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute(array($input));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    //이메일 중복 조회
    public function getEmailCheck($input) {
        $sql = "SELECT COUNT(id) FROM MEMBER WHERE email = ?";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute(array($input));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    // 회원가입 정보 INSERT
    public function setAdd($array) {
        $sql = "
                INSERT INTO MEMBER (id, password, name, email, phone, regDate)
                VALUES (?, ?, ?, ?, ?, NOW())
                ";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute(array($array['id'], $array['password'], $array['name'], $array['email'], $array['phone']));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    // 회원 정보 UPDATE
    public function setUpdate($array) {
        $sql = "
                UPDATE MEMBER SET
                name = ?, email = ?, phone = ?
                WHERE id = ?
                ";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute(array($array['name'], $array['email'], $array['phone'], $array['id']));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    // 회원 탈퇴 처리
    public function setMemberDelete($id) {
        $sql = "
                UPDATE MEMBER SET
                isDel = 1
                WHERE id = ?
                ";
        $stmt = $this->getPdo()->prepare($sql);
        $stmt->execute(array($id));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
}
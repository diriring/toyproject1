<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBconn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/member/MemberVO.php';

class MemberDAO {
    
    private $pdo;
    
    public function __construct() {
        $conn = new DBconn();
        $this->pdo = $conn->getPdo();
    }
    
    // 로그인
    public function getLogin($id, $pw) {
        $sql = 'SELECT 
                    id 
                FROM 
                    MEMBER 
                WHERE 
                    id = :id AND 
                    password = :password AND 
                    isDel = 0';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->bindValue(':password', $pw, PDO::PARAM_STR);
        $stmt->execute();
        // Fetch 모드 설정
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result['id'];
        
    }
    
    // 마이페이지 정보 조회
    public function getMyInfo($id) {
        $sql = 'SELECT 
                    id, 
                    name, 
                    email, 
                    phone 
                FROM 
                    MEMBER 
                WHERE 
                    id = :id AND 
                    isDel = 0';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        // Fetch 모드 설정
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        
        $member = new MemberVO();
        $member->setId($result['id']);
        $member->setName($result['name']);
        $member->setEmail($result['email']);
        $member->setPhone($result['phone']);
        return $member;
    }
    
    // 회원 비밀번호 조회
    public function getPW($id) {
        $sql = 'SELECT
                    password 
                FROM 
                    MEMBER 
                WHERE 
                    id = :id';
        
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        
        $stmt->execute();
        
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }
    
    // 아이디 중복 조회
    public function getIdCheck($input) {
        $sql = 'SELECT 
                    COUNT(id) 
                FROM 
                    MEMBER 
                WHERE 
                    id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $input, PDO::PARAM_STR);
        $stmt->execute();
        
        $count = $stmt->fetchColumn();
        
        return $count;
    }
    
    // 이메일 중복 조회
    public function getEmailCheck($input) {
        $sql = 'SELECT 
                    COUNT(id) 
                FROM 
                    MEMBER 
                WHERE 
                    email = :email';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $input, PDO::PARAM_STR);
        $stmt->execute();
        
        $count = $stmt->fetchColumn();
        
        return $count;
    }
    
    // 회원가입 정보 INSERT
    public function setAdd($id, $password, $name, $email, $phone) {
        $sql = 'INSERT INTO 
                    MEMBER 
                    (id, password, name, email, phone, regDate)
                VALUES 
                    (:id, :password, :name, :email, :phone, NOW())';
        
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    // 회원 정보 UPDATE
    public function setUpdate($id, $name, $email, $phone) {
        $sql = 'UPDATE
                    MEMBER 
                SET
                    name = :name, 
                    email = :email, 
                    phone = :phone
                WHERE 
                    id = :id';
        
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    // 회원 탈퇴 처리
    public function setMemberDelete($id) {
        $sql = 'UPDATE 
                    MEMBER 
                SET
                    isDel = 1
                WHERE 
                    id = :id';
        
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
}
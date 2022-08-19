<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/member/MemberDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/member/MemberVO.php';

class MemberService {
    
    private $dao;
    
    public function __construct() {
        $this->dao = new MemberDAO();
    }
    
    /**
     * 로그인
     * @param string $id
     * @param string $pw
     */
    public function getLogin($id, $password) {
            //DB조회
            $result = $this->dao->getLogin($id, $password);
            
            $res = 0;
            
            //로그인 성공하면 리턴 값 1 반환
            if($result != null) {
                session_start();
                $_SESSION['id'] = $result;
                
                $res = 1;
            }
            
            return $res;
    }
    
    /**
     * 로그아웃
     */
    public function getLogout() {
        session_start();
        session_destroy();
    }
    
    /**
     * 마이페이지 정보 조회
     * @param string $id
     */
    public function getMyInfo($id) {
        
        $result = $this->dao->getMyInfo($id);
        
        return $result;
    }
    
    /**
     * 아이디 중복 조회
     * @param string $id
     */
    public function getIdCheck($id) {
        $result = $this->dao->getIdCheck($id);
        
        return $result;
    }
    
    /**
     * 이메일 중복 조회
     * @param string $email
     */
    public function getEmailCheck($email) {
        $result = $this->dao->getEmailCheck($email);

        return $result;
    }
    
    /**
     * 회원가입 인서트
     * @param string $id
     * @param string $password
     * @param string $name
     * @param string $email
     * @param string $phone
     */
    public function setAdd($id, $password, $name, $email, $phone) {
        $result = $this->dao->setAdd($id, $password, $name, $email, $phone);
        return $result;
           
    }
    
    /**
     * 회원 정보 업데이트
     * @param string $id
     * @param string $name
     * @param string $email
     * @param string $phone
     */
    public function setUpdate($id, $name, $email, $phone) {
        $result = $this->dao->setUpdate($id, $name, $email, $phone);
        
        return $result;
    }
    
    /**
     * 회원 탈퇴
     * @param string $id
     * @param string $password
     */
    public function setMemberDelete($id, $password) {
        $return = $this->dao->getPW($id);
        $pw = $return['password'];
        
        $result = 3;
        
        if ($password == $pw) {
            $result = $this->dao->setMemberDelete($id);
            if($result == 1) {
                session_start();
                session_destroy();
            }
        }
        
        return $result;
    }
    
}


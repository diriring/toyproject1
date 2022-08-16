<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/member/MemberDAO.php';

class MemberService {
    
    private $dao;
    
    public function __construct() {
        $this->dao = new MemberDAO();
    }
    
    //로그인
    public function getLogin() {
            //DB조회
            $result = $this->dao->getLogin($_POST['id'], $_POST['password']);
            
            $res = 0;
            
            //로그인 성공하면 리턴 값 1 반환
            if($result != null) {
                session_start();
                $_SESSION['id'] = $result;
                
                $res = 1;
            }
            
            return $res;
    }
    
    //로그아웃
    public function getLogout() {
        session_start();
        session_destroy();
    }
    
    //회원 정보 조회
    public function getMyInfo($id) {
        
        $result = $this->dao->getMyInfo($id);
        
        return $result;
    }
    
    //아이디 중복 체크
    public function getIdCheck() {
        $result = $this->dao->getIdCheck($_POST['id']);
        
        return $result;
    }
    
    //이메일 중복 체크
    public function getEmailCheck() {
        $result = $this->dao->getEmailCheck($_POST['email']);

        return $result;
    }
    
    //회원가입
    public function setAdd() {
        $result = $this->dao->setAdd($_POST);
        return $result;
           
    }
    
    //회원 정보 수정
    public function setUpdate() {
        $result = $this->dao->setUpdate($_POST);
        
        return $result;
    }
    
    //회원 탈퇴 처리
    public function setMemberDelete() {
        $return = $this->dao->getPW($_POST['id']);
        $pw = $return['password'];
        
        $result = 3;
        
        if ($_POST['password'] == $pw) {
            $result = $this->dao->setMemberDelete($_POST['id']);
            if($result == 1) {
                session_start();
                session_destroy();
            }
        }
        
        return $result;
    }
    
}

$service = new MemberService();
if (isset($_POST["call_name"])) {
    switch($_POST["call_name"]) {
        case "getLogin":
            echo $service->getLogin();
            return;
        case "setAdd":
            echo $service->setAdd();
            return;
        case "setUpdate":
            echo $service->setUpdate();
            return;
        case "setMemberDelete":
            echo $service->setMemberDelete();
            return;
        case "logout":
            echo $service->getLogout();
            return;
        case "getIdCheck":
            echo $service->getIdCheck();
            return;
        case "getEmailCheck":
            echo $service->getEmailCheck();
            return;
    };
}


<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/member/MemberDAO.php';

class MemberService {
    
    private $dao;
    
    public function getDao() {
        $this->dao = new MemberDAO();
        return $this->dao;
    }
    
    
    
    //로그인
    public function getLogin() {
            //DB조회
            $result = $this->getDao()->getLogin($_POST['id'], $_POST['password']);
            
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
        
        echo "<script>location.href = \"/index.php\";</script>";
    }
    
    //회원 정보 조회
    public function getMyInfo($id) {
        
        $result = $this->getDao()->getMyInfo($id);
        
        return $result;
    }
    
    //회원가입
    public function setAdd() {
        $result = $this->getDao()->setAdd($_POST);
        
        return $result;
           
    }
    
    //회원 정보 수정
    public function setUpdate() {
        $result = $this->getDao()->setUpdate($_POST);
        
        return $result;
    }
    
    //회원 탈퇴 처리
    public function setMemberDelete() {
        $return = $this->getDao()->getPW($_POST['id']);
        $pw = $return['password'];
        
        $result = 3;
        
        if ($_POST['password'] == $pw) {
            $result = $this->getDao()->setMemberDelete($_POST['id']);
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
    };
}
if (isset($_GET["call_name"])) {
    switch($_GET["call_name"]) {
        case "logout":
            echo $service->getLogout();
            return;
    };
}

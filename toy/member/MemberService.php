<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/member/MemberDAO.php';

class MemberService {
    
    private $dao;
    
    function getDao() {
        $this->dao = new MemberDAO();
        return $this->dao;
    }
    
    function test() {
        if($_POST['call_name'] == "test") {
            return "test실행";
        }
    }
    
    //로그인
    function getLogin() {
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
    function getLogout() {
        session_start();
        session_destroy();
        
        echo "<script>location.href = \"/index.php\";</script>";
    }
    
    function getMyInfo() {
        $result = $this->getDao()->getMyInfo($_SESSION['id']);
        
        return $result;
    }
    
    //회원가입
    function setAdd() {
        $result = $this->getDao()->setAdd($_POST);
        
        return $result;
           
    }
    
    //회원 정보 수정
    function setUpdate() {
        $result = $this->getDao()->setUpdate($_POST);
        
        return $result;
    }
    
    //회원 탈퇴 처리
    function setMemberDelete() {
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
        case "test":
            echo $service->test();
            return;
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
        
    };
}
if (isset($_GET["call_name"])) {
    switch($_GET["call_name"]) {
        case "logout":
            echo $service->getLogout();
            return;
        case "getMyInfo":
            echo $service->getMyInfo();
            return;

    };
}

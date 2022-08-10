<?php

include_once("./memberDAO.php");

class memberService {
    
    function test() {
        if($_POST['call_name'] == "test") {
            return "test실행";
        }
    }
    
    //로그인
    function getLogin() {
        if($_POST['call_name'] == "getLogin") {
            
            //DB조회
            $dao = new memberDAO();
            $result = $dao->getLogin($_POST['id'], $_POST['password']);
            
            $res = 0;
            
            //로그인 성공하면 리턴 값 1 반환
            if($result != null) {
                session_start();
                $_SESSION['id'] = $result;
                
                $res = 1;
            }
            
            return $res;
        }
    }
    
    //로그아웃
    function getLogout() {
        session_start();
        session_destroy();
    }
    
    //회원가입
    function setAdd() {
        $dao = new memberDAO();
        $result = $dao->setAdd($_POST);
        
        return $result;
           
    }
    
}

$service = new memberService();
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
    };
}
if($_GET["call_name"] == "logout") {
    $service->getLogout();
    echo "<script>location.href = \"/index.php\";</script>";
}
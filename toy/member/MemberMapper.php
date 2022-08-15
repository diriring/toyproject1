<?php
require_once './MemberService.php';

class MemberMapper {
    
    private $service;
    
    public function getService() {
        $this->service = new MemberService();
        return $this->service;
    }
    
    public function test($id) {
        return $id;
    }
    
    public function getMyInfo($id) {
        $member = $this->getService()->getMyInfo($id);
        $array = array('id'=>$member->getId(), 'name'=>$member->getName(), 'email'=>$member->getEmail(), 'phone'=>$member->getPhone());
        $json = json_encode($array);
        return $json;
    }
    
}

$mapper = new MemberMapper();

if (isset($_POST["call_name"])) {
    
    switch($_POST["call_name"]) {
        
        case "test":
            echo $mapper->test($_POST['id']);
            return;
            
        case "getMyInfo":
            echo $mapper->getMyInfo($_POST['id']);
            return;
            

    };
}
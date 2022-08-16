<?php
require_once './MemberService.php';

class MemberMapper {
    
    private $service;
    
    public function __construct() {
        $this->service = new MemberService();
    }
    
    public function test($id) {
        return $id;
    }
    
    public function getMyInfo($id) {
        $member = $this->service->getMyInfo($id);
        $array = array('id'=>$member->getId(), 'name'=>$member->getName(), 'email'=>$member->getEmail(), 'phone'=>$member->getPhone());
        $json = json_encode($array);
        return $json;
    }
    
}

$mapper = new MemberMapper();
if (isset($_POST["call_name"])) {
    switch ($_POST["call_name"]) {
        case "test":
            echo $mapper->test($_POST['id']);
            break;
        case "getMyInfo":
            echo $mapper->getMyInfo($_POST['id']);
            break;
    };
}
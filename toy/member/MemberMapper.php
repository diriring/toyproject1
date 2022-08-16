<?php
require_once './MemberService.php';
require_once './MemberVO.php';

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
    
    public function getLogin($id, $password) {
        return $this->service->getLogin($id, $password);
    }
    
    public function getLogout() {
        return $this->service->getLogout();
    }
    
    public function getIdCheck($id) {
        return $this->service->getIdCheck($id);
    }
    
    public function getEmailCheck($email) {
        return $this->service->getEmailCheck($email);
    }
    
    public function setAdd($id, $password, $name, $email, $phone) {
        return $this->service->setAdd($id, $password, $name, $email, $phone);
    }
    
    public function setUpdate($id, $name, $email, $phone) {
        return $this->service->setUpdate($id, $name, $email, $phone);
    }
    
    public function setMemberDelete($id, $password) {
        return $this->service->setMemberDelete($id, $password);
    }
}


$mapper = new MemberMapper();
if (isset($_POST['call_name'])) {
    switch ($_POST['call_name']) {
        
        case 'test':
            echo $mapper->test($_POST['id']);
            break;
        
        case 'getMyInfo':
            echo $mapper->getMyInfo($_POST['id']);
            break;
        
        case 'getLogin':
            echo $mapper->getLogin($_POST['id'], $_POST['password']);
            break;
            
        case 'getLogout':
            echo $mapper->getLogout();
            break;
            
        case 'getLogout':
            echo $mapper->getLogout();
            break;
            
        case 'getIdCheck':
            echo $mapper->getIdCheck($_POST['id']);
            break;
        
        case 'getEmailCheck':
            echo $mapper->getEmailCheck($_POST['email']);
            break;
            
        case 'setAdd':
            echo $mapper->setAdd($_POST['id'], $_POST['password'], $_POST['name'], $_POST['email'], $_POST['phone']);
            break;
        
        case 'setUpdate':
            echo $mapper->setUpdate($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone']);
            break;
            
        case 'setMemberDelete':
            echo $mapper->setMemberDelete($_POST['id'], $_POST['password']);
            break;
    };
}
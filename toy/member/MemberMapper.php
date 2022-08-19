<?php
require_once './MemberService.php';
require_once './MemberVO.php';

class MemberMapper {
    
    private $service;
    
    public function __construct() {
        $this->service = new MemberService();
    }

    
    /**
     * 마이페이지 정보 조회
     * @param string $id
     */
    public function getMyInfo($id) {
        $member = $this->service->getMyInfo($id);
        $array = array('id'=>$member->getId(), 'name'=>$member->getName(), 'email'=>$member->getEmail(), 'phone'=>$member->getPhone());
        $json = json_encode($array);
        return $json;
    }
    
    /**
     * 로그인
     * @param string $id
     * @param string $pw
     */
    public function getLogin($id, $password) {
        return $this->service->getLogin($id, $password);
    }
    
    /**
     * 로그아웃
     */
    public function getLogout() {
        return $this->service->getLogout();
    }
    
    /**
     * 아이디 중복 조회
     * @param string $id
     */
    public function getIdCheck($id) {
        return $this->service->getIdCheck($id);
    }
    
    /**
     * 이메일 중복 조회
     * @param string $email
     */
    public function getEmailCheck($email) {
        return $this->service->getEmailCheck($email);
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
        return $this->service->setAdd($id, $password, $name, $email, $phone);
    }
    
    /**
     * 회원 정보 업데이트
     * @param string $id
     * @param string $name
     * @param string $email
     * @param string $phone
     */
    public function setUpdate($id, $name, $email, $phone) {
        return $this->service->setUpdate($id, $name, $email, $phone);
    }
    
    /**
     * 회원 탈퇴
     * @param string $id
     * @param string $password
     */
    public function setMemberDelete($id, $password) {
        return $this->service->setMemberDelete($id, $password);
    }
}


$mapper = new MemberMapper();
if (isset($_POST['call_name'])) {
    switch ($_POST['call_name']) {
        
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
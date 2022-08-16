<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/reply/ReplyDAO.php';

class ReplyService {
    
    private $dao;
    
    public function __construct() {
        $this->dao = new ReplyDAO();
    }
    
    //댓글 목록 조회
    public function getList($bnum) {
        $result = $this->dao->getList($bnum);
        return $result;
    }
    
    // 댓글 등록
    public function setAdd() {
        return $this->dao->setAdd($_POST);
    }
}


$service = new ReplyService();
if (isset($_POST["call_name"])) {
    switch($_POST["call_name"]) {
        case "setAdd":
            echo $service->setAdd();
            return;
    };
}
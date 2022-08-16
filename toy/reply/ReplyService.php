<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/reply/ReplyDAO.php';

class ReplyService {
    
    private $dao;
    
    public function getDao() {
        $this->dao = new ReplyDAO();
        return $this->dao;
    }
    
    //댓글 목록 조회
    public function getList($bnum) {
        $result = $this->getDao()->getList($bnum);
        return $result;
    }
    
    // 댓글 등록
    public function setAdd() {
        return $this->getDao()->setAdd($_POST);
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
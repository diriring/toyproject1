<?php

require_once './ReplyService.php';

class ReplyMapper {
    private $service;
    
    public function __construct() {
        $this->service = new ReplyService();
    }
    
    /**
     * 댓글 목록 조회
     * @param int $bnum
     */
    public function getList($bnum) {
        $list = $this->service->getList($bnum);
        $replyList = array();
        
        foreach ($list as $row) {
            $replyList[] = $row;
        }
        
        $json = json_encode($replyList);
        
        return $json;
    }
    
    /**
     * 댓글 등록
     * @param int $bnum
     * @param string $id
     * @param string $content
     */
    public function setAdd($bnum, $id, $content) {
        return $this->service->setAdd($bnum, $id, $content);
    }
    
    /**
     * 댓글 삭제
     * @param int $rnum
     */
    public function setDelete($rnum) {
        return $this->service->setDelete($rnum);
    }
    
    /**
     * 댓글 수정
     * @param int $rnum
     * @param string $content
     */
    public function setUpdate($rnum, $content) {
        return $this->service->setUpdate($rnum, $content);
    }
    
}

$mapper = new ReplyMapper();
if (isset($_POST["call_name"])) {
    
    switch($_POST["call_name"]) {
        case "getList":
            echo $mapper->getList($_POST['bnum']);
            break;
            
        case "setAdd":
            echo $mapper->setAdd($_POST['bnum'], $_POST['id'], $_POST['content']);
            break;
            
        case "setDelete":
            echo $mapper->setDelete($_POST['rnum']);
            break;
            
        case "setUpdate":
            echo $mapper->setUpdate($_POST['rnum'], $_POST['content']);
            break; 
    };

}

// {"stauts", "desc" , "data or result"}

// 500
// 200
// 400 

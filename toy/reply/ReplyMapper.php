<?php

require_once './ReplyService.php';

class ReplyMapper {
    private $service;
    
    public function __construct() {
        $this->service = new ReplyService();
    }
    
    public function getList($bnum) {
        $list = $this->service->getList($bnum);
        $replyList = array();
        
        foreach ($list as $row) {
            $replyList[] = $row;
        }
        
        $json = json_encode($replyList);
        
        return $json;
    }
}

$mapper = new ReplyMapper();
if (isset($_POST["call_name"])) {
    
    switch($_POST["call_name"]) {
        case "getList":
            echo $mapper->getList($_POST['bnum']);
            break;   
    };

}

// {"stauts", "desc" , "data or result"}

// 500
// 200
// 400 

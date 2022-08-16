<?php

require_once './ReplyService.php';

class ReplyMapper {
    
    private $service;
    
    public function getService() {
        $this->service = new ReplyService();
        return $this->service;
    }
    
    public function getList($bnum) {
        $list = $this->getService()->getList($bnum);
        $replyList = array();
        
        foreach ($list as $row) {
            $replyList[] = $row;
        }
        
        $json = json_encode($replyList);
        
        // echo print_r($boardList);
        return $json;
    }
}


$mapper = new ReplyMapper();

if (isset($_POST["call_name"])) {
    
    switch($_POST["call_name"]) {

        case "getList":
            echo $mapper->getList($_POST['bnum']);
            return;   
    };
}
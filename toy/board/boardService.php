<?php

include_once $_SERVER['DOCUMENT_ROOT']."/board/boardDAO.php";

class boardService {
    
    public function getList() {
        $dao = new boardDAO();
        $result = $dao->getList();
        
        return $result;
    }
    
    public function setAdd() {
        
        $dao = new boardDAO();
        $result = $dao->setAdd($_POST);
        
        return $result;
    }
}

$service = new boardService();
if (isset($_POST["call_name"])) {
    switch($_POST["call_name"]) {
        case "setAdd":
            echo $service->setAdd();
            return;
        case "getList":
            echo $service->getList();
            return;
    };
}
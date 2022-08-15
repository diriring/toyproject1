<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/util/Pager.php';
require_once './BoardService.php';
// require_once '../board/BoardVO.php';

class BoardMapper {
    
    private $service;
    
    public function getService() {
        $this->service = new BoardService();
        return $this->service;
    }
    
    //게시글 목록 조회
    public function getList($pn) {
        $list = $this->getService()->getList($pn);
        $boardList = array();
        
        foreach ($list as $row) {
            $boardList[] = $row;
        }
        
        $json = json_encode($boardList);
        
        // echo print_r($boardList);
        return $json;
    }
    
    //페이지 번호
    public function getPage() {
            $pn = $_GET['pn'];
            if($_GET['pn'] == NULL) {
                $pn = 1;
            }
        
            $pager = new Pager(5, $pn);
            $totalCount = $this->getService()->getTotalCount();
            $pager->makeNum($totalCount);
            
            $array = array('startNum'=>$pager->getStartNum(), 'lastNum'=>$pager->getLastNum(),
                            'pre'=>$pager->getPre(), 'next'=>$pager->getNext());
            
            $json = json_encode($array);
        
            return $json;
    }
    
    //게시글 상세 조회
    public function getDetail($bnum) {
        $board = $this->getService()->getDetail($bnum);
        $json = json_encode($board);
        
        return $json;
    }
    
    //게시글 삭제
    public function setDelete($bnum) {
        $result = $this->getService()->setDelete($bnum);
        
        return $result;
    }
}

$mapper = new BoardMapper();

if (isset($_POST["call_name"])) {
    
    switch($_POST["call_name"]) {
        
        case "getList":
            echo $mapper->getList($_POST['pn']);
            return;
        case "getPage":
            echo $mapper->getPage();
            return;
        case "getDetail":
            echo $mapper->getDetail($_POST['bnum']);
            return;
        case "setDelete":
            echo $mapper->setDelete($_POST['bnum']);
            return;
    };
}
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/util/Pager.php';
require_once './BoardService.php';
require_once './BoardVO.php';

class BoardMapper {
    
    private $service;
    
    public function __construct() {
        $this->service = new BoardService();
    }
    
    //게시글 목록 조회
    public function getList($pn) {
        $list = $this->service->getList($pn);
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
            $totalCount = $this->service->getTotalCount();
            $pager->makeNum($totalCount);
            
            $array = array('startNum'=>$pager->getStartNum(), 'lastNum'=>$pager->getLastNum(),
                            'pre'=>$pager->getPre(), 'next'=>$pager->getNext());
            
            $json = json_encode($array);
        
            return $json;
    }
    
    //게시글 상세 조회
    public function getDetail($bnum) {
        $board = $this->service->getDetail($bnum);
        $json = json_encode($board);
        
        return $json;
    }
    
    public function setAdd($id, $title, $content) {
        
        $result = $this->service->setAdd($id, $title, $content);
        return $result;        
    }
    
    public function setUpdate($bnum, $title, $content) {
        $result = $this->service->setUpdate($bnum, $title, $content);
        return $result;   
    }
    
    
    //게시글 삭제
    public function setDelete($bnum) {
        $result = $this->service->setDelete($bnum);
        
        return $result;
    }
}

$mapper = new BoardMapper();

if (isset($_POST['call_name'])) {
    
    switch($_POST['call_name']) {
        
        case 'getList':
            echo $mapper->getList($_POST['pn']);
            break;
            
        case 'getPage':
            echo $mapper->getPage();
            break;
            
        case 'getDetail':
            echo $mapper->getDetail($_POST['bnum']);
            break;
            
        case 'setAdd':
            echo $mapper->setAdd($_POST['id'], $_POST['title'], $_POST['content']);
            break;
            
        case 'setUpdate':
            echo $mapper->setUpdate($_POST['bnum'], $_POST['title'], $_POST['content']);
            break;
            
        case 'setDelete':
            echo $mapper->setDelete($_POST['bnum']);
            break;
    };
}
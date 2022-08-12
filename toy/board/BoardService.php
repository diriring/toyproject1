<?php

include_once $_SERVER['DOCUMENT_ROOT']."/board/BoardDAO.php";
include_once $_SERVER['DOCUMENT_ROOT']."/util/Pager.php";

class BoardService {
    
    //게시글 목록 조회
    public function getList() {
        $dao = new BoardDAO();
        
        $pn = $_GET['pn'];
        if($_GET['pn'] == NULL) {
            $pn = 1;
        }
        
        $pager = new Pager(5, $pn);
        $pager->makeRow();
        
        $result = $dao->getList($pager->getStartRow(), $pager->getPerPage());
        
        return $result;
    }
    
    //게시글 수 조회
    public function getTotalCount() {
        $dao = new BoardDAO();
        
        $result = $dao->getTotalCount();
        
        return $result;
    }
    
    //게시글 정보 조회
    public function getDetail($bnum) {
        $dao = new BoardDAO();
        
        $dao->setCountHit($bnum);
        $result = $dao->getDetail($bnum);
        
        return $result;
    }
    
    //게시글 등록
    public function setAdd() {
        
        $dao = new BoardDAO();
        $result = $dao->setAdd($_POST);
        
        return $result;
    }
    
    //게시글 수정
    public function setUpdate() {
        
        $dao = new BoardDAO();
        $result = $dao->setUpdate($_POST);
        
        return $result;
    }
    
    //게시글 삭제
    public function setDelete() {
        $dao = new BoardDAO();
        $result = $dao->setDelete($_GET['bnum']);
        
        if($result == 1) {
            echo "<script>alert(\"삭제 성공\"); location.href = \"/view/boardList.php\";</script>";
        }else {
            echo "<script>alert(\"삭제 실패\"); location.href = \"/view/boardList.php\";</script>";
        }
    }
}

$service = new BoardService();
if (isset($_POST["call_name"])) {
    
    switch($_POST["call_name"]) {
        
        case "setAdd":
            echo $service->setAdd();
            return;
        
        case "setUpdate":
            echo $service->setUpdate();
            return;
        
//         case "getList":
//             echo $service->getList();
//             return;
    };
}
if($_GET["call_name"] == "setDelete") {
    echo $service->setDelete();
}
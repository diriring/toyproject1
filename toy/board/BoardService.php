<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/board/BoardDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/util/Pager.php';

/**
 * 게시판 서비스
 */
class BoardService {
    
    private $dao;
    
    public function __construct() {
        $this->dao = new BoardDAO();
    }
    
    /**
     * 게시글 목록 조회
     * @param int $pn
     */
    public function getList($pn) {
        
        $pager = new Pager(5, $pn);
        $pager->makeRow();
        $result = $this->dao->getList($pager->getStartRow(), $pager->getPerPage());
        
        $boardList = array();
        
        foreach ($result as $row) {
            $boardList[] = $row;
        }
        
        return $boardList;
    }
    
    public function getPage($pn) {
        
        $pager = new Pager(5, $pn);

        $totalCount = $this->dao->getTotalCount();
        
        $pager->makeNum($totalCount);
        
        $array = array('startNum'=>$pager->getStartNum(), 'lastNum'=>$pager->getLastNum(),
                        'pre'=>$pager->getPre(), 'next'=>$pager->getNext());
        return $array;
    }
    
    /**
     * 게시글 수 조회
     */
    public function getTotalCount($kind, $search) {

        $result = $this->dao->getTotalCount();
        
        return $result;
    }
    
    /**
     * 게시판 정보 조회
     * @param int $bnum
     */
    public function getDetail($bnum) {
        
        $this->dao->setCountHit($bnum);
        $result = $this->dao->getDetail($bnum);
        
        return $result;
    }
    
    /**
     * 게시판 글 등록
     * @param string $id
     * @param string $title
     * @param string $content
     * @param int $cnum
     */
    public function setAdd($id, $title, $content, $cnum) {
        
        $board = array('id'=>$id, 'title'=>$title, 'content'=>$content, 'cnum'=>$cnum);
        $result = $this->dao->setAdd($board);
        
        return $result;
    }
    
    /**
     * 게시판 글 수정
     * @param string $id
     * @param string $title
     * @param string $content
     * @param int $cnum
     */
    public function setUpdate($bnum, $title, $content, $cnum) {
        
        $board = array('bnum'=>$bnum, 'title'=>$title, 'content'=>$content, 'cnum'=>$cnum);
        $result = $this->dao->setUpdate($board);
        
        return $result;
    }
    
    /**
     * 게시판 글 삭제
     * @param int $bnum
     */
    public function setDelete($bnum) {

        $result = $this->dao->setDelete($bnum);
        
        return $result;
        
    }
    
    /**
     * 게시판 글 목록 조회
     * @param int $pn
     * @param string $kind
     * @param string $search
     */
    public function getSearch($pn, $kind, $search) {
        $pager = new Pager(5, $pn);
        $pager->makeRow();
        $result = $this->dao->getSearch($pager->getStartRow(), $pager->getPerPage(), $kind, $search);
        
        $boardList = array();
        
        foreach ($result['result'] as $row) {
            $boardList[] = $row;
        }
        
        $result['result'] =$boardList;
        
        return $result;
    }
    
    /**
     * 게시판 글 페이지 생성
     * @param int $pn
     * @param string $kind
     * @param string $search
     */
    public function getSearchPage($pn, $kind, $search) {
        
        $pager = new Pager(5, $pn);
        
        $result = $this->dao->getTotalSearch($kind, $search);
        
        $pager->makeNum($result['result']);
        
        $array = array('startNum'=>$pager->getStartNum(), 'lastNum'=>$pager->getLastNum(),
                        'pre'=>$pager->getPre(), 'next'=>$pager->getNext(), 'totalCount'=>$result['result']);
        
        $result['result'] = $array;
        
        return $result;
    }
    
    /**
     * 글 개수 조회
     * @param string $kind
     * @param string $search
     */
    public function getTotalSearch($kind, $search) {
        return $this->dao->getTotalSearch($kind, $search);
    }
}


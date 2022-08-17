<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/reply/ReplyDAO.php';

class ReplyService {
    
    private $dao;
    
    public function __construct() {
        $this->dao = new ReplyDAO();
    }
    
    /**
     * 댓글 목록 조회
     * @param int $bnum
     */
    public function getList($bnum) {
        $result = $this->dao->getList($bnum);
        return $result;
    }
    
    /**
     * 댓글 등록
     * @param int $bnum
     * @param string $id
     * @param string $content
     */
    public function setAdd($bnum, $id, $content) {
        return $this->dao->setAdd($bnum, $id, $content);
    }
    
    /**
     * 댓글 삭제
     * @param int $rnum
     */
    public function setDelete($rnum) {
        return $this->dao->setDelete($rnum);
    }
    
    /**
     * 댓글 수정
     * @param int $rnum
     * @param string $content
     */
    public function setUpdate($rnum, $content) {
        return $this->dao->setUpdate($rnum, $content);
    }
}

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBconn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/reply/ReplyVO.php';

class ReplyDAO {
    
    private $pdo;
    
    public function __construct() {
        $conn = new DBconn();
        $this->pdo = $conn->getPdo();
    }


    /**
     * 댓글 목록 조회
     * @param int $bnum
     */
    public function getList($bnum) {
        
        $sql = 'SELECT 
                    rnum, 
                    id, 
                    bnum, 
                    content, 
                    regDate 
                FROM 
                    REPLY 
                WHERE 
                    bnum = :bnum';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':bnum', $bnum, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
    
    /**
     * 댓글 등록
     * @param int $bnum
     * @param string $id
     * @param string $content
     */
    public function setAdd($bnum, $id, $content) {
        
        $sql = 'INSERT INTO 
                    REPLY 
                    (id, bnum, content, regDate)
                VALUES 
                    (:id, :bnum, :content, NOW())';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->bindValue(':bnum', $bnum, PDO::PARAM_INT);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    /**
     * 댓글 삭제
     * @param int $rnum
     */
    public function setDelete($rnum) {
        $sql = 'DELETE FROM 
                    REPLY 
                WHERE 
                    rnum = :rnum';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':rnum', $rnum, PDO::PARAM_INT);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    /**
     * 댓글 수정
     * @param int $rnum
     * @param string $content
     */
    public function setUpdate($rnum, $content) {
        $sql = 'UPDATE 
                    REPLY 
                SET 
                    content = :content 
                WHERE 
                    rnum = :rnum';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':rnum', $rnum, PDO::PARAM_INT);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    
}
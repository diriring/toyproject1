<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBconn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/reply/ReplyVO.php';

class ReplyDAO {
    
    private $pdo;
    
    public function __construct() {
        $conn = new DBconn();
        $this->pdo = $conn->getPdo();
    }

    // 댓글 개수 카운트
    
    // 댓글 목록 조회
    public function getList($bnum) {
//         $sql = 'SELECT
//                     rnum,
//                     id,
//                 FROM
//                     REPLY
//                 WHERE'
        
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
    
    // 댓글 등록
    public function setAdd($array) {
        
        $sql = 'INSERT INTO 
                    REPLY 
                    (id, bnum, content, regDate)
                VALUES 
                    (:id, :bnum, :content, NOW())';
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $array['id'], PDO::PARAM_STR);
        $stmt->bindValue(':bnum', $array['bnum'], PDO::PARAM_INT);
        $stmt->bindValue(':content', $array['content'], PDO::PARAM_STR);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    
}
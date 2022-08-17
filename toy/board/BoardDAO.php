<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/util/Pager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/util/DBconn.php';

class BoardDAO {
    
    private $pdo;
    
    public function __construct() {
        $conn = new DBconn();
        $this->pdo = $conn->getPdo();
    }
    
    public function getList($startRow, $perPage) {

        $sql = 'SELECT 
                    bnum, 
                    id, 
                    title, 
                    content, 
                    regDate, 
                    hit 
                FROM 
                    BOARD 
                WHERE 
                    bnum > 0
                ORDER BY 
                    bnum DESC
                LIMIT 
                    :startRow, :perPage';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':startRow', $startRow, PDO::PARAM_INT);
        $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        return $result;
        
    }
    
    public function getTotalCount() {
        $sql = 'SELECT COUNT(bnum) FROM BOARD';
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute();
        
        //행의 첫번째 컬럼을 리턴
        $result = $stmt->fetchColumn();
        
        return $result;
        
    }
    
    public function getDetail($bnum) {
        $sql = 'SELECT * FROM BOARD WHERE bnum = ?';
        $stmt = $this->pdo->prepare($sql);

        $result = $stmt->execute(array($bnum));    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }
    
    public function setAdd($array) {
        $sql = '
                INSERT INTO BOARD (id, title, content, regDate)
                VALUES (:id, :title, :content, NOW())
                ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $array['id'], PDO::PARAM_STR);
        $stmt->bindValue(':title', $array['title'], PDO::PARAM_STR);
        $stmt->bindValue(':content', $array['content'], PDO::PARAM_STR);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    public function setUpdate($array) {
        $sql = '
                UPDATE BOARD SET
                title = :title, content = :content, editDate = NOW()
                WHERE bnum = :bnum
                ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':title', $array['title'], PDO::PARAM_STR);
        $stmt->bindValue(':content', $array['content'], PDO::PARAM_STR);
        $stmt->bindValue(':bnum', $array['bnum'], PDO::PARAM_INT);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    public function setDelete($bnum) {
        $sql = 'DELETE FROM BOARD WHERE bnum = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($bnum));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    public function setCountHit($bnum) {
        $sql = 'UPDATE BOARD SET hit = hit+1 WHERE bnum = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($bnum));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
}
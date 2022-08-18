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
                    bd.bnum, 
                    bd.id, 
                    bd.title, 
                    bd.content, 
                    bd.regDate, 
                    bd.hit,
                    ct.name 
                FROM 
                    BOARD bd
                INNER JOIN
                    CATEGORY ct
                    ON (bd.cnum = ct.cnum)
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
        $sql = 'SELECT 
                    COUNT(bnum) 
                FROM 
                    BOARD 
                WHERE 
                    bnum > 0';

        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute();
        
        //행의 첫번째 컬럼을 리턴
        $result = $stmt->fetchColumn();
        
        return $result;
        
    }
    
    public function getDetail($bnum) {
        $sql = 'SELECT
                    bd.bnum,
                    bd.id,
                    bd.title,
                    bd.content,
                    bd.regDate,
                    bd.hit,
                    ct.cnum,
                    ct.name
                FROM
                    BOARD bd
                INNER JOIN
                    CATEGORY ct
                    ON (bd.cnum = ct.cnum)
                WHERE 
                    bnum = :bnum';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':bnum', $bnum, PDO::PARAM_INT);
        $result = $stmt->execute();    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }
    
    public function setAdd($array) {
        $sql = '
                INSERT INTO BOARD (id, title, content, cnum, regDate)
                VALUES (:id, :title, :content, :cnum, NOW())
                ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $array['id'], PDO::PARAM_STR);
        $stmt->bindValue(':title', $array['title'], PDO::PARAM_STR);
        $stmt->bindValue(':content', $array['content'], PDO::PARAM_STR);
        $stmt->bindValue(':cnum', $array['cnum'], PDO::PARAM_INT);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    public function setUpdate($array) {
        $sql = '
                UPDATE BOARD SET
                title = :title, content = :content, cnum = :cnum, editDate = NOW()
                WHERE bnum = :bnum
                ';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':title', $array['title'], PDO::PARAM_STR);
        $stmt->bindValue(':content', $array['content'], PDO::PARAM_STR);
        $stmt->bindValue(':cnum', $array['cnum'], PDO::PARAM_INT);
        $stmt->bindValue(':bnum', $array['bnum'], PDO::PARAM_INT);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    public function setDelete($bnum) {
        $sql = 'DELETE FROM BOARD WHERE bnum = :bnum';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':bnum', $bnum, PDO::PARAM_INT);
        $stmt->execute();
        
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
    
    public function getSearch($startRow, $perPage, $kind, $search) {
        $sql = '';
        switch($kind) {
            
            case 'title':
                $sql = 'SELECT
                            bd.bnum,
                            bd.id,
                            bd.title,
                            bd.content,
                            bd.regDate,
                            bd.hit,
                            ct.name
                        FROM
                            BOARD bd
                        INNER JOIN
                            CATEGORY ct
                            ON (bd.cnum = ct.cnum)
                        WHERE
                            title LIKE CONCAT("%", :search, "%")
                            
                        ORDER BY
                            bnum DESC
                        LIMIT
                            :startRow, :perPage';
                break;
                
            case 'content':
                $sql = 'SELECT
                            bd.bnum,
                            bd.id,
                            bd.title,
                            bd.content,
                            bd.regDate,
                            bd.hit,
                            ct.name
                        FROM
                            BOARD bd
                        INNER JOIN
                            CATEGORY ct
                            ON (bd.cnum = ct.cnum)
                        WHERE
                            content LIKE CONCAT("%", :search, "%")
                    
                        ORDER BY
                            bnum DESC
                        LIMIT
                            :startRow, :perPage';
                break;
                
            case 'id':
                $sql = 'SELECT
                            bd.bnum,
                            bd.id,
                            bd.title,
                            bd.content,
                            bd.regDate,
                            bd.hit,
                            ct.name
                        FROM
                            BOARD bd
                        INNER JOIN
                            CATEGORY ct
                            ON (bd.cnum = ct.cnum)
                        WHERE
                            id LIKE CONCAT("%", :search, "%")
                    
                        ORDER BY
                            bnum DESC
                        LIMIT
                            :startRow, :perPage';
                break;
        }
        
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':startRow', $startRow, PDO::PARAM_INT);
        $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':search', $search, PDO::PARAM_STR);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
           
//         $result = array('startRow'=>$startRow, 'perPage'=>$perPage, 'kind'=>$kind, 'search'=>$search);
        
        return $result;
    }
    
    public function getTotalSearch($kind, $search) {
        $sql = '';
        switch($kind) {
            
            case 'title':
                $sql = 'SELECT
                            COUNT(bnum)
                        FROM
                            BOARD
                        WHERE
                            title LIKE CONCAT("%", :search, "%")';
                break;
                
            case 'content':
                $sql = 'SELECT
                            COUNT(bnum)
                        FROM
                            BOARD
                        WHERE
                            content LIKE CONCAT("%", :search, "%")';
                break;
                
            case 'id':
                $sql = 'SELECT
                            COUNT(bnum)
                        FROM
                            BOARD
                        WHERE
                            id LIKE CONCAT("%", :search, "%")';
                break;
        }

        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':search', $search, PDO::PARAM_STR);
        $stmt->execute();
        
        //행의 첫번째 컬럼을 리턴
        $result = $stmt->fetchColumn();
        
        return $result;
        
    }
    
}
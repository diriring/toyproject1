<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/util/Pager.php';

class BoardDAO {
    
    private $pdo;
    
    public function getList($startRow, $perPage) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
//         $sql = "SELECT * FROM BOARD WHERE bnum > 0 ORDER BY bnum DESC";
        $sql = "SELECT * FROM BOARD WHERE bnum > 0
                ORDER BY bnum DESC
                LIMIT $startRow, $perPage";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        return $result;
        
    }
    
    public function getTotalCount() {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "SELECT COUNT(bnum) FROM BOARD";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute();
        
        //행의 첫번째 컬럼을 리턴
        $result = $stmt->fetchColumn();
        
        return $result;
        
    }
    
    public function getDetail($bnum) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "SELECT * FROM BOARD WHERE bnum = ?";
        $stmt = $pdo->prepare($sql);

        $result = $stmt->execute(array($bnum));    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }
    
    public function setAdd($array) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "
                INSERT INTO BOARD (id, title, content, regDate)
                VALUES (?, ?, ?, NOW())
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($array['id'], $array['title'], $array['content']));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    public function setUpdate($array) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "
                UPDATE BOARD SET
                title = ?, content = ?, editDate = NOW()
                WHERE bnum = ?
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($array['title'], $array['content'], $array['bnum']));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    public function setDelete($bnum) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "DELETE FROM BOARD WHERE bnum = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($bnum));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
    public function setCountHit($bnum) {
        $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");
        $sql = "UPDATE BOARD SET hit = hit+1 WHERE bnum = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($bnum));
        
        $count = $stmt->rowCount();
        
        return $count;
    }
    
}
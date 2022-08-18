<?php
// $pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");

// $sql = 'INSERT INTO
//             CATEGORY
//             (cnum, name)
//         VALUES
//             (:cnum, :name)';

// $stmt = $pdo->prepare($sql);

// $stmt->bindValue(':cnum', $_POST['cnum'], PDO::PARAM_STR);
// $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);


// $stmt->execute();

// $count = $stmt->rowCount();

// echo $count;

$pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");

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
            0, 5';

$stmt = $pdo->prepare($sql);

$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$boardList = array();

foreach ($result as $row) {
    $boardList[] = $row;
}



echo json_encode($boardList);
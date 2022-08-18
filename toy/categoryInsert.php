<?php
$pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");

$sql = 'INSERT INTO
            CATEGORY
            (cnum, name)
        VALUES
            (:cnum, :name)';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':cnum', $_POST['cnum'], PDO::PARAM_STR);
$stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);


$stmt->execute();

$count = $stmt->rowCount();

echo $count;
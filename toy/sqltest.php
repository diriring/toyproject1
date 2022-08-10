<?php
$dbHost = "localhost";      // 호스트 주소(localhost, 120.0.0.1)
$dbName = "toyproject";      // 데이타 베이스(DataBase) 이름
$dbUser = "root";          // DB 아이디
$dbPass = "gkst2zip";        // DB 패스워드

// PDO + MariaDB 연결하기
// $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);
// $statement = $pdo -> query("SELECT id FROM MEMBER WHERE id = 'id1' AND password = 'qwerty'");
// $row = $statement -> fetch(PDO::FETCH_ASSOC);
// echo htmlentities($row['id']);

$pdo = new PDO("mysql:host=localhost;dbname=toyproject", "root", "gkst2zip");

// $statement = $pdo -> query("SELECT CURDATE() AS date FROM DUAL");
// $row = $statement -> fetch(PDO::FETCH_ASSOC);
// echo htmlentities($row['date']);
$stmt = $pdo->prepare("SELECT id FROM MEMBER WHERE id = ? AND password = ?");
$stmt->execute(array('id1', 'qwerty'));

// Fetch 모드 설정
$result=$stmt->fetch(PDO::FETCH_BOTH);

echo $result['id'];

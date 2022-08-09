<?php
echo 'MySQL 연결 테스트<br>';

$db = mysqli_connect("localhost", "root", "gkst2zip", "testproject");

if($db) {
    echo "connect : 성공<br>";
}else {
    echo "disconnect : 실패<br>";
}
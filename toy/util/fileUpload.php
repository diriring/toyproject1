<?php
// 설정
$uploads_dir = '../resources/img/';
$date = date("YmdHis");

// 변수 정리
$name = $_FILES['files']['name'];
$ext = array_pop(explode('.', $name));

$src = $uploads_dir . $date . '.' . $ext;

// 파일 이동
move_uploaded_file( $_FILES['files']['tmp_name'], $src);

echo $src;
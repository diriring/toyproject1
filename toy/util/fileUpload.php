<?php
// 설정
$uploads_dir = '../resources/img/';
$date = date("YmdHis");
// $allowed_ext = array('jpg','jpeg','png','gif');

// 변수 정리
// $error = $_FILES['myfile']['error'];
$name = $_FILES['files']['name'];
$ext = array_pop(explode('.', $name));

$src = $uploads_dir . $date . '.' . $ext;
// 파일 이동
move_uploaded_file( $_FILES['files']['tmp_name'], $src);

// 파일 정보 출력
// echo $uploads_dir/$name;

echo $src;
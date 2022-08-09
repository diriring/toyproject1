<?php
echo 'join insert';

// $id = $_POST['id'];
// $password = $_POST['password'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];

// echo $id;
// echo $password;
// echo $email;
// echo $phone;

$conn = mysqli_connect("localhost", "root", "gkst2zip", "toyproject");
$sql = "
    INSERT INTO MEMBER (id, password, name, email, phone, regDate)
    VALUES ('{$_POST['id']}', '{$_POST['password']}', '{$_POST['name']}', '{$_POST['email']}', '{$_POST['phone']}', NOW()
    )";

$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo mysqli_error($conn);
} else {
    echo '회원가입 성공';
}
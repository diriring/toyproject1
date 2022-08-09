<?php
$conn = mysqli_connect("localhost", "root", "gkst2zip", "toyproject");
$sql = "
    SELECT id, name, email, phone, regDate FROM MEMBER WHERE id = '{$_POST['id']}' AND password = '{$_POST['password']}' 
    ";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);

if ($row != null) {
    //로그인 성공
    session_start();
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['regDate'] = $row['regDate'];
    
//     echo $_SESSION['id'];
//     echo $_SESSION['name'];
//     echo $_SESSION['email'];
//     echo $_SESSION['phone'];
//     echo $_SESSION['regDate'];
?>    
    <script>
    alert("로그인 성공");
    location.href = "./index.php";
    </script>
    
<?php
} else {
    //로그인 실패
?>
    <script>
    alert("로그인 실패");
    location.href = "./login.php";
    </script>
<?php     
}
?>



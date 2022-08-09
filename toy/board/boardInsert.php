<?php
$conn = mysqli_connect("localhost", "root", "gkst2zip", "toyproject");
$sql = "
    INSERT INTO BOARD (id, title, content, regDate)
    VALUES ('{$_POST['id']}', '{$_POST['title']}', '{$_POST['content']}', NOW()
    )";

$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo mysqli_error($conn);
} else {
?>
    <script>
    alert("등록 성공");
    location.href = "./boardList.php";
    </script>
<?php    
}
?>
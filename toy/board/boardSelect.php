<?php
include '../temp/bootstrap.php';

$conn = mysqli_connect("localhost", "root", "gkst2zip", "toyproject");
$sql = "
    SELECT * FROM BOARD ORDER BY bnum DESC LIMIT 50
    ";

$result = mysqli_query($conn, $sql);

if($result === false) {
    die(mysql_error());
}

$row = mysqli_fetch_array($result);
while($row) {
?>

<?php
}
?>
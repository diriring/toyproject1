<?php
session_start();

include '../temp/bootstrap.php';

include_once("../member/MemberService.php");

$service = new MemberService();

$member = $service->getMyInfo();

?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Page</title>
</head>

<body>
	
	<?php include '../temp/header.php';?>

	<div class="container">
    	<h1>My Page</h1>
    	<h3>환영합니다 <?php echo $member['id'];?>님.</h3>
		<table>
			<tr>
				<td>아이디</td>
				<td><?php echo $member['id'];?></td>
			</tr>
			<tr>
				<td>이름</td>
				<td><?php echo $member['name'];?></td>
			</tr>
			<tr>
				<td>email</td>
				<td><?php echo $member['email'];?></td>
			</tr>
			<tr>
				<td>전화번호</td>
				<td><?php echo $member['phone'];?></td>
			</tr>
		</table>
		<a class="btn btn-outline-primary" href="./memberUpdate.php">회원 정보 수정</a>
		<a class="btn btn-outline-primary" href="./memberDelete.php">회원 탈퇴</a>
	</div>
</body>

</html>
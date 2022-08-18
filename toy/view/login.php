<?php 
require_once '../temp/bootstrap.php';
?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Page</title>
</head>

<body>
	
	<?php require_once '../temp/header.php';?>

	<div class="container">
    	<h1>Login Page</h1>
		<form action="#" method="POST">
        	<div class="mb-3">
              <label for="id" class="form-label">ID</label>
              <input type="text" class="form-control" name="id" id="id" placeholder="아이디를 입력해주세요.">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">비밀번호</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="비밀번호를 입력해주세요.">
            </div>
            <div class="mb-3">
              <button type="button" id="loginBtn" class="btn btn-primary mb-3">로그인</button>
            </div>
        </form>
	</div>
	
<script src="../resources/js/memberLogin.js"></script>

</body>

</html>

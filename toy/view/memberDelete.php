<?php

session_start();

require_once '../temp/bootstrap.php';
?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Member Delete Page</title>
</head>
<body>

	<?php require_once '../temp/header.php';?>
	
	<div class="container">
	
		<blockquote class="blockquote">
          <h1 class="my-4">회원탈퇴</h1>
          <footer class="blockquote-footer">탈퇴 하시려면 비밀번호를 입력해주세요.</footer>
        </blockquote>

        <div class="mb-3">
          <label for="password" class="form-label">비밀번호</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="비밀번호를 입력해주세요.">
        </div>
        
        <div class="mb-3">
          <button type="button" id="deleteBtn" class="btn btn-primary mb-3" data-id="<?php echo $_SESSION['id'];?>">회원 탈퇴</button>
        </div>
	</div>

<script src="../resources/js/memberDelete.js"></script>

</body>
</html>
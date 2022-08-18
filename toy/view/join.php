<?php 
require_once '../temp/bootstrap.php';
?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Join Page</title>
</head>

<body>

	<?php require_once '../temp/header.php';?>
	
	<div class="container">
	
		<blockquote class="blockquote">
          <h1 class="my-4">회원가입</h1>
          <footer class="blockquote-footer">보드게임을 좋아하는 모든 분을 환영합니다.</footer>
        </blockquote>
	
    	<div class="mb-3">
          <label for="id" class="form-label">ID</label>

          <div class="input-group">
              <input type="text" class="form-control" name="id" id="id" placeholder="아이디를 입력해주세요.">
              <button type="button" id="idCheckBtn" class="btn btn-outline-secondary">중복확인</button>
          </div>

        </div>
        <div class="mb-3">
          <label for="password" class="form-label">비밀번호</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="비밀번호를 입력해주세요.">
          <div id="pwCheckResult"></div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">비밀번호 확인</label>
          <input type="password" class="form-control" name="rePassword" id="rePassword" placeholder="비밀번호를 다시 입력해주세요.">
          <div id="rePwCheckResult"></div>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">이름</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="이름을 입력해주세요.">
        </div>
        
        <div class="mb-3">
          <label for="email" class="form-label">E-Mail</label>
          <div class="input-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="이메일을 입력해주세요.	ex)email@example.com">
              <button type="button" id="emailCheckBtn" class="btn btn-outline-secondary">중복확인</button>
          </div>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" class="form-control" name="phone" id="phone" placeholder="전화번호를 입력해주세요.">
          <div>전화번호는 010-xxxx-xxxx 형식으로 입력해주세요.</div>
        </div>
        
        <div class="mb-3">
          <button type="button" id="joinBtn" class="btn btn-primary mb-3">회원가입</button>
        </div>

	</div>

<script src="../resources/js/memberJoin.js"></script>

</body>

</html>
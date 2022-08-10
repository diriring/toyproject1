<?php 
include '../temp/bootstrap.php';
?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Join Page</title>
</head>

<body>

	<?php include '../temp/header.php';?>

	<h1>Join Page</h1>
	
	<div class="container">
	
	<form action="joinInsert.php" method="POST">
    	<div class="mb-3">
          <label for="id" class="form-label">ID</label>
          <input type="text" class="form-control" name="id" id="id" placeholder="아이디를 입력해주세요.">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">비밀번호</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="비밀번호를 입력해주세요.">
        </div>
<!--         <div class="mb-3"> -->
<!--           <label for="password" class="form-label">비밀번호 확인</label> -->
<!--           <input type="password" class="form-control" name="id" id="password" placeholder="비밀번호를 다시 입력해주세요."> -->
<!--         </div> -->
        <div class="mb-3">
          <label for="name" class="form-label">이름</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="이름을 입력해주세요.">
        </div>
        
        <div class="mb-3">
          <label for="email" class="form-label">E-Mail</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="이메일을 입력해주세요.">
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" class="form-control" name="phone" id="phone" placeholder="전화번호를 입력해주세요.">
        </div>
        
        <div class="mb-3">
          <button type="button" id="joinBtn" class="btn btn-primary mb-3">회원가입</button>
        </div>
    </form>
    
	</div>

<script>
		$("#joinBtn").on("click", function() {
			console.log("클릭");
    		$.ajax({
    			type: "POST",
    			url: "/member/memberService.php",
    			data: {
    				id: $("#id").val(),
    				password: $("#password").val(),
					name: $("#name").val(),
					email: $("#email").val(),
					phone: $("#phone").val(),
    				call_name: "setAdd"
    			},
    			success: function(result) {
    				console.log(result);
    				if(result == 1) {
    					alert("회원가입 성공");
    					location.href="./index.php";
    					
    				}else {
    					alert("회원가입 실패");
    					location.href="./join.php";
    				}
    			},
    			error: function() {
    				alert("에러");
    			}
    		});
    	});
</script>

</body>

</html>
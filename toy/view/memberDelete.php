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
	
		
		<h1>Member Delete Page</h1>
		<h3>회원 탈퇴 하시려면 비밀번호를 입력 해주세요.</h3>
        <div class="mb-3">
          <label for="password" class="form-label">비밀번호</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="비밀번호를 입력해주세요.">
        </div>
        
        <div class="mb-3">
          <button type="button" id="deleteBtn" class="btn btn-primary mb-3" data-id="<?php echo $_SESSION['id'];?>">회원 탈퇴</button>
        </div>
	</div>

<script>
	$("#deleteBtn").on("click", function() {
		console.log("클릭");
		$.ajax({
			type: "POST",
			url: "/member/MemberMapper.php/",
			data: {
				id: $("#deleteBtn").attr("data-id"),
				password: $("#password").val(),
				call_name: "setMemberDelete"
			},
			success: function(result) {
				console.log(result);
				if(result == 1) {
					alert("탈퇴되었습니다.");
					location.href="../index.php";
					
				}else if(result == 0) {
					alert("탈퇴 실패");
					location.href="./myPage.php";
				}else {
					alert("비밀번호가 일치하지 않습니다.");
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
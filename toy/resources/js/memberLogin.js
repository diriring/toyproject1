$("#loginBtn").on("click", function() {
	
	$.ajax({
		type: "POST",
		url: "/member/MemberMapper.php",
		data: {
			id: $("#id").val(),
			password: $("#password").val(),
			call_name: "getLogin"
		},
		success: function(result) {
			//console.log(result);
			if(result == 1) {
				alert("로그인 성공");
				location.href="../index.php";
				
			}else {
				alert("로그인 실패");
				location.href="./login.php";
			}
		},
		error: function() {
			alert("에러");
		}
	});
});
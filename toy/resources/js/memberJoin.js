$("#joinBtn").on("click", function() {
	$.ajax({
		type: "POST",
		url: "/member/MemberService.php",
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
				location.href="../index.php";
				
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
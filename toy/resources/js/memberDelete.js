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
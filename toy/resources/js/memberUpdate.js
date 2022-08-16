//회원 정보 조회
function getMyInfo() {
	
	$.ajax({
		type: "POST",
		url: "/member/MemberMapper.php",
		data: {
			id: $("#sessionId").val(),
			call_name: "getMyInfo"
		},
		success: function(result) {
			let data = JSON.parse(result);
			
			//입력폼에 조회한 정보 넣어주기
			$("#name").val(data.name);
			$("#email").val(data.email);
			$("#phone").val(data.phone);
			
		},
		error: function() {
			alert("조회 에러");
		}
	});
	
};

//회원 정보 업데이트
$("#updateBtn").on("click", function() {
	console.log("클릭");
	$.ajax({
		type: "POST",
		url: "/member/MemberService.php",
		data: {
			name: $("#name").val(),
			email: $("#email").val(),
			phone: $("#phone").val(),
			id: $("#sessionId").val(),
			call_name: "setUpdate"
		},
		success: function(result) {
			console.log(result);
			if(result == 1) {
				alert("수정 성공");
				location.href="./myPage.php";
				
			}else {
				alert("수정 실패");
				location.href="./myPage.php";
			}
		},
		error: function() {
			alert("수정 에러");
		}
	});
});
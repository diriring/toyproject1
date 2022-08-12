$("#joinBtn").on("click", function() {
	submitAjax();
});

$("#password").on("blur", function() {
	chkPW();
});

$("#rePassword").on("keyup", function() {
	chkRePW();
});

//비밀번호 유효성 검증 함수
function chkPW() {

	let pw = $("#password").val();
	let num = pw.search(/[0-9]/g);
	let eng = pw.search(/[a-z]/ig);
	let spe = pw.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
	 
	if(pw.length < 8 || pw.length > 20){
		$("#pwCheckResult").html("8자리 ~ 20자리 이내로 입력해주세요.");
		return false;
	}else if(pw.search(/\s/) != -1){
		$("#pwCheckResult").html("비밀번호는 공백 없이 입력해주세요.");
		return false;
	}else if( (num < 0 && eng < 0) || (eng < 0 && spe < 0) || (spe < 0 && num < 0) ){
		$("#pwCheckResult").html("영문,숫자, 특수문자 중 2가지 이상을 혼합하여 입력해주세요.");
		  return false;
	}else {
		$("#pwCheckResult").html("사용하실 수 있는 비밀번호 입니다.");
	}


}

//비밀번호 확인 체크
function chkRePW() {
	let pw = $("#password").val();
	let rePw = $("#rePassword").val();
	
	$("#rePwCheckResult").html("비밀번호가 일치하지 않습니다.");
	
	if(pw == rePw) {
		$("#rePwCheckResult").html("비밀번호가 일치");
	}
	
}

//input 데이터 ajax로 전송해서 DB INSERT
function submitAjax() {
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
}
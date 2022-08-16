let validPw = false;
let checkPw = false;
let validEmail = false;
let validPhone = false;
let uniqueId = false;
let uniqueEmail = false;

$("#joinBtn").on("click", function() {
	validPw = chkPW();
	checkPw = chkRePW();
	validEmail = chkEmail();
	validPhone = chkPhone();
	
	if(!uniqueId) {
		alert("아이디 중복체크를 해주세요.");
		return false;
	}
	if(!uniqueEmail) {
		alert("이메일 중복체크를 해주세요.");
		return false;
	}
	if(!validPw) {
		alert("사용할 수 있는 비밀번호를 입력해주세요.");
		return false;
	}
	if(!checkPw) {
		alert("비밀번호가 일치하지 않습니다.");
		return false;
	}
	if(!validEmail) {
		alert("이메일 형식을 확인해주세요.");
		return false;
	}
	if(!validPhone) {
		alert("전화번호 형식을 확인해주세요.");
		return false;
	}
	
	submitAjax();
});

//입력한 비밀번호 바꿨을 때 체크값 갱신 및 비밀번호 확인 초기화
$("#password").on("change", function() {
	validPw = chkPW();
	checkPw = chkRePW();
	$("#rePassword").val("");
});

//비밀번호 입력했을 때 유효성 검증
$("#password").on("blur", function() {
	validPw = chkPW();
});

//비밀번호 확인 일치 여부
$("#rePassword").on("keyup", function() {
	checkPw = chkRePW();
});

$("#id").on("change", function() {
	uniqueId = false;
});

$("#email").on("change", function() {
	uniqueEmail = false;
});

//아이디 중복체크
$("#idCheckBtn").on("click", function() {
	console.log($("#id").val());
	$.ajax({
		type: "POST",
		url: "/member/MemberService.php",
		data: {
			id: $("#id").val(),
			call_name: "getIdCheck"
		},
		success: function(result) {
			console.log(result);
			if(result == 1) {
				alert("이미 사용중인 아이디입니다.");
				
			}else {
				alert("사용하실 수 있는 아이디입니다.");
				uniqueId = true;
			}
		},
		error: function() {
			alert("아이디 체크 에러");
		}
	});
});

//이메일 중복체크
$("#emailCheckBtn").on("click", function() {
	console.log($("#email").val());
		$.ajax({
		type: "POST",
		url: "/member/MemberService.php",
		data: {
			email: $("#email").val(),
			call_name: "getEmailCheck"
		},
		success: function(result) {
			console.log(result);
			if(result == 1) {
				alert("이미 사용중인 이메일입니다.");
				
			}else {
				alert("사용하실 수 있는 이메일입니다.");
				uniqueEmail = true;
			}
		},
		error: function() {
			alert("아이디 체크 에러");
		}
	});
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
		return true;
	}


}

//비밀번호 확인 체크
function chkRePW() {
	let pw = $("#password").val();
	let rePw = $("#rePassword").val();
	
	$("#rePwCheckResult").html("비밀번호가 일치하지 않습니다.");
	
	if(pw == rePw) {
		$("#rePwCheckResult").html("비밀번호가 일치");
		return true;
	}
	
	return false;
}

//이메일 유효성 검증 함수
function chkEmail(){
	let email = $("#email").val();
	let exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;

	if(exptext.test(email)==false){

		//이메일 형식이 알파벳+숫자@알파벳+숫자.알파벳+숫자 형식이 아닐경우

		return false;
	}
	
	return true;
	
}

//전화번호 유효성 검증 함수
function chkPhone() {
    let phone = $("#phone").val();
    
    if (/^[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}/.test(phone)) {
        return true;
    }

    return false;
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
			alert("회원가입 에러");
		}
	});
}
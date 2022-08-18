$( document ).ready(function() {
	
	if($("#id").val() == "") {
		alert("로그인 후 이용해주세요.");
		location.href="../index.php";
		return false;
	}
	
	summernoteInit("content", "");
});


$("#addBtn").on("click", function() {
	//console.log("클릭");
	$.ajax({
		type: "POST",
		url: "/board/BoardMapper.php",
		data: {
			id: $("#id").val(),
			title: $("#title").val(),
			content: $("#content").val(),
			call_name: "setAdd"
		},
		success: function(result) {
			//console.log(result);
			if (result == 1) {
				alert("등록 성공");
				location.href="./boardList.php";
				
			} else {
				alert("등록 실패");
				location.href="./boardList.php";
			}
		},
		error: function() {
			alert("에러");
		}
	});
});
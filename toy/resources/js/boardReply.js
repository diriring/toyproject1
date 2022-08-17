$( document ).ready(function() {
	getReplyList();
});

//댓글 목록 조회하는 ajax
function getReplyList() {
	
	//현재 url에서 파라미터 조회
	const url = new URL(window.location.href);
	const urlParams = url.searchParams;
	
	//파라미터에서 글 번호 찾기
	let bnum = urlParams.get('bnum');
	
	$.ajax({
		type: "POST",
		url: "/reply/ReplyMapper.php",
		data: {
			bnum: bnum,
			call_name: "getList"
		},
		success: function(result) {
			let data = JSON.parse(result);
			//console.log(data.length); //댓글 개수
			$("#count").html(data.length);
			replyHtml(data);
		},
		error: function() {
			alert("댓글 조회 에러");
		}
	});
}


//댓글 작성
$("#replyAddBtn").on("click", function() {
	
	if($("#sessionId").val() == "") {
		alert("로그인 후 이용해주세요.");
		return false;
	}
	
	//console.log("댓글 클릭");
	//console.log($("#replyContent").val());
	
	//현재 url에서 파라미터 조회
	const url = new URL(window.location.href);
	const urlParams = url.searchParams;
	
	//파라미터에서 글 번호 찾기
	let bnum = urlParams.get('bnum');
	
	$.ajax({
		type: "POST",
		url: "/reply/ReplyMapper.php",
		data: {
			bnum: bnum,
			id: $("#sessionId").val(),
			content: $("#replyContent").val(),
			call_name: "setAdd"
		},
		success: function(result) {
			if(result == 1) {
				alert("댓글 등록 성공");
				location.reload();
				
			}else {
				alert("댓글 등록 실패");
				location.reload();
			}
		},
		error: function() {
			alert("댓글 등록 에러");
		}

	});
	
});

//댓글 삭제
$("#replyResult").on("click", ".replyDelBtn", function(event) {
	//console.log($(event.target).attr("data-rnum"));
	
	$.ajax({
		type: "POST",
		url: "/reply/ReplyMapper.php",
		data: {
			rnum: $(event.target).attr("data-rnum"),
			call_name: "setDelete"
		},
		success: function(result) {
			if(result == 1) {
				alert("댓글 삭제 성공");
				location.reload();
				
			}else {
				alert("댓글 삭제 실패");
				location.reload();
			}
		},
		error: function() {
			alert("댓글 삭제 에러");
		}

	});

});

$("#replyResult").on("click", ".replyUpdateBtn", function(event) {
	$("#updateModal").modal("show");
	
	let rnum = $(event.target).attr("data-rnum");
	$("#rnum").val(rnum);
	$("#modalText").html($("#content"+rnum).text());
	
});

$("#modalUpdateBtn").on("click", function() {
	console.log("모달 수정 클릭");
	
	$.ajax({
		type: "POST",
		url: "/reply/ReplyMapper.php",
		data: {
			rnum: $("#rnum").val(),
			content: $("#modalText").val(),
			call_name: "setUpdate"
		},
		success: function(result) {
			console.log(result);
			if(result == 1) {
				alert("댓글 수정 성공");
				location.reload();
				
			}else {
				alert("댓글 수정 실패");
				location.reload();
			}
		},
		error: function() {
			alert("댓글 수정 에러");
		}

	});
	
});

//댓글 목록 html 생성
function replyHtml(data){
	let html = "";
	$.each(data, function(key, value){
		
		//개행처리
		let content = value.content;
		content = content.replaceAll(/(\n|\r\n)/g, "<br>");
		
    	html += '<tr>';
		html += '<td id="content' + value.rnum + '">' + content + '</td>';
		html += '<td>' + value.id + '</td>';
		html += '<td>' + value.regDate + '</td>';
		html += '<td>';
		if($("#sessionId").val() == value.id) {			
			html += '<button type="button" class="replyUpdateBtn" data-rnum="' + value.rnum + '">' + '수정' + '</button>';
			html += '<button type="button" class="replyDelBtn" data-rnum="' + value.rnum + '">' + '삭제' + '</button>';
		}
		html += '</td>';
    	html += '</tr>';
	});
    	

	
	$("#replyResult").html(html);
	   
}

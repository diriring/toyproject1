
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
			console.log(data);
			replyHtml(data);
		},
		error: function() {
			alert("댓글 조회 에러");
		}
	});
}

function replyHtml(data){
	let html = '<tbody>';
	$.each(data, function(key, value){
		
		//개행처리
		let content = value.content;
		content = content.replaceAll(/(\n|\r\n)/g, "<br>");
		
    	html += '<tr>';
		html += '<td>' + content + '</td>';
		html += '<td>' + value.id + '</td>';
		html += '<td>' + value.regDate + '</td>';
		html += '<td>';
		html += '<button type="button" id="replyUpdateBtn" data-rnum="' + value.rnum + '">' + '수정' + '</button>';
		html += '<button type="button" id="replyDelBtn" data-rnum="' + value.rnum + '">' + '삭제' + '</button>';
		html += '</td>';
    	html += '</tr>';
	});
    	
	html += '</tbody>';
	
	$("#replyResult").append(html);
	   
}

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
		},
		error: function() {
			alert("댓글 조회 에러");
		}
	});
}

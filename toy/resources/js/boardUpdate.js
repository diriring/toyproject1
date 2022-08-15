//수정하려는 글 상세 정보 조회
function getDetail() {

	//현재 url에서 파라미터 조회
	const url = new URL(window.location.href);
	const urlParams = url.searchParams;
	
	//파라미터에서 글 번호 찾기
	let bnum = urlParams.get('bnum');
	
	$.ajax({
		type: "POST",
		url: "/board/BoardMapper.php",
		data: {
			bnum: bnum,
			call_name: "getDetail"
		},
		success: function(result) {
 			//console.log(result);
			let data = JSON.parse(result);
			//console.log(data);
			updateHtml(data);
			
			summernoteInit("content", data.content);

		},
		error: function() {
			alert("조회 에러");
		}
	});

};

//업데이트 버튼 클릭 했을 때 ajax
$("#updateBtn").on("click", function() {
	console.log("클릭");
	//현재 url에서 파라미터 조회
	const url = new URL(window.location.href);
	const urlParams = url.searchParams;
	
	//파라미터에서 글 번호 찾기
	let bnum = urlParams.get('bnum');
	
	$.ajax({
		type: "POST",
		url: "/board/BoardService.php",
		data: {
			title: $("#title").val(),
			content: $("#content").val(),
			bnum: bnum,
			call_name: "setUpdate"
		},
		success: function(result) {
			console.log(result);
			if(result == 1) {
				alert("수정 성공");
				location.href="./boardList.php";
				
			}else {
				alert("수정 실패");
				location.href="./boardList.php";
			}
		},
		error: function() {
			alert("수정 에러");
		}
	});
});

//조회 정보 html 작성
function updateHtml(data) {
	
	let html = '<div class="row">';
	html += '<div class="input-group mb-3">';
	html += '<span class="input-group-text" id="basic-addon1">글 제목</span>';
	html += '<input type="text" name="title" id="title" class="form-control" placeholder="Title" aria-describedby="basic-addon1" value="' + data.title + '">';
	html += '<span class="input-group-text" id="basic-addon1">작성자</span>';
	html += '<input type="text" name="id" id="id" class="form-control" placeholder="Username" aria-describedby="basic-addon1" value="' + data.id + '" readonly="readonly">';
	html += '</div>' + '</div>';
	
	$("#ajaxResult").prepend(html);
	
};
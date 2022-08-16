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

			$("#title").val(data.title);
			$("#id").val(data.id);
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
		url: "/board/BoardMapper.php",
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

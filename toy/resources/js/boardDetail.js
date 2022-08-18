$( document ).ready(function() {
	getDetail();
});

//게시글 상세정보 조회
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
			detailHtml(data);
			if(data.id == $("#sessionId").val()) {
				let html = '<a class="btn btn-outline-primary" href="./boardUpdate.php?bnum=' + data.bnum + '">수정</a>';
				html += '<button type="button" id="delBtn" class="btn btn-outline-primary">삭제</button>';
				
				$("#buttons").append(html);
			};

		},
		error: function() {
			alert("조회 에러");
		}
	});
	
};

//게시글 삭제
$("#buttons").on("click", "#delBtn", function () {
	console.log("삭제 클릭");
	
	let check = window.confirm("정말 삭제 하시겠습니까?");
	
	if(!check) {
		return false;
	}
	
	//현재 url에서 파라미터 조회
	const url = new URL(window.location.href);
	const urlParams = url.searchParams;
	
	//파라미터에서 글 번호 찾기
	let bnum = urlParams.get('bnum');
	
	let src = new Array();
	
	$("#content img").each(function(index, item) {
		let split = item.src.split('/');
		let path = "../" + split[3] + "/" + split[4] + "/" + split[5];
		src[index] = path;
	});
	
	console.log(src);
	
	$.ajax({
    	type: "POST",
		url: "/board/BoardMapper.php",
		data: {
			bnum: bnum,
			call_name: "setDelete"
		},
		success: function(result) {
			if(result == 1) {
				
				src.forEach((path)=>fileDelete(path));
				
				alert("삭제 성공");
				location.href="./boardList.php";
				
			}else {
				alert("삭제 실패");
				location.href="./boardList.php";
			}
		},
		error: function() {
			alert("삭제 에러");
		}
	});
	
	
});

function fileDelete(fileName) {
	$.ajax({
		type: "POST",
		url: "/util/fileDelete.php",
		data: {
			fileName: fileName
		},
		success: function(data) {
			console.log(data);
		}
	});
}

//조회 정보 html 작성
function detailHtml(data) {

	let html = '<thead>';
	html += '<tr>';
	html += '<td>말머리</td>';
	html += '<td>제목</td>';
	html += '<td>작성자</td>';
	html += '<td>작성날짜</td>';
	html += '<td>조회수</td>';
	html += '</tr>';
	html += '</thead>';
	
	html += '<tr>';
	html += '<td>' + data.name + '</td>';
	html += '<td>' + data.title + '</td>';
	html += '<td>' + data.id + '</td>';
	html += '<td>' + data.regDate + '</td>';
	html += '<td>' + data.hit + '</td>';
	html += '</tr>';
	
	html += '<tr>';
	html += '<td colspan="5" id="content">' + data.content + '</td>';
	html += '</tr>';
	
	$("#detailResult").append(html);

};


// 게시글 목록 조회 및 페이지 생성	
function getList() {
	
	//현재 url에서 파라미터 조회
	const url = new URL(window.location.href);
	const urlParams = url.searchParams;
	
	//파라미터에서 페이지 번호 찾기
	let pn = urlParams.get('pn');
	
	if(!urlParams.has('pn')) {
		pn = 1;
	};
	
	$.ajax({
		type: "POST",
		url: "/board/BoardMapper.php",
		data: {
			pn: pn,
			call_name: "getList"
		},
		success: function(result) {
 			//console.log(result);
			let data = JSON.parse(result);
			//console.log(data);
			boardHtml(data);

		},
		error: function() {
			alert("목록 에러");
		}
	});
	
	$.ajax({
		type: "POST",
		url: "/board/BoardMapper.php",
		data: {
			pn:1,
			call_name: "getPage"
		},
		success: function(result) {
 			//console.log(result);
			let data = JSON.parse(result);
			//console.log(data);
			pageHtml(data);

		},
		error: function() {
			alert("페이지 에러");
		}
	});
	
};
	
// data가 들어오면 html 생성	 (게시판 목록)
function boardHtml(data){
	$.each(data, function(key, value){
    	let html = "<tr>";
		html += "<td>" + value.bnum + "</td>";
		html += "<td>" + "<a href=\"./boardDetail.php?bnum=" + value.bnum + "\">" + value.title + "</a>" + "</td>";
		html += "<td>" + value.id + "</td>";
		html += "<td>" + value.regDate + "</td>";
		html += "<td>" + value.hit + "</td>";
    	html += "</tr>";
    	
    	$("#listResult").append(html);
	});
   
}
    
// data가 들어오면 html 생성	 (페이지 버튼)
function pageHtml(data) {
		
	let html = '<div class="col-3">';
	html += '<nav aria-label="Page navigation example">';
	html += '<ul class="pagination">';
	html += '<li class="page-item">';
		
	if(data.pre) {
		html += '<a class="page-link" href="./BoardList.php?pn=' + data.startNum-1 + '" aria-label="Previous">';
	}else {
		html += '<a class="page-link" href="./BoardList.php?pn=1" aria-label="Previous">';
	}

	html += '<span aria-hidden="true">&laquo;</span>';
	html += '</a>';
	html += '<li>';
    		
	for(let i=data.startNum; i<data.lastNum+1; i++) {
		html += '<li class="page-item"><a class="page-link" href="./boardList.php?pn='+ i +'">' + i + '</a></li>';
	};
    		
	html += '<li class="page-item">';
    		
	if(data.next) {
		html += '<a class="page-link" href="./BoardList.php?pn=' + data.lastNum+1 + '" aria-label="Next">';
	}else {
		html += '<a class="page-link" href="./BoardList.php?pn=' + data.lastNum + '" aria-label="Next">';
	}

	html += '<span aria-hidden="true">&raquo;</span>';
		
	html += '</a>';
	html += '</li>';
	html += '</ul>';
	html += '</nav>';
	html += '</div>';
    		
	$("#pageResult").append(html);
}
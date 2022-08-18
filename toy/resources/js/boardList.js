$( document ).ready(function() {
	getList('title', '', 1, false);
});

$("#searchBtn").on("click", function() {
	
	//url에서 파라미터 제거
	history.replaceState({}, null, location.pathname);
	
	let kind = $("#kind").val();
	let search = $("#search").val();
	
	getList(kind, search, 1, true);

	
});

$("#pageResult").on("click", ".pager", function(event) {
	
	let kind = $(event.target).attr("data-kind");	
	let search = $(event.target).attr("data-search");
	let pn = $(event.target).attr("data-pn");

	getList(kind, search, pn, true);

})

// 게시글 목록 조회 및 페이지 생성	
function getList(kindInput, searchInput, pnInput, searchCheck) {
	
	//현재 url에서 파라미터 조회
	const url = new URL(window.location.href);
	const urlParams = url.searchParams;
	
	//파라미터에서 페이지 번호 찾기
	let pn = urlParams.get('pn');
	
	
	if(!urlParams.has('pn')) {
		pn = pnInput;
	};
	
	console.log(pn);
	//검색 추가
	let kind = urlParams.get('kind');
	
	
	if(!urlParams.has('kind')) {
		kind = kindInput;
	};
	
	let search = urlParams.get('search');
	
	
	if(!urlParams.has('search')) {
		search = searchInput;
	};
	
	if(searchCheck) {
		$("#kind").val(kind);
		$("#search").val(search);
	};
	
	$.ajax({
		type: "POST",
		url: "/board/BoardMapper.php",
		data: {
			pn: pn,
			kind: kind,
			search: search,
			call_name: "getSearch"
		},
		success: function(result) {
 			//console.log(result);
			let data = JSON.parse(result);
			console.log(data);
			
			boardHtml(data, kind, search);

		},
		error: function() {
			alert("목록 에러");
		}
	});
	
	$.ajax({
		type: "POST",
		url: "/board/BoardMapper.php",
		data: {
			pn: pn,
			kind: kind,
			search: search,
			call_name: "getSearchPage"
		},
		success: function(result) {
 			//console.log(result);
			let data = JSON.parse(result);
			console.log(data);
			
			if(searchCheck) {
				pageSearchHtml(data, kind, search);
			} else {
				pageHtml(data);
			} 
			

		},
		error: function() {
			alert("페이지 에러");
		}
	});
	
};
	
// data가 들어오면 html 생성	 (게시판 목록)
function boardHtml(data){
	let html = "";
	$.each(data, function(key, value){
    	html += "<tr>";
		html += "<td>" + value.name + "</td>";
		html += "<td>" + "<a href=\"./boardDetail.php?bnum=" + value.bnum + "\">" + value.title + "</a>" + "</td>";
		html += "<td>" + value.id + "</td>";
		html += "<td>" + value.regDate + "</td>";
		html += "<td>" + value.hit + "</td>";
    	html += "</tr>";
    	
	});
   
	$("#listResult").html(html);
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
    		
	$("#pageResult").html(html);
}

function pageSearchHtml(data, kind, search) {
		
		
	let html = '<div class="col-3">';
	html += '<nav aria-label="Page navigation example">';
	html += '<ul class="pagination">';
	html += '<li class="page-item">';
		
	if(data.pre) {
		html += '<p role="button" class="page-link pager" data-pn="' + data.startNum-1 + '" data-kind="' + kind + '" data-search="' + search + '" aria-label="Previous">';
	}else {
		html += '<p role="button" class="page-link pager" data-pn="1" data-kind="' + kind + '" data-search="' + search + '" aria-label="Previous">';
	}

	html += '&laquo;';
	html += '</p>';
	html += '<li>';
    		
	for(let i=data.startNum; i<data.lastNum+1; i++) {
		html += '<li class="page-item"><p role="button" class="page-link pager" data-pn="'+ i + '" data-kind="' + kind + '" data-search="' + search +'">' + i + '</p></li>';
	};
    		
	html += '<li class="page-item">';
    		
	if(data.next) {
		html += '<p role="button" class="page-link pager" data-pn="' + data.lastNum+1 + '" data-kind="' + kind + '" data-search="' + search + '" aria-label="Next">';
	}else {
		html += '<p role="button" class="page-link pager" data-pn="' + data.lastNum + '" data-kind="' + kind + '" data-search="' + search + '" aria-label="Next">';
	}

	html += '&raquo;';
		
	html += '</p>';
	html += '</li>';
	html += '</ul>';
	html += '</nav>';
	html += '</div>';
    		
	$("#pageResult").html(html);
}
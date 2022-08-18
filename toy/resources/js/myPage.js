$( document ).ready(function() {
	getMyInfo();
});

function getMyInfo() {
	
	$.ajax({
		type: "POST",
		url: "/member/MemberMapper.php",
		data: {
			id: $("#sessionId").val(),
			call_name: "getMyInfo"
		},
		success: function(result) {
 			//console.log(result);
			let data = JSON.parse(result);
 			//console.log(data);
			
			infoHtml(data);

		},
		error: function() {
			alert("조회 에러");
		}
	});
	
};

function infoHtml(data) {

	let html = '<tr>';
	html += '<td>아이디</td>';
	html += '<td>' + data.id + '</td>';
	html += '</tr>';
	
	html += '<tr>';
	html += '<td>이름</td>';
	html += '<td>' + data.name + '</td>';
	html += '</tr>';
	
	html += '<tr>';
	html += '<td>email</td>';
	html += '<td>' + data.email + '</td>';
	html += '</tr>';
	
	html += '<tr>';
	html += '<td>전화번호</td>';
	html += '<td>' + data.phone + '</td>';
	html += '</tr>';
	
	$("#info").append(html);

};
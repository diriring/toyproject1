<?php
require_once '../temp/bootstrap.php';

session_start();
?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Page</title>
</head>

<body>
	
	<?php require_once '../temp/header.php';?>

	<div class="container">
    	<h1>My Page</h1>
    	
    	<input type="hidden" id="sessionId" value="<?php echo $_SESSION['id'];?>">
    	
		<table id="info">

		</table>
		
		<a class="btn btn-outline-primary" href="./memberUpdate.php">회원 정보 수정</a>
		<a class="btn btn-outline-primary" href="./memberDelete.php">회원 탈퇴</a>
	</div>


<script>
	getMyInfo();
	
	function getMyInfo() {
    	
    	$.ajax({
    		type: "POST",
    		url: "/member/MemberMapper.php",
    		data: {
    			id: $("#sessionId").val(),
    			call_name: "getMyInfo"
    		},
    		success: function(result) {
//     			console.log(result);
    			let data = JSON.parse(result);
//     			console.log(data);
    			
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
</script>
</body>

</html>
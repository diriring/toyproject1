<?php 
include '../temp/bootstrap.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Board List Page</title>
</head>

<body>
	
	<?php include '../temp/header.php';?>
	
	<div class="container">
    	<h1>Board List Page</h1>
    	
    	
    	<div id="result"></div>
    	
    	<a href="./boardWrite.php">글 쓰기</a>
	</div>

<script>
$(document).ready(function() {
	
	getBoardList();
	
    function getBoardList() {
    	$.ajax({
    		url:'./boardSelect',
    		dataType:'html',
    		success:function(data) {
    			$("#result").html(data);
    		}
    	});
    }
});
</script>


</body>

</html>
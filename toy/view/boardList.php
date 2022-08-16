<?php 
require_once '../temp/bootstrap.php';
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
	
	<?php require_once '../temp/header.php';?>

	<div class="container">
    	<h1>Board List Page</h1>
    	
    	<table class="table table-striped table-hover">
			<colgroup>
				<col width="12%"/>
				<col width="52%"/>
				<col width="12%"/>
				<col width="12%"/>
				<col width="12%"/>
			</colgroup>
			<thead>
				<tr>
					<th>글 번호</th>
					<th>글 제목</th>
					<th>작성자</th>
					<th>작성날짜</th>
					<th>조회수</th>
				</tr>
			</thead>
			<tbody id="listResult">

			</tbody>

		</table>
    	
    	<input type="hidden" id="pn" value="">
    	<div class="row justify-content-between" id="pageResult">

		</div>
    	<a class="btn btn-outline-primary" href="./boardWrite.php">글 쓰기</a>
    	
	</div>

<script src = "../resources/js/boardList.js"></script>
<script>
	getList();
</script>

</body>

</html>
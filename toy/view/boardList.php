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
    	
    	<div class="col-2" style="display: inline-block">
			<select class="form-select" id="kind" aria-label="Default select example">
			  <option value="col1">제목</option>
			  <option value="col2">내용</option>
			  <option value="col3">작성자</option>
			</select>
		</div>
		<div class="col-3 d-inline-block">
			<div class="input-group mb-3">
			  <input type="text" id="search" class="form-control" placeholder="검색어를 입력하세요.">
			  <button class="btn btn-outline-secondary" type="button" id="searchBtn">검색</button>
			</div>
		</div>
    	
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
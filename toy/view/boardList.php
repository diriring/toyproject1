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
		
		<blockquote class="blockquote">
          <h1 class="my-4">자유 게시판</h1>
          <footer class="blockquote-footer">보드게임에 관해 자유롭게 의견을 나눠주세요.</footer>
        </blockquote>
    	
    	<div class="col-2 d-inline-block">
			<select class="form-select" id="kind" aria-label="Default select example">
			  <option value="title">제목</option>
			  <option value="content">내용</option>
			  <option value="id">작성자</option>
			</select>
		</div>
		<div class="col-3 d-inline-block">
			<div class="input-group mb-3">
			  <input type="text" id="search" class="form-control" placeholder="검색어를 입력하세요.">
			  <button class="btn btn-outline-secondary" type="button" id="searchBtn">검색</button>
			</div>
		</div>
    	
    	<table class="table table-striped table-hover table-bordered text-center">
			<colgroup>
				<col width="20%"/>
				<col width="50%"/>
				<col width="10%"/>
				<col width="10%"/>
				<col width="10%"/>
			</colgroup>
			<thead>
				<tr>
					<th>말머리</th>
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

    	<div class="row">
        	<div class="col-11" id="pageResult">
    
    		</div>
    		<div class="col-1">
        		<a class="btn btn-outline-primary d-block text-right" href="./boardWrite.php">글 쓰기</a>
    		</div>
    	</div>
    	
	</div>

<script src = "../resources/js/boardList.js"></script>

</body>

</html>
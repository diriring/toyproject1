<?php
require_once '../temp/bootstrap.php';

session_start();
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<title>Board Update Page</title>
</head>

<body>
	
    <?php require_once '../temp/header.php';?>
    	
	<div class="container">
    	
    	<div class="row">
			<div class="alert alert-primary" role="alert">
			 	<h4 style="text-transform: capitalize;">게시판 글 수정</h4>
			</div>
			
			
			<div id="ajaxResult">
    			<div class="row">
        			<div class="input-group mb-3">
        			  <span class="input-group-text" id="basic-addon1">글 제목</span>
        			  <input type="text" name="title" id="title" class="form-control" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
        			  <span class="input-group-text" id="basic-addon1">작성자</span>
        			  <input type="text" name="id" id="id" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" readonly="readonly">
          			  <span class="input-group-text" id="basic-addon1">말머리</span>
        			  <select class="form-select" id="cnum">
        			  	<option value="1">자유토크</option>
        			  	<option value="2">보드게임 파티 모집</option>
        			  	<option value="3">보드게임 소개</option>
        			  	<option value="4">보드게임 카페 추천</option>
        			  </select>
        			</div>
        		</div>
	    		<div class="row">
        			<div class="input-group">
        			  <span class="input-group-text">글 내용</span>
        			  <textarea name="content" class="form-control" aria-label="With textarea" id="content"></textarea>
        			</div>
        		</div>
			</div>
    		
    		<div class="my-5">
              <button type="button" id="updateBtn" class="btn btn-primary mb-3">글 수정</button>
            </div>

		</div>
	</div>
    
<script src="../resources/js/summernote.js"></script>
<script src="../resources/js/boardUpdate.js"></script>


</body>
</html>
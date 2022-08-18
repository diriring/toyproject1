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

<title>Board Write Page</title>
</head>

<body>
	
	<?php require_once '../temp/header.php';?>
	
	<div class="container">
    	
    	<div class="row">

    		<form action="./boardInsert.php" method="POST">
    			<div class="row mt-5">
        			<div class="input-group mb-3">
        			  <span class="input-group-text" id="basic-addon1">글 제목</span>
        			  <input type="text" name="title" id="title" class="form-control" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
        			  <span class="input-group-text" id="basic-addon1">작성자</span>
        			  <input type="text" name="id" id="id" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $_SESSION['id'];?>" readonly="readonly">
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
        			  <textarea name="content" class="form-control" aria-label="With textarea" id="content"></textarea>
        			</div>
        		</div>
        		
        		<div class="my-5">
                  <button type="button" id="addBtn" class="btn btn-primary mb-3">글 등록</button>
                </div>
    		</form>
		</div>
	</div>
	
<script src="../resources/js/summernote.js"></script>
<script src="../resources/js/boardWrite.js"></script>

</body>

</html>
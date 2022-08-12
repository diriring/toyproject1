<?php
require_once '../temp/bootstrap.php';
include_once("../board/BoardService.php");
$test = new BoardService();
$board = $test->getDetail($_GET['bnum']);
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
			
    		<form action="./boardInsert.php" method="POST">
    			<div class="row">
        			<div class="input-group mb-3">
        			  <span class="input-group-text" id="basic-addon1">글 제목</span>
        			  <input type="text" name="title" id="title" class="form-control" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $board['title'];?>">
        			  <span class="input-group-text" id="basic-addon1">작성자</span>
        			  <input type="text" name="id" id="id" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $board['id'];?>" readonly="readonly">
        			</div>
        		</div>
        		<div class="row">
        			<div class="input-group">
        			  <span class="input-group-text">글 내용</span>
        			  <textarea name="content" class="form-control" aria-label="With textarea" id="content"><?php echo $board['content'];?></textarea>
        			</div>
        		</div>
        		
        		<div class="my-5">
                  <button type="button" id="updateBtn" class="btn btn-primary mb-3" data-bnum="<?php echo $board['bnum']?>">글 수정</button>
                </div>
    		</form>
		</div>
	</div>
    
    <script type="text/javascript">
    	$("#content").summernote({
    		height: 400,
    		width: 1210
    	});
    	
    	$("#updateBtn").on("click", function() {
        	console.log("클릭");
        	$.ajax({
        		type: "POST",
        		url: "/board/BoardService.php",
        		data: {
        			title: $("#title").val(),
        			content: $("#content").val(),
        			bnum: $("#updateBtn").attr("data-bnum"),
        			call_name: "setUpdate"
        		},
        		success: function(result) {
        			console.log(result);
        			if(result == 1) {
        				alert("수정 성공");
        				location.href="./boardList.php";
        				
        			}else {
        				alert("수정 실패");
        				location.href="./boardList.php";
        			}
        		},
        		error: function() {
        			alert("에러");
        		}
        	});
        });
    	
    </script>

	


</body>
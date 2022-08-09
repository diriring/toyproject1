<?php
include '../temp/bootstrap.php';
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
	
	<?php include '../temp/header.php';?>
	
	<div class="container">
    	
    	<div class="row">
			<div class="alert alert-primary" role="alert">
			 	<h4 style="text-transform: capitalize;">게시판 글쓰기</h4>
			</div>
			
		<form action="./boardInsert.php" method="POST">
			<div class="row">
    			<div class="input-group mb-3">
    			  <span class="input-group-text" id="basic-addon1">글 제목</span>
    			  <input type="text" name="title" class="form-control" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
    			  <span class="input-group-text" id="basic-addon1">작성자</span>
    			  <input type="text" name="id" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $_SESSION['id'];?>" readonly="readonly">
    			</div>
    		</div>
    		<div class="row">
    			<div class="input-group">
    			  <span class="input-group-text">글 내용</span>
    			  <textarea name="content" class="form-control" aria-label="With textarea" id="content"></textarea>
    			</div>
    		</div>
    		
    		<div class="my-5">
              <button type="submit" class="btn btn-primary mb-3">글 등록</button>
            </div>
		</form>
	</div>

<script type="text/javascript">
	$("#content").summernote();
</script>

</body>

</html>
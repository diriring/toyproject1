<?php
require_once '../temp/bootstrap.php';

session_start();
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Board Detail Page</title>
</head>

<body>
	
	<?php require_once '../temp/header.php';?>

	<div class="container">
    	<h1>Board Detail Page</h1>
    	
    	<div class="container mt-5">
        	<input type="hidden" id="sessionId" value="<?php echo $_SESSION['id'];?>">
        	
        	<table class="table" id="detailResult">
        		<colgroup>
    				<col width="55%"/>
    				<col width="15%"/>
    				<col width="15%"/>
    				<col width="15%"/>
    			</colgroup>
        		
        	</table>
			
			
			<div id="buttons">
			</div>
        
        	<div>
        		<div id="comment-count">댓글 <span id="count">0</span></div>
				<input type="hidden" id="sessionId" value="<?php echo $_SESSION['id'];?>">
				<textarea id="replyContent" class="form-control" rows="3"></textarea>
				<button type="button" class="btn btn-outline-secondary mt-3" id="replyAddBtn">등록</button>
        	</div>
        	
        	<table class="table" id="replyResult">
        		<colgroup>
    				<col width="55%"/>
    				<col width="15%"/>
    				<col width="15%"/>
    				<col width="15%"/>
    			</colgroup>
    			<thead>
    				<tr>
    					<td>댓글</td>
    					<td>작성자</td>
    					<td>작성 날짜</td>
    					<td></td>
    				</tr>
    			</thead>
        	</table>
        	
        	
        </div>
    </div>

<script src="../resources/js/boardReply.js"></script>
<script src="../resources/js/boardDetail.js"></script>
<script>
    getDetail();
    getReplyList();
</script>


</body>
</html>
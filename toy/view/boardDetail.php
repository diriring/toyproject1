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
    	
    	<div class="container mt-5">
        	<input type="hidden" id="sessionId" value="<?php echo $_SESSION['id'];?>">
        	
        	<table class="table" id="detailResult">
        		<colgroup>
        			<col width="15%"/>
    				<col width="55%"/>
    				<col width="10%"/>
    				<col width="10%"/>
    				<col width="10%"/>
    			</colgroup>
        		
        	</table>
        	
        	<div id="buttons"></div>
        
        	<div>
        		<div id="comment-count">댓글 <span id="count"></span></div>
				<input type="hidden" id="sessionId" value="<?php echo $_SESSION['id'];?>">
				<textarea id="replyContent" class="form-control" rows="3"></textarea>
				<div class="mb-3">
					<button type="button" class="btn btn-outline-secondary mt-3" id="replyAddBtn">등록</button>
					<button type="button" class="btn btn-outline-secondary mt-3" onclick="getReplyList()" id="refreshBtn">댓글 새로고침</button>
        		</div>
        	</div>
        	
        	<table class="table">
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
    			<tbody id="replyResult">
    			</tbody>
        	</table>
        	
        	
        </div>
        
    </div>
    
    <!-- 댓글 수정 모달 -->
    <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="updateModal">
		<div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            	<div class="modal-header">
                	<h5 class="modal-title">댓글 수정</h5>
                	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <p>수정 할 내용을 입력해주세요.</p>
                <input type="hidden" id="rnum" value="">
                <textarea id="modalText" class="form-control" rows="3"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                <button type="button" id="modalUpdateBtn" class="btn btn-primary">수정</button>
            </div>
          </div>
        </div>
    </div>

<script src="../resources/js/boardReply.js"></script>
<script src="../resources/js/boardDetail.js"></script>

</body>
</html>
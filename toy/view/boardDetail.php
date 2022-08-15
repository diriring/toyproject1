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
        	
        	<table class="table table-striped table-hover" id="detailResult">
        		<colgroup>
    				<col width="55%"/>
    				<col width="15%"/>
    				<col width="15%"/>
    				<col width="15%"/>
    			</colgroup>
        		
        	</table>
			
			
			<div id="buttons">
			</div>
        
        	
        	
        </div>
    </div>

<script src="../resources/js/boardDetail.js"></script>
<script>
    getDetail();
</script>


</body>
</html>
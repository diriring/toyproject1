<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<title>Login Page</title>
</head>

<body>
	
<input type="text" id="cnum">
<input type="text" id="name">
<button type="button" id="btn">버튼</button>
	
<script>
	$("#btn").on("click", function() {
		
		$.ajax({
			type: "POST",
			url: "./categoryInsert.php",
			data: {
				cnum: $("#cnum").val(),
				name: $("#name").val()
			},
			success: function(result) {
					console.log(result);
					
			},
			error: function() {
				alert("에러");
			}
		});
	});
</script>

</body>

</html>
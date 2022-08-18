$( document ).ready(function() {
	summernoteInit("content", "");
});

function summernoteInit(selector, code){

	//summernote
	$("#"+selector).summernote({
		height: 600,
		width: '100%',
		
		callbacks: {
			onImageUpload: function(files) {
				let formData = new FormData();
				formData.append("files", files[0]);
				//console.log("업로드");
				
				$.ajax({
					type: "POST",
					url: "/util/fileUpload.php",
					enctype: "multipart/form-data",
					processData: false,
					contentType: false,
					data: formData,
					success: function(data) {
						//console.log(data);
						$(".note-image-input").val('');
						$("#"+selector).summernote('editor.insertImage', data.trim());
					}
				});
								
			},
			
			onMediaDelete: function(files) {
				let fileName = $(files[0]).attr("src");
				console.log(fileName);
				$.ajax({
					type: "POST",
					url: "/util/fileDelete.php",
					data: {
						fileName: fileName
					},
					success: function(data) {
						console.log(data);
					}
				});
			}
		}

	});
	
	
	//내용 추가
	$("#"+selector).summernote('code', code);
}


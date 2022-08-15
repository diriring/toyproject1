function summernoteInit(selector, code){

	//summernote
	$("#"+selector).summernote({
		height:400,
		width: 1210,
	});
	
	//내용 추가
	$("#"+selector).summernote('code', code);
}
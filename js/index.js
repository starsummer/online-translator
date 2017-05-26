// PHP 后端交互所用到的
function Get_translate(){
	//得到要翻译的内容
	$content = $("#content").text();
	$.ajax({
		type:'post',
		url: 'Getcontent.php',
		data:{
			'content':$content,
		},
		dataType:'json',
		success:function(data){
			$("#explain").html('');
			$("#explain").append("翻译：" + data.translation + "<br/>");
			if(data.basic['explains'] != null){
				$("#explain").append("释义：" + "<br/> &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;");
				for(var i = 0;i < data.basic['explains'].length;i++){
					$("#explain").append(data.basic['explains'][i] + "<br/> &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;");
				}
			}
		}
	});
}
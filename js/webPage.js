
/*获取选中的文字翻译*/
$(document).ready(function () {
	$("#html").mouseup(function (e) {
		console.log("debug");
		var $content;
		var parentOffset = $(this).offset();
		var x = e.pageX - parentOffset.left;
		var y = e.pageY - parentOffset.top;
		$content = getText();
		console.log($content+" x:"+x+" y:"+y);

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
    			if(typeof data.basic != 'undefined'){
    				$("#explain").append("释义：" + "<br/> &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;");
    				for(var i = 0;i < data.basic['explains'].length;i++){
    					$("#explain").append(data.basic['explains'][i] + "<br/> &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;");
    				}
    			}
        		$('#myModal').modal('show');
        	}
        });	

	});
});


/*获取选中的文字*/
function getText(){
	if (window.getSelection) {
		return window.getSelection().toString();
	} else if (document.getSelection) {
		return document.getSelection();
	} else if (document.selection) {
		return document.selection.createRange().text;
	}else{
		return "";
	}
}	

$(document).ready(function(){
    //监听点击事件
    $('#goWebPage').click(function(){
    	url=$('#url').val();
    	$.ajax({
    		type:'post',
    		url:'getHtml.php',
    		data:{
    			'url':url,
    		},
    		dataType: 'html',
    		success:function(data){
    		//	$('body').append(data);
    			$("#html").load("htmlContent.html",function(){
    		//		alert("success");
    			});
    			// setTimeout("$('#html').load('htmlContent.html head')",3000);
    			//window.location.href='htmlContent.html';
    		}
    	})
    });
});
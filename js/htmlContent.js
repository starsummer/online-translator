/*获取选中的文字*/
$(document).ready(function () {
	$("body").mouseup(function (e) {
//		console.log("debug");
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



		//1.$.ajax带json数据的异步请求  
// 		var aj = $.ajax( {    
//     		url:'tran_return.php',// 跳转到 action    
//     		// data:JSON.stringify({    
//     		// 	"text":txt,
//     		// }),    
//     		data:txt,
//     		type:"post",    
//     		cache:false,    
// //    		dataType: "json",    
//     		success:function(data) {   
//     			var obj=$.parseJSON(data); 
// 				alert(obj);   
//    			},    
//             error:function(XMLHttpRequest, textStatus, errorThrown){
//                     alert("ajax请求失败");
//                     console.log(XMLHttpRequest.status);//200客户端请求已成功
//                     console.log(XMLHttpRequest.readyState);//4响应内容解析完成，可以在客户端调用了
//                     console.log(textStatus);//parsererror
//             }  
//   		});  
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

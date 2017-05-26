//是否支持file API
function isSupportFileApi() {
	if(window.File && window.FileList && window.FileReader && window.Blob) {
		return true;
	}
	else{
		alert("您的浏览器不支持file API");
	}
}
function read_files(fileArray){
	for(var i in fileArray){
		var file = fileArray[i]; //这个file对象有以下属性可供读取name、size、lastModifiedDate和type等。
		var reader = new FileReader();
		if(/text\/\w+/.test(file.type)) { //判断文本文件
			reader.readAsText(file);//readAsText函数用于将文件读取为文本
			reader.onload = function() { //成功读取完毕后触发onload事件
//				document.getElementById('content').innerHTML="<pre>"+this.result+"</pre>";
				$("#content").html("<pre>"+this.result+"</pre>")
				//分页
				$('#content').MyPagination({height: 1200, fadeSpeed: 400});
			}
			

		}else if(/image\/\w+/.test(file.type)) { //判断图片文件
			reader.onload = function() {
				document.getElementById('content').innerHTML='<img src='+this.result+'>';
			}
			reader.readAsDataURL(file);//readAsDataUrl函数用于将文件读取为Data url
		}
	}
}

$(document).ready(function(){
    //监听文件上传
    $('#file').change(function(){
    	read_files(this.files);
    });
});


/*获取选中的文字*/
$(document).ready(function () {
	$("#file_text").mouseup(function (e) {
		var txt;
		var parentOffset = $(this).offset();
		var x = e.pageX - parentOffset.left;
		var y = e.pageY - parentOffset.top;
		txt = getText();
		console.log(txt+" x:"+x+" y:"+y);
		
		//1.$.ajax带json数据的异步请求  
		var aj = $.ajax( {    
    		url:'tran_return.php',// 跳转到 action    
    		// data:JSON.stringify({    
    		// 	"text":txt,
    		// }),    
    		data:txt,
    		type:"post",    
    		cache:false,    
//    		dataType: "json",    
    		success:function(data) {   
    			var obj=$.parseJSON(data); 
				alert(obj);   
   			},    
            error:function(XMLHttpRequest, textStatus, errorThrown){
                    alert("ajax请求失败");
                    console.log(XMLHttpRequest.status);//200客户端请求已成功
                    console.log(XMLHttpRequest.readyState);//4响应内容解析完成，可以在客户端调用了
                    console.log(textStatus);//parsererror
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


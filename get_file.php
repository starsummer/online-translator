<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件读取</title>
	<style type="text/css">
	pre {
		white-space: pre-wrap;
/*		word-wrap: break-word;*/
	}
	</style>
</head>
<body>
<div id="get_txt">
<input id="file" type="file" multiple="" onchange="read_files(this.files)">
<div id="inputDemo" style="min-height:70px;background-color:#eee;padding:5px;"></div>
</div>
<script type="text/javascript">
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
			reader.onload = function() { //成功读取完毕后触发onload事件
				document.getElementById('inputDemo').innerHTML="<pre>"+this.result+"</pre>";
			}
			reader.readAsText(file);//readAsText函数用于将文件读取为文本
		}else if(/image\/\w+/.test(file.type)) { //判断图片文件
			reader.onload = function() {
				document.getElementById('inputDemo').innerHTML='<img src='+this.result+'>';
			}
			reader.readAsDataURL(file);//readAsDataUrl函数用于将文件读取为Data url
		}
	}
}
</script>	
</body>
</html>


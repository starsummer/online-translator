<?php

// 引用 'translate.php' 这个文件
include 'translate.php';

// 接收前台 Ajax 传过来的值
$content = $_POST['content'];

if($content != NULL){

	// 调用 translate.php 里面的 Get_translate 方法
	$new_content = Get_translate($content);
	echo json_encode($new_content);
}else{
	echo "Nothing!";
}

?>
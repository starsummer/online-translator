<?php
//定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
//定义个常量，用来指定本页的内容
define('SCRIPT','getmeaning');


// 引用 'translate.php' 这个文件
include 'translate.php';
include 'includes/common.inc.php';
// 接收前台 Ajax 传过来的值
$content = $_POST['content'];

// $content = 'magnificent';

if($content != NULL){

	// 调用 translate.php 里面的 Get_translate 方法
	$new_content = Get_translate($content);

	//取其他人翻译数据
	$_result=mysql_query("SELECT * FROM user_meaning WHERE word='$content' ORDER BY avg DESC") or die(mysql_error());
	
	//获取数据行数
	$num=_num_rows($_result);

	$_oth_tran = array();
	for($i=0;$i<$num;$i++){
		$_oth_tran[$i]=_fetch_array_list($_result);
	}
	$new_content['others']=$_oth_tran;
//	print_r($new_content);

	echo json_encode($new_content);
}else{
	echo "Nothing!";
}

?>
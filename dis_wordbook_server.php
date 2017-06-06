<?php
//定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
//定义个常量，用来指定本页的内容
define('SCRIPT','getmeaning');


// 引用 'translate.php' 这个文件
include 'includes/common.inc.php';

if(isset($_COOKIE['userid'])){
	$userid=$_COOKIE['userid'];
	$wordbook= array();
	$_result=mysql_query("SELECT word,meaning FROM wordbook WHERE userid='$userid' ") or die(mysql_error());
	//获取数据行数
	$num=_num_rows($_result);
	for($i=0;$i<$num;$i++){
		$wordbook[$i]=_fetch_array_list($_result);
	}
	echo json_encode($wordbook);		
}

?>
<?php

//定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
//定义个常量，用来指定本页的内容
define('SCRIPT','addmeaning');

// 接收前台 Ajax 传过来的值
$word = $_POST['word'];
$meaning = $_POST['meaning'];
$url = $_POST['url'];
$userid=$_COOKIE['userid'];
// $username='admin';

// $word = 'swimmer';
// $meaning = '游泳的人';
// $url = 'https://en.wikipedia.org/wiki/Main_Page';
// $userid=$_COOKIE['userid'];

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';

function _is_repeated($sql){
	$result=mysql_query($sql);

	if(mysql_num_rows($result)>=0){
		return true;
	}else{
		return false;
	}
}

$data = array();
$replaced_word=array();
if($url!=NULL){

	//查询是否有数据
	$_result=mysql_query("SELECT * FROM url_word WHERE userid='$userid' AND url='$url' ") or die(mysql_error());
	//获取数据行数
	$num=mysql_num_rows($_result);
	if($num==0){
		$data['is_browsed']=0;
	}else{
		$data['is_browsed']=1;
		for($i=0;$i<$num;$i++){
			$replaced_word[$i]=_fetch_array_list($_result);
		}
		$data['replaced_word']=$replaced_word;
	}	
	echo json_encode($data);
}

?>


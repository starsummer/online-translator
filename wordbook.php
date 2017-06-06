<?php 
define('IN_TG',true);

include 'includes/common.inc.php';
// 接收前台 Ajax 传过来的值
$content = $_POST['content'];
$meaning = $_POST['meaning'];
$userid = $_COOKIE['userid'];

$data=array();

// $content = 'good';
// $userid = 3;
if($content!=NULL){
	if(_is_repeat(
		"SELECT id FROM wordbook WHERE word='$content' AND userid='$userid' LIMIT 1",
		'此释义已经存在'
	) ){
		$data['repeat']=1;
	}else{
		$data['repeat']=0;
		
		mysql_query("INSERT INTO wordbook (userid,word,meaning,addtime) VALUES($userid,'$content','$meaning',NOW()) ") or die(mysql_error() );

	}
//	echo $data['repeat'];
	
	echo json_encode($data);
}



 ?>
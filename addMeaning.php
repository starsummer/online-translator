<?php

//定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
//定义个常量，用来指定本页的内容
define('SCRIPT','addmeaning');

// 接收前台 Ajax 传过来的值
$word = $_POST['word'];
$meaning = $_POST['meaning'];
$username=$_COOKIE['username'];
// $username='admin';


//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';


if($word != NULL && $meaning != NULL){

	if(_is_repeat(
				"SELECT id FROM user_meaning WHERE word='$word' AND meaning='$meaning' LIMIT 1",
				'此释义已经存在'
				 )
	  )	{
		$data['repeat']=1;
		}
	else{
		$data['repeat']=0;

		mysql_query("INSERT INTO user_meaning (username,word,meaning,add_time) VALUES ('$username','$word','$meaning',NOW()) ") or die(mysql_error() );
	}
	echo json_encode($data);
}

?>
<?php

//定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
//定义个常量，用来指定本页的内容
define('SCRIPT','star');

// 接收前台 Ajax 传过来的值
$word = $_POST['word'];
$meaning = $_POST['meaning'];
$star=$_POST['star'];
$userid=$_COOKIE['userid'];


// $word = 'magnificent';
// $meaning = '华丽的';
// $username='admin';
// $star=5;
// $userid=$_COOKIE['userid'];

$data=array(); 
//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';


if($word != NULL && $meaning != NULL){

	if(_is_repeat(
				"SELECT id FROM userstar WHERE word='$word' AND meaning='$meaning' AND userid=$userid LIMIT 1",
				'此评分已经存在'
	) ){
		$data['repeat']=1;
	}else{
		//打分表
		mysql_query("INSERT INTO userstar (userid,word,meaning,star,add_time) VALUES ('$userid','$word','$meaning','$star',NOW()) ") or die(mysql_error() );
		//用户翻译表
		mysql_query("UPDATE user_meaning SET count=count+1,score=score+$star,avg=score/count WHERE word='$word' AND meaning='$meaning' ") or die(mysql_error() );
		$data['repeat']=0;
	}
}

echo json_encode($data);
?>
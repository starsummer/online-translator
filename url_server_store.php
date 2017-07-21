<?php

//定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
//定义个常量，用来指定本页的内容
define('SCRIPT','url_word_store');

// 接收前台 Ajax 传过来的值
$word = $_POST['word'];
$meaning = $_POST['meaning'];
$url = $_POST['url'];
$userid=$_COOKIE['userid'];
// $username='admin';

// $word = 'swim';
// $meaning = '游泳';
// $url = 'https://en.wikipedia.org/wiki/Main_Page';
// $userid=$_COOKIE['userid'];

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';

function _is_repeated($sql){
	$result=mysql_query($sql);
	echo mysql_num_rows($result);
	if(mysql_num_rows($result)>0){
		return true;
	}else{
		return false;
	}
}

$data = array();
$replaced_word=array();
if($word != NULL && $meaning != NULL && $url!=NULL){

	//把userid,url,word，meaning加入url_word表中
	if(_is_repeated(
				"SELECT id FROM url_word WHERE userid='$userid' AND word='$word' AND url='$url' LIMIT 1"
				 )
	  )	{
		$data['repeat']=1;
		}
	else{
		$data['repeat']=0;
		mysql_query("INSERT INTO url_word (userid,url,word,meaning,add_time) VALUES 
			                             ('$userid','$url','$word','$meaning',NOW() ) ") or die(mysql_error() );
	}
	echo json_encode($data);
}

?>
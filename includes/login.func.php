<?php

//防止恶意调用
if (!defined('IN_TG')) {
	exit('Access Defined!');
}

if (!function_exists('_alert_back')) {
	exit('_alert_back()函数不存在，请检查!');
}

if (!function_exists('_mysql_string')) {
	exit('_mysql_string()函数不存在，请检查!');
}

/**
 * _setcookies生成登录cookies
 * @param unknown_type $_username
 * @param unknown_type $_uniqid
 */


function _setcookies($_username,$_userid,$_time) {
	switch ($_time) {
		case '0':  //浏览器进程
			setcookie('username',$_username);
			setcookie('userid',$_userid);
			break;
		case '1':  //一天
			setcookie('username',$_username,time()+86400);
			setcookie('userid',$_userid,time()+86400);
			break;
		case '2':  //一周
			setcookie('username',$_username,time()+604800);
			setcookie('userid',$_userid,time()+604800);
			break;
		case '3':  //一月
			setcookie('username',$_username,time()+2592000);
			setcookie('userid',$_userid,time()+2592000);
			break;
	}
}


function _check_username($_string,$_min_num,$_max_num) {
	//去掉两边的空格
	$_string = trim($_string);
	
	//长度小于两位或者大于20位
	if (mb_strlen($_string,'utf-8') < $_min_num || mb_strlen($_string,'utf-8') > $_max_num) {
		_alert_back('用户名长度不得小于'.$_min_num.'位或者大于'.$_max_num.'位');
	}
	
	//限制敏感字符
	$_char_pattern = '/[<>\'\"\ \　]/';
	if (preg_match($_char_pattern,$_string)) {
		_alert_back('用户名不得包含敏感字符');
	}
	
	//将用户名转义输入
	return _mysql_string($_string);
}



function _check_password($_string,$_min_num) {
	//判断密码
	if (strlen($_string) < $_min_num) {
		_alert_back('密码不得小于'.$_min_num.'位！');
	}
	
	//将密码返回
	return sha1($_string);
}


function _check_time($_string) {
	$_time = array('0','1','2','3');
	if (!in_array($_string,$_time)) {
		_alert_back('保留方式出错！');
	}
	return _mysql_string($_string);
}

?>
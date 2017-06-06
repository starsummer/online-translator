<?php

session_start();
//定义个常量，用来授权调用includes里面的文件
define('IN_TG',true);
//定义个常量，用来指定本页的内容
define('SCRIPT','login');
//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';
//登录状态
_login_state();
//开始处理登录状态
if (isset($_GET['action']) && $_GET['action'] == 'login') {
	//为了防止恶意注册，跨站攻击
//	_check_code($_POST['code'],$_SESSION['code']);
	//引入验证文件
	include ROOT_PATH.'includes/login.func.php';
	//接受数据
	$_clean = array();
	$_clean['username'] = _check_username($_POST['username'],2,20);
	$_clean['password'] = _check_password($_POST['password'],6);
	$_clean['time'] = _check_time($_POST['time']);

	$username=$_clean['username'];
	$password=$_clean['password'];


	//到数据库去验证
	if (!!$_row = mysql_query( "SELECT * FROM tran_user WHERE username='$username' AND password='$password' LIMIT 1" )or die(mysql_error()) ) {
		//登录成功后，记录登录信息
		$_id=mysql_result($_row,0,'id');
		if(!$_id){
			_alert_back("账号或密码不正确");
		}

		$ip=$_SERVER["REMOTE_ADDR"];
		mysql_query("UPDATE tran_user SET 
															last_time=NOW(),
															last_ip='$ip'
												WHERE 
															username='$username'				
													") or die(mysql_error());
		_close();
		session_destroy();
		_setcookies($username,$_id,$_clean['time']);
		_location(null,'index.php');
	}
}
?>

<?php
//防止恶意调用
if (!defined('IN_TG')) {
	exit('Access Defined!');
}
//防止非HTML页面调用
if (!defined('SCRIPT')) {
	exit('Script Error!');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>登陆</title>
    <script type="text/javascript" src="js/code.js"></script>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">

    <style type="text/css">
        body{
            background:url(images/1.jpg);
            background-repeat:no-repeat;
            background-attachment:fixed;
            margin:0;
            padding:0
        }

		#login{
			padding-top: 30px;
			width: 300px;
			margin: auto;
		}
		#login h3{
			text-align: center;
		}

		#login dd{
			margin: 20px;
		}
		.center{
			text-align: center;
		}
		.center input,button{
			margin-left: 10px;
			margin-right: 10px;
		}
    	#register_btn a{
    		color:black;
    		text-decoration: none;
    	}
    </style>
</head>
<body>

<div id="login">
	<h3>登录</h3>
	<form method="post" name="login" action="login.php?action=login">
		<dl>
			<dt></dt>
			<dd>用 户 名：<input type="text" name="username" class="text" /></dd>
			<dd>密　　码：<input type="password" name="password" class="text" /></dd>
			<dd>保　　留：<input type="radio" name="time" value="0" checked="checked" /> 不保留 <input type="radio" name="time" value="1" /> 一天 <input type="radio" name="time" value="2" /> 一周 <input type="radio" name="time" value="3" /> 一月</dd>
			<!-- <dd>验 证 码：<input type="text" name="code" class="text code"  /> <img src="code.php" id="code" /></dd> -->
			<dd class="center"><input type="submit" value="登录" class="btn btn-success" /><button class="btn btn-default" id="register_btn"><a href="register.php">注册</a></button></dd>
		</dl>
	</form>
</div>	
</body>
</html>

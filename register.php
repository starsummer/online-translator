<?php

session_start();
define('IN_TG',true);
define('SCRIPT','register');
require dirname(__FILE__).'/includes/common.inc.php';
_login_state();
if (isset($_GET['action']) && $_GET['action'] == 'register') {

//	_check_code($_POST['code'],$_SESSION['code']);
	include ROOT_PATH.'includes/check.func.php';
	$_clean = array();
//	$_clean['uniqid'] = _check_uniqid($_POST['uniqid'],$_SESSION['uniqid']);
	//active也是一个唯一标识符，用来刚注册的用户进行激活处理，方可登录。
	$_clean['active'] = _sha1_uniqid();
	$_clean['username'] = _check_username($_POST['username'],2,20);
	$_clean['password'] = _check_password($_POST['password'],$_POST['notpassword'],6);
	$_clean['question'] = _check_question($_POST['question'],2,20);
	$_clean['answer'] = _check_answer($_POST['question'],$_POST['answer'],2,20);
	$_clean['sex'] = _check_sex($_POST['sex']);
	$_clean['face'] = _check_face($_POST['face']);
	
	$username=$_clean['username'];
	$password=$_clean['password'];
	//在新增之前，要判断用户名是否重复
	if(_is_repeat(
				"SELECT username FROM tran_user WHERE username='{$_clean['username']}' LIMIT 1",
				'对不起，此用户已被注册'
	)){
		_alert_back('对不起，此用户已被注册');
	} ;
	
	_query(
						"INSERT INTO tran_user (
															
																username,
																password,
																question,
																answer,
																sex,
																face,
																reg_time,
																last_time,
																last_ip
																) 
												VALUES (
											
																'{$_clean['username']}',
																'{$_clean['password']}',
																'{$_clean['question']}',
																'{$_clean['answer']}',
																'{$_clean['sex']}',
																'{$_clean['face']}',
																NOW(),
																NOW(),
																'{$_SERVER["REMOTE_ADDR"]}'
																)"
	);
	if (_affected_rows() == 1) {
		//获取刚刚新增的ID
		$_clean['id'] = _insert_id();
		_close();
		_session_destroy();
		//生成XML
		_set_xml('new.xml',$_clean);
		_location('恭喜你，注册成功！','login.php');
	} else {
		_close();
		_session_destroy();
		_location('很遗憾，注册失败！','register.php');
	}
} else {
	$_SESSION['uniqid'] = $_uniqid = _sha1_uniqid();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script type="text/javascript" src="js/register.js"></script>
		<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">

	<title>注册</title>
	<style type="text/css">
        body{
            background:url(images/1.jpg);
            background-repeat:no-repeat;
            background-attachment:fixed;
            margin:0;
            padding:0
        }

		#register{
			padding-top: 30px;
			width: 280px;
			margin: auto;
		}
		#register h3{
			text-align: center;
		}

		#register dd{
			margin: 10px;
		}

		.face{
			text-align: center;
		}

		#submit{
			width: 160px;
		}
	</style>
</head>
<body>

<div id="register">
	<h3>用户注册</h3>
	<form method="post" action="register.php?action=register">
		<dl>
			<!-- <dt>请填写以下内容</dt> -->
			<input type="hidden" name="uniqid" value="<?php $_uniqid ?>">
			<dd><input type="text" name="username" class="form-control" placeholder="用户名"></dd>
			<dd><input type="password" name="password" class="form-control" placeholder="密码"></dd>
			<dd><input type="password" name="notpassword" class="form-control" placeholder="确认密码"></dd>
			<dd><input type="text" name="question" class="form-control" placeholder="密码提示"></dd>
			<dd><input type="text" name="answer" class="form-control" placeholder="密码回答"></dd>
			<dd class=""> 性  别：<input type="radio" name="sex" class="" checked="checked">男 <input type="radio" name="sex" class="">女</dd>
			<input type="hidden" name="face-img" value="face/m01.gif" id="face-img">
			<dd class="face"><img src="face/m01.gif" alt="头像选择" id="faceimg"></dd>

			<!-- <dd>验证码：<input type="text" name="yzm" class="text yzm"> <img src="code.php" id="code"> </dd> -->
			<dd class="face"><input type="submit" value="注册" id="submit" class="btn btn-success"></dd>

			
		</dl>
	</form>
</div>

</body>
</html>
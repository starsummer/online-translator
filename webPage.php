<?php 
	if(!isset($_COOKIE['username'])){
		echo "<script type='text/javascript'>alert('请登录');location.href='login.php';</script>";
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>网页浏览</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/webPage.css">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
	<!-- <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript"> var $min=$;</script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/webPage.js"></script>
    <!-- <script src="js/common.js" type="text/javascript"></script> -->

<!-- 	<script src="js/bgstretcher.js"></script>
    <link href="css/bgstretcher.css" rel="stylesheet" /> -->
    <style type="text/css">
        .url_box{
            width: 800px;
            margin: auto;
        }
    </style>
    <script type="text/javascript">
    // custom initialization

    </script>
</head>
<body>

<?php 
    require 'includes/header.inc.php';
?>

<?php 
    require 'includes/modal.inc.php';
?>

<!-- 输入地址栏 -->
<div class="input-group url_box">
    <input type="text" id="url" class="form-control">
    <span class="input-group-btn">
        <button id="goWebPage"  class="btn btn-default" type="button">
            Go!
        </button>
    </span>
</div><!-- /input-group -->
<div id="content">
    
</div>
<!-- <iframe id="html"></iframe> -->

</body>
</html>

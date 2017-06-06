<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>在线翻译</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    <script src="js/common.js" type="text/javascript"></script>
    <script src="js/index.js" type="text/javascript"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/bgstretcher.js"></script>
    <link href="css/bgstretcher.css" rel="stylesheet" />
</head>
<body>

<?php 
	require 'includes/header.inc.php';
?>

<div class="col-sm-12">

    <!-- 左边输入内容区 start-->
	<div class="col-sm-6">
		<div class="panel panel-info">
			<div class="panel-heading" style="text-align: center;font-size: 20px;">
				<i class="fa fa-user"></i>翻译的内容
			</div>
			<div class="panel-body" style="height: 300px;">
				<div id="content" class="form-control" contenteditable="true" style="width: 100%;height:100%; font-size: 20px;"  oninput="Get_translate();">
					
				</div>
			</div>
		</div>
	</div>
	<!-- 左边输入内容区 end -->
	
	
   <!-- 右边翻译显示区 start -->	
	<div class="col-sm-6">
		<div class="panel panel-success">
			<div class="panel-heading" style="text-align: center; font-size: 20px;">
				释义
			</div>
			<div class="panel-body" style="height: 300px;">
				<div id="explain" style="width: 100%;height:100%; font-size: 20px;">					
				</div>
			</div>
		</div>
	</div>	
    <!-- 右边翻译显示区 end -->


    <!-- 翻译按钮 start -->
    <div>
    	<div class="col-sm-6">
    		<button id="translate" onclick="Get_translate();"  class="btn btn-success col-sm-4 btn-lg" type="button" style="font-size: 20px;">
    			翻译
    		</button>
    	</div>
    </div>
    <!-- 翻译按钮 end -->    

</div>	

</body>
</html>

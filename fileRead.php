<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Learn By Doing</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script src="js/common.js" type="text/javascript"></script> -->
    <script src="js/myPagination.js"></script>
    <script src="js/fileRead.js"></script>
<!-- 	<script src="js/bgstretcher.js"></script>
    <link href="css/bgstretcher.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="css/fileRead.css">
    <script type="text/javascript">
    // custom initialization

    </script>
</head>
<body>

<!-- 导航栏 start -->
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="index.php">在线翻译</a>
		<button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#example-navbar-collapse">
            <span class="sr-only">So nice</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
	</div>
	<div class="collapse navbar-collapse" id="example-navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="fileRead.php">文本阅读</a></li>
			<li class="active"><a href="#">网页浏览</a></li>
		</ul>
	</div>
	</div>
</nav>
<!-- 导航栏 end -->

<div class="example">
    <div id="get_txt" calss="">
        <input id="file" class="btn btn-success" type="file" multiple="">
        

<!--          <div >
            <select id="fontsize">
                <option>选择字体大小</option>
                <option value="14px">14px</option>
                <option value="16px">16px</option>
                <option value="18px">18px</option>
            </select>
            <select id="lineheight">
                <option>选择行距大小</option>
                <option value="4">小</option>
                <option value="6">中</option>
                <option value="8">大</option>
            </select>
        </div> -->
        <div id="content"  calss="">
 
        </div>
        <div id="cPage"> </div>
        <div class="text-right">
        	<button id="to-prev" class="btn btn-primary btn-sm">上一页</button>
        	<button id="to-next" class="btn btn-primary btn-sm">下一页</button>
        </div>
    </div>
</div>	

</body>
</html>

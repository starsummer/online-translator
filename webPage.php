<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Learn By Doing</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/webPage.css">
	<!-- <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/ajax.min.js"></script>
    <script src="js/webPage.js"></script>
    <!-- <script src="js/common.js" type="text/javascript"></script> -->

<!-- 	<script src="js/bgstretcher.js"></script>
    <link href="css/bgstretcher.css" rel="stylesheet" /> -->

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
			<li class="active"><a href="webPage.php">网页浏览</a></li>
		</ul>
	</div>
	</div>
</nav>
<!-- 导航栏 end -->

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">在线翻译</h4>
            </div>
            <div id="explain" class="modal-body">在这里添加一些文本</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<!-- 输入地址栏 -->
<div>
    <form class="bs-example bs-example-form" role="form">
        <div class="row">
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" id="url" class="form-control">
                    <span class="input-group-btn">
                        <button id="goWebPage"  class="btn btn-default" type="button">
                            Go!
                        </button>
                    </span>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </form>
</div>
<div id="html">
    
</div>
<!-- <iframe id="html"></iframe> -->

</body>
</html>

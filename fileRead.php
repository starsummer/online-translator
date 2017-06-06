<?php 
    if(!isset($_COOKIE['username'])){
        echo "<script type='text/javascript'>alert('请登录');location.href='login.php';</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>文本阅读</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<!--     <script str="js/jquery.min.js"></script> -->
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script src="js/common.js" type="text/javascript"></script> -->
    <script src="js/myPagination.js"></script>
    <script src="js/fileRead.js"></script>
<!-- 	<script src="js/bgstretcher.js"></script>
    <link href="css/bgstretcher.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="css/fileRead.css">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
    <script type="text/javascript">
    // custom initialization

    </script>
</head>
<body>

<?php 
    require 'includes/header.inc.php';
?>

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
        <pre>
  Once when I was six years old I saw a magnificent picture in a book, called True Stories from Nature, about the primeval forest. It was a picture of a boa constrictor in the act of swallowing an animal. Here is a copy of the drawing. 
  In the book it said: "Boa constrictors swallow their prey whole, without chewing it. After that they are not able to move, and they sleep through the six months that they need for digestion." 

  I pondered deeply, then, over the adventures of the jungle. And after some work with a colored pencil I succeeded in making my first drawing. My Drawing Number One. It looked like this: 

  I showed my masterpiece to the grownups, and asked them whether the drawing frightened them.
  But they answered: "Frighten? Why should any one be frightened by a hat?" 

  My drawing was not a picture of a hat. It was a picture of a boa constrictor digesting an elephant. But since the grownups were not able to understand it, I made another drawing: I drew the inside of the boa constrictor, so that the grownups could see it clearly. They always need to have things explained. My Drawing Number Two looked like this: 
        </pre>
 
        </div>
        <div id="cPage"> </div>
        <div class="text-right">
        	<button id="to-prev" class="btn btn-primary btn-sm">上一页</button>
        	<button id="to-next" class="btn btn-primary btn-sm">下一页</button>
        </div>
    </div>
</div>	

<?php 
    require 'includes/modal.inc.php';
?>

</body>
</html>

<?php  
    ob_start();//开启缓存  
   // $content=  ob_get_contents();//从缓存中获取内容 
  // 	$url= 'http://www.w3xuexiao.com/h.asp';
   	$url= $_POST['url'];
    $content=file_get_contents($url);  
    ob_end_clean();//关闭缓存并清空  
    /***缓存结束***/  
    file_put_contents('htmlContent.html', $content);  
    // echo $content;   
    // echo "ok";  
?>  
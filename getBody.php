<?php  
    ob_start();//开启缓存  
   // $content=  ob_get_contents();//从缓存中获取内容 
   	 $url= $_POST['url'];
   	 $url= 'http://teach.ustb.edu.cn/';
    $html=file_get_contents($url);  
    ob_end_clean();//关闭缓存并清空  
    /***缓存结束***/    
    // echo $content;   
    // echo "ok";  
	function getBody($html,$urlRoot = null){
    //提取BODY主体
    preg_match('/<!--body-->(.*?)<!--body-->/is ', $html, $bodyArr);
    if(!$bodyArr){
        preg_match('/<body.*?>(.*?)<\/body>/is ', $html, $bodyArr);
    }
    if(!$bodyArr){
    	echo "http请求失败";
    	exit;
    }
    $body = $bodyArr[1];
    //替换img文件
    $body =  preg_replace('/(<[img|IMG].*src=[\'|"])(\.\.\/)*(img.[^\'||^"]+)/',"$1$urlRoot$3",$body);
    //替换html文件内的css背景图片
    $body =  preg_replace('~\b(background(-image)?\s*:(.*?)\(\s*[\'|"]?)(\.\.\/)*(img.*?)?\s*\)~i',"$1$urlRoot$5)",$body);
    return $body;
    }
    $body=getBody($html,$url);
    echo $body;
    file_put_contents('htmlContent.php', $body);
?>  

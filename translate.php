<?php

/**
 * 封装功能函数
 * 函数作用：得到 API 数据，Json 格式返回
 */

function Get_translate($content){

	// API 中的 keyfrom 和 key 换成你自己的 keyfrom 和 key
	$keyfrom = 'shiyanlou';
	$key = '1420514528';
	$doctype = 'json';
	
	// 地址栏中的中文，需要转码，否则无法进行翻译
	$content = urlencode($content);   

	$url = "http://fanyi.youdao.com/openapi.do?keyfrom=".$keyfrom."&key=".$key."&type=data&doctype=".$doctype."&version=1.1&q=".$content;
	
	$list = file_get_contents($url);
	$js_de = json_decode($list,true);
	return $js_de;
}

// $content = 'hello world!';

// $content = Get_translate($content);

// var_dump($content);

?>
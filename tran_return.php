<?php
header("Content-type:text/html;Charset=utf-8");
$content = file_get_contents("php://input");
$js_de= get_tran('$content');
$tran=array();

if($js_de['errorCode']!=0){

}
$tran=$js_de['basic']['explains'];
//print_r($tran);
// $tran['basic']=$js_de['basic'];
// $tran['web']=$js_de['web'];
// echo json_encode($tran);
// echo $js_de['translation'].'<br>';
// echo $js_de['basic'].'<br>';
// echo $js_de['web'].'<br>';
function get_tran($test){
	$url = "http://fanyi.youdao.com/openapi.do?keyfrom=onlinetranslation&key=1970660738&type=data&doctype=json&version=1.1&q=".$test;   
	$list = file_get_contents($url);
	$js_de = json_decode($list,true);
	return $js_de;
}

echo json_encode($tran);
// $array = $tran;
// function handleeach(&$array,$functionname)
// {
//     foreach($array as $k=>$v)
//     {
//         if(is_array($v))
//         {
//             handleeach(&$array[$k],$functionname);
//         }
//         else 
//             $array[$k] = $functionname($v);
//     }
// }
// handleeach($array,'stripslashes');
// print_r($array);
?>
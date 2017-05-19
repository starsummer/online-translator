<?
header('Content-type: text/html; charset=utf8');
$json = file_get_contents("php://input"); 
$arr[1]=1;
$arr[2]=2;
echo json_encode($arr);
?>
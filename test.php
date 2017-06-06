<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>document示例</title>
</head>
<body  onload="test()">
<table id ="czy"><tr><td>★</td><td>★</td><td>★</td><td>★</td><td>★</td></tr></table>
<input type="button" id="ok" value="打分">

<script>
    var tds=document.getElementsByTagName("td");
    for(var i=0;i<tds.length;i++){
        tds[i].onmouseover=test;
    }
    var index;
    function  test(){

        for(var i=0;i<tds.length;i++){
            if(tds[i]==this)
            {
                index=i;
            }
        }
        //选中的设置成红色 没选中的设置成黑色
        for(var i=0;i<=index;i++) {
            tds[i].style.color = "red";
        }
        for(var i=index+1;i<tds.length;i++){
            tds[i].style.color="black";
        }
    }
    document.getElementById("ok").onclick=function(){
        alert("评分："+(index+1)+"分");
    }
</script>
</body>
</html>
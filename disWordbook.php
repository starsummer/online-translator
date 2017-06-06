<?php 
    if(!isset($_COOKIE['username'])){
        echo "<script type='text/javascript'>alert('请登录');location.href='login.php';</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>生词本</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="https://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
<!--     <script str="js/jquery.min.js"></script> -->
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <script src="js/common.js" type="text/javascript"></script> -->
    <script src="js/myPagination.js"></script>
    <script src="js/fileRead.js"></script>
<!--    <script src="js/bgstretcher.js"></script>
    <link href="css/bgstretcher.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="css/fileRead.css">
    <style type="text/css">
        #content{
            width: 980px;
            margin: auto;
            /*background-color: rgba(79,62,63,0.2);*/
            background-color: rgba(1,1,1,0.1);
        }
    </style>
</head>
<body>

<?php 
    require 'includes/header.inc.php';
?>


<div id="content"  calss="">
</div>


<?php 
    require 'includes/modal.inc.php';
?>
<script type="text/javascript">
    $(document).ready(function (){
        $.ajax({
            type: 'post',
            url:'dis_wordbook_server.php',
            data:{

            },
            datatype:'json',
            success:function(data){
                var data=eval('('+data+')');
                for(var i=0;i<data.length;i++){
                    $('#content').append("<p>"+data[i].word+" "+data[i].meaning +"</p>");
                }
                // for(var i=0,length=data.length;i<2;i++){
                //     for(var key in data[i]){
                //         console.log(key+" "+data[i][key]);
                //     }

                //     console.log(data[i]);
                //     // $('#content').append("<li>"+data[i]['word']+" "+data[i]['meaning'] +"</li>");
                // }
                // $.each(data,function(i,n){ 
                //     //获取对象中属性为optionsValue的值 
                //     $('#content').append("<li>"+n.word+"</li>"); 
                // }); 
            }
        })
    })
</script>
</body>
</html>

var $content;
var $meaning='';
var evTimeStamp = 0;
var tds;
var username;
var index;
var url;
var selected_meaning;

//是否支持file API
function isSupportFileApi() {
    if(window.File && window.FileList && window.FileReader && window.Blob) {
        return true;
    }
    else{
        alert("您的浏览器不支持file API");
    }
}
function read_files(fileArray){
    for(var i in fileArray){
        var file = fileArray[i]; //这个file对象有以下属性可供读取name、size、lastModifiedDate和type等。
        var reader = new FileReader();
        if(/text\/\w+/.test(file.type)) { //判断文本文件
            reader.readAsText(file);//readAsText函数用于将文件读取为文本
            reader.onload = function() { //成功读取完毕后触发onload事件
//              document.getElementById('content').innerHTML="<pre>"+this.result+"</pre>";
                $("#content").html("<pre>"+this.result+"</pre>")
                //分页
                $('#content').MyPagination({height: 1200, fadeSpeed: 400});
            }
            

        }else if(/image\/\w+/.test(file.type)) { //判断图片文件
            reader.onload = function() {
                document.getElementById('content').innerHTML='<img src='+this.result+'>';
            }
            reader.readAsDataURL(file);//readAsDataUrl函数用于将文件读取为Data url
        }
    }
}

$(document).ready(function(){
    //监听文件上传
    $('#file').change(function(){
        read_files(this.files);
    });
});


$(document).ready(function () {
    function getCookie(c_name){
    if (document.cookie.length>0){
        c_start=document.cookie.indexOf(c_name + "=");
        if (c_start!=-1){ 
            c_start=c_start + c_name.length+1 ;
            c_end=document.cookie.indexOf(";",c_start);
            if (c_end==-1) c_end=document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        } 
    }
    return "";
    }

    function star(){
        for(var i=0;i<tds.length;i++){
            if(tds[i]==this){
               index=i+1;
            }
        }
        //选中的设置成红色 没选中的设置成黑色
        for(var i=0;i<=index-1;i++) {
            tds[i].style.color = "red";
        }
        for(var i=index;i<tds.length;i++){
            tds[i].style.color="black";
        }
    }
    //评分
    function add_star(){
        var radio = document.getElementsByName("other_meaning");  
        for (i=0; i<radio.length; i++) {  
            if (radio[i].checked) {  
                $.ajax({
                    url:'star_server.php',
                    type:'post',
                    data:{
                        'word':$content,
                        'meaning': radio[i].value,   
                        'star':index,
                    },
                    dataType:'json',
                    success:function(data){                        
                        if(data.repeat==0){
                            alert("成功为"+radio[i].value+"打分："+index);
                        }else{
                            alert("您已经为该释义评过分了");
                        }                    
                    }
                })  
            }    
        }
    }

    //获取选中文字并显示翻译
    $("#content").mouseup(function (e) {
        var parentOffset = $(this).offset();
        var x = e.pageX - parentOffset.left;
        var y = e.pageY - parentOffset.top;
        $content = getText();
        $content = $content.trim();
        console.log($content+" x:"+x+" y:"+y);

        $.ajax({
            type:'post',
            url: 'Getcontent.php',
            data:{
                'content':$content,
            },
            dataType:'json',
            success:function(data){
                $("#explain").html('');
                $("#myModalLabel").html($content);
                $("#explain").append("有道翻译：" + data.translation + "<br/>");
                $meaning='';
                if(typeof data.basic != 'undefined'){
                    $("#explain").append("释义：" + "<br/> &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;");
                    for(var i = 0;i < data.basic['explains'].length;i++){
                        $("#explain").append(data.basic['explains'][i] + "<br/> &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;");
                        $meaning+=data.basic['explains'][i];
                    }
                }
                if(typeof data.others != 'undefined' && data.others.length>0 ){
                    
                    $("#explain").append("<br/>"+"others:"+" &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;");
                    $("#explain").append("<form id='oth' action='replace.php' method='post'>");
                    for(var i=0;i<data.others.length;i++){
                        $("#explain").append(" &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;"+"<input name='other_meaning' type='radio' value="+data.others[i]['meaning']+ ">"+data.others[i]['username'] + "："+data.others[i]['meaning'] +"&nbsp; &nbsp;"+"<span>"+data.others[i]['avg']+"分 by " +data.others[i]['count']+"人"+"</span>"+ "<br/>");
                        // username[i]=data.others[i]['username'];
                    }
                    $("#explain").append("<div class='input-group replace'><span class='input-group-btn'><button id='replace_btn'  class='btn btn-sm btn-default' type='submit'>替换</button></span></div>");
                    $("#explain").append("</form>");
                    document.getElementById('replace_btn').onclick=get_replace;
                    $("#explain").append("<table id ='czy'><tr><td>★</td><td>★</td><td>★</td><td>★</td><td>★</td></tr></table>");
                    $("#explain").append("<div class='input-group'><span class='input-group-btn'><button id='star_btn'  class='btn btn-sm btn-default' type='submit'>打分</button></span></div>");
                    //评分
                    tds=document.getElementsByTagName("td");
                    for(var i=0;i<tds.length;i++){
                        tds[i].onmouseover=star;
                    }
                    document.getElementById('star_btn').onclick=add_star;
                }
                $('#myModal').modal('show');
            }
        }); 


        $('modal').unbind('click').on('click', '#user_meaning_btn',function(e){});
        

        //用户提供翻译
        document.getElementById('user_meaning_btn').onclick=function(e){

            //时间戳防止出发两次点击事件但不顶用？    
         //    var now = Date.parse( new Date());
         // //   alert(now);
         //     console.log("now:"+now);
         //     console.log("evTimeStamp:"+evTimeStamp);
         //     console.log("now - evTimeStamp"+(now - evTimeStamp) );
            // if (now - evTimeStamp < 3000) {
            //   return;
            // }
            evTimeStamp = Date.parse( new Date());
            var meaning=$('#user_meaning').val();

            if(meaning.replace(/(^s*)|(s*$)/g, "").length == 0){
                alert("内容为空，请重新输入");
            }
            else{
                var word=getText();
                
                $.ajax({
                    type:'post',
                    url: 'addMeaning.php',
                    data:{
                        'word':$content,
                        'meaning':meaning,
                    },
                    dataType:'json',
                    success:function(data){

                        if(data.repeat==0){
                            alert("您成功为"+$content+"添加了释义："+meaning);
                        $("#oth").append(" &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;"+"<input name='other_meaning' type='radio' value="+meaning+ ">"+getCookie('username') + "："+meaning +"&nbsp; &nbsp;"+"<span>"+"0"+"分 by " +"0"+"人"+"</span>"+ "<br/>");

                        }else{
                            alert("该释义已存在");
                        }
                        
                        // document.getElementById('user_meaning').value='';
                        $("#user_meaning").attr("value","");
                    }
                }); 

            }
  //        $('#user_meaning').val()='';
        }


        //获取选中的值
        function get_replace(){  
        // method 1   
            var radio = document.getElementsByName("other_meaning");  
            for (i=0; i<radio.length; i++) {  
                if (radio[i].checked) {  
                // alert(radio[i].value);
                selected_meaning= radio[i].value; 
                //替换
                replace($content,radio[i].value);

                // 把url word meaning存入数据库

                $.ajax({
                	url: 'url_server_store.php',
                	type:'post',
                	data:{
                		'url':url,
                		'word':$content,
                		'meaning':selected_meaning,
                	},
                	dataType:'json',

                	success:function(data){
                		// if(typeof data.replaced_word !='undefined' && data.replaced_word.length>0){
                		// 	console.log("233333333333");
                		// 	for(var i=0,length=data.replaced_word;i<length;i++){
                		// 		replace(data.replaced_word[i]['word'],data.replaced_word[i]['meaning']);
                		// 	}
                		// }
                	}
                })
                }
            }
        }
        //替换
        function replace(text,meaning){    
            var reg= new RegExp(text,"g"); 
            console.log(reg);
            console.log( document.getElementById('content').innerHTML);
            document.getElementById('content').innerHTML=document.getElementById('content').innerHTML.replace(reg,meaning);
        }

    });
});

$(document).ready(function () {


    //加入生词本
    document.getElementById("add_wordbook_btn").onclick=addToWordbook;
    function addToWordbook(){
            $.ajax({
                type:'post',
                url: 'wordbook.php',
                data:{
                    'content':$content,
                    'meaning':$meaning,
                },
                dataType:'json',
                success:function(data){
                    if(data.repeat==0){
                        alert("成功将"+$content+"加入单词本");
                    }else{
                        alert($content+"已在单词本中");
                    }
                }
            }); 
    }
})

/*获取选中的文字*/
function getText(){
    if (window.getSelection) {
        return window.getSelection().toString();
    } else if (document.getSelection) {
        return document.getSelection();
    } else if (document.selection) {
        return document.selection.createRange().text;
    }else{
        return "";
    }
}   

$min(document).ready(function(){
    //监听点击事件
    $min('#goWebPage').click(function(){
        url=$min('#url').val();
        console.log(url);
        $min.ajax({
            type:'post',
            url:'getHtml.php',
            data:{
                'url':url,
            },
            dataType: 'json',
            success:function(data){
            //  $min('body').append(data);
                $min("#content").load("htmlContent.html",function(){
            //      alert("success");
            		rep();
                });
                
            }
        })
    });
    //第二次浏览进行替换
    function rep(){
    				console.log("debug");
    	            $.ajax({
                	url: 'url_server.php',
                	type:'post',
                	data:{
                		'url':url,
                		'word':$content,
                		'meaning':selected_meaning,
                	},
                	dataType:'json',
                	success:function(data){
                		console.log("debuggggggggggggggggggggggggggggg");
                		if(typeof data.replaced_word !='undefined' && data.replaced_word.length>0){
                			alert(data.replaced_word);
                			for(var i=0,length=data.replaced_word;i<length;i++){
                				replace(data.replaced_word[i]['word'],data.replaced_word[i]['meaning']);
                			}
                		}
                	},
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest.status);
                        console.log(XMLHttpRequest.readyState);
                        console.log(textStatus);
                        console.log(errorThrown);
                    },
                })
    }
});
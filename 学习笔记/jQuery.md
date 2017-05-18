## 1，连接jQuery库
Google CDN:

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js">
    </script>
Microsoft CDN:
    
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js">
    </script>

## 2，基础语法
    $(selector).action()

文档就绪函数

    $(document).ready(function(){
        --- jQuery functions go here ----
    });


## 3，选择器
#### jQuery 元素选择器
    jQuery 使用 CSS 选择器来选取 HTML 元素。
    $("p") 选取 <p> 元素。
    $("p.intro") 选取所有 class="intro" 的 <p> 元素。
    $("p#demo") 选取所有 id="demo" 的 <p> 元素。

#### jQuery 属性选择器
    jQuery 使用 XPath 表达式来选择带有给定属性的元素。
    $("[href]") 选取所有带有 href 属性的元素。
    $("[href='#']") 选取所有带有 href 值等于 "#" 的元素。
    $("[href!='#']") 选取所有带有 href 值不等于 "#" 的元素。
    $("[href$='.jpg']") 选取所有 href 值以 ".jpg" 结尾的元素。

#### jQuery CSS 选择器
    Query CSS 选择器可用于改变 HTML 元素的 CSS 属性。
    $("p").css("background-color","red");

## 4，jQuery 事件函数
    $("button").click(function() {..some code... } )

jQuery事件参考手册：http://www.w3school.com.cn/jquery/jquery_ref_events.asp

获取鼠标位置：mousemove()方法

实例： 

    $(document).ready(function(){
        $(document).mousemove(function(e){
        $("span").text(e.pageX + ", " + e.pageY);
        });
    });
    

##5，jQuery效果
可以实现隐藏/显示、淡入淡出、滑动、动画等效果，后期可以利用此去美化页面

##6，Jquery HTML
####获取内容
- text() - 设置或返回所选元素的文本内容，会忽略HTML标记
- html() - 设置或返回所选元素的内容（包括 HTML 标记）
- val() - 设置或返回表单字段的值

实例：

    $("#btn1").click(function(){
        alert("Text: " + $("#test").text());
    });
    $("#btn2").click(function(){
        alert("HTML: " + $("#test").html());
    });
    $("#btn1").click(function(){
        alert("Value: " + $("#test").val());
    });
####设置内容
    text() - 设置或返回所选元素的文本内容
    html() - 设置或返回所选元素的内容（包括 HTML 标记）
    val() - 设置或返回表单字段的值
实例：

    $("#btn1").click(function(){
        $("#test1").text("Hello world!");
    });
    $("#btn2").click(function(){
        $("#test2").html("<b>Hello world!</b>");
    });
    $("#btn3").click(function(){
        $("#test3").val("Dolly Duck");
    });    
####回调函数：
text()、html() 以及 val()，同样拥有回调函数。回调函数由两个参数：被选元素列表中当前元素的下标，以及原始（旧的）值。然后以函数新值返回您希望使用的字符串。
    
    $("#btn1").click(function(){ 
    $("#test1").text(function(i,origText){  //origText为旧文本/HTML
        return "Old text: " + origText + " New text: Hello world!
        (index: " + i + ")";
        });
    });

    $("#btn2").click(function(){
    $("#test2").html(function(i,origText){
        return "Old html: " + origText + " New html: Hello <b>world!</b>
        (index: " + i + ")";
        });
    });    

####获取属性 - attr()
    $("button").click(function(){
        alert($("#w3s").attr("href"));
    });
attr()同样具有回调函数

####添加新的HTML内容
- append() - 在被选元素的结尾插入内容
- prepend() - 在被选元素的开头插入内容
- after() - 在被选元素之后插入内容
- before() - 在被选元素之前插入内容

####删除元素/内容
- remove() - 删除被选元素（及其子元素）
- empty() - 从被选元素中删除子元素，不删除本身元素，相当于清空

jQuery remove() 方法也可接受一个参数，允许您对被删元素进行过滤。
该参数可以是任何 jQuery 选择器的语法。
       
    $("p").remove(".italic");

##获取并设置CSS类
- addClass() - 向被选元素添加一个或多个类
- removeClass() - 从被选元素删除一个或多个类
- toggleClass() - 对被选元素进行添加/删除类的切换操作
- css() - 设置或返回样式属性

**返回CSS属性：**

语法：

    css("propertyname");

将返回首个匹配元素的 background-color 值 （为什么是首个呢？）

    $("p").css("background-color");   

**设置CSS属性**

语法：

    css("propertyname","value");    

####尺寸
- width()，设置或返回元素的宽度（不包括内边距、边框或外边距）
- height()，设置或返回元素的高度（不包括内边距、边框或外边距）
- innerWidth()，返回元素的宽度（包括内边距）
- innerHeight()，返回元素的高度（包括内边距）
- outerWidth()，返回元素的宽度（包括内边距和边框）
- outerHeight()，返回元素的高度（包括内边距和边框）
- outerWidth(true)，返回元素的宽度（包括内边距、边框和外边距）
- outerHeight(true)，返回元素的高度（包括内边距、边框和外边距）

##jQuery遍历

####向上遍历DOM树
- parent()方法返回被选元素的直接父元素。
- parents()方法返回被选元素的所有祖先元素，它一路向上直到文档的根元素 (<html>)。
- parentsUntil()方法返回介于两个给定元素之间的所有祖先元素。

####向下遍历DOM树
- children()方法返回被选元素的所有直接子元素。
- find()方法返回被选元素的后代元素，一路向下直到最后一个后代。

可以使用可选参数来过滤对子元素的搜索
    
    选择直接子元素中的p元素
    $(document).ready(function(){ 
        $("div").children("p"); 
    });

    返回属于<div> 后代的所有 <span>元素。   
     $(document).ready(function(){
         $("div").find("span");
    });

    返回所有后代
    $(document).ready(function(){
        $("div").find("*");
    });

####遍历兄弟元素
- siblings() 方法返回被选元素的所有同胞元素。
- next() 方法返回被选元素的下一个同胞元素。
- nextAll() 方法返回被选元素的所有跟随的同胞元素。
- nextUntil() 方法返回介于两个给定参数之间的所有跟随的同胞元素。
- prev() 同理
- prevAll() 同理
- prevUntil() 同理

####过滤
- first() 方法返回被选元素的首个元素。
- last() 方法返回被选元素的最后一个元素。
- eq() 方法返回被选元素中带有指定索引号的元素。
- filter()规定一个标准，不匹配这个标准的元素会被从集合中删除，匹配的元素会被返回。
- not() 方法返回不匹配标准的所有元素，与filter()正好相反

实例：
        
    选择第二个p元素
    $(document).ready(function(){
        $("p").eq(1);
    });

    选择带有类名 "intro" 的所有 <p> 元素
    $(document).ready(function(){
        $("p").filter(".intro");
    });    

##jQuery AJAX

####jQuery load()
load() 方法从服务器加载数据，并把返回的数据放入被选元素中。
语法 ：

    $(selector).load(URL,data,callback);
    必需的 URL 参数规定您希望加载的 URL。
    可选的 data 参数规定与请求一同发送的查询字符串键/值对集合。
    可选的 callback 参数是 load() 方法完成后所执行的函数名称
可以把 jQuery 选择器添加到 URL 参数。
    
    把 "demo_test.txt" 文件中 id="p1" 的元素的内容，加载到指定的 <div> 元素中：    
    $("#div1").load("demo_test.txt #p1");

可选的 callback 参数规定当 load()方法完成后所要允许的回调函数。回调函数可以设置不同的参数：

- responseTxt - 包含调用成功时的结果内容
- statusTXT - 包含调用的状态
- xhr - 包含 XMLHttpRequest 对象

实例：

    $("button").click(function(){
    $("#div1").load("demo_test.txt",function(responseTxt,statusTxt,xhr){
        if(statusTxt=="success")
            alert("外部内容加载成功！");
        if(statusTxt=="error")
            alert("Error: "+xhr.status+": "+xhr.statusText);
        });
    });

####get() 和 post() 方法
jQuery get() 和 post() 方法用于通过 HTTP GET 或 POST 请求从服务器请求数据。

- GET - 从指定的资源请求数据
- POST - 向指定的资源提交要处理的数据

GET 基本上用于从服务器获得（取回）数据。注释：GET 方法可能返回缓存数据。

POST也可用于从服务器获取数据。不过，POST方法不会缓存数据，并且常用于连同请求一起发送数据


**jQuery $.get() 方法**

$.get() 方法通过 HTTP GET 请求从服务器上请求数据

语法：

    $.get(URL,callback);
    必需的 URL 参数规定您希望请求的 URL。
    可选的 callback 参数是请求成功后所执行的函数名。

实例：
    
    请求demo_test.asp
    $("button").click(function(){
        $.get("demo_test.asp",function(data,status){ //第一个回调参数存有被请求页面的内容，第二个回调参数存有请求的状态
            alert("Data: " + data + "\nStatus: " + status);
        });
    });

**jQuery $.post() 方法**

$.post() 方法通过 HTTP POST 请求从服务器上请求数据。

语法：
    
    $.post(URL,data,callback);
    必需的 URL 参数规定您希望请求的 URL。
    可选的 data 参数规定连同请求发送的数据。
    可选的 callback 参数是请求成功后所执行的函数名。

实例：

    $("button").click(function(){
    $.post("demo_test_post.asp",
    {
    name:"Donald Duck",
    city:"Duckburg"
    },
    function(data,status){
        alert("Data: " + data + "\nStatus: " + status);
    });
    });
$.post() 的第一个参数是希望请求的 URL ("demo_test_post.asp")。

然后连同请求（name 和 city）一起发送数据。

"demo_test_post.asp" 中的 ASP 脚本读取这些参数，对它们进行处理，然后返回结果。

第三个参数是回调函数。第一个回调参数存有被请求页面的内容，而第二个参数存有请求的状态。

####AJAX操作函数
- jQuery.ajax()   执行异步 HTTP (Ajax) 请求。
- .ajaxComplete() 当 Ajax 请求完成时注册要调用的处理程序。这是一个 Ajax 事件。
- .ajaxError()    当 Ajax 请求完成且出现错误时注册要调用的处理程序。这是一个 Ajax 事件。
- .ajaxSend() 在 Ajax 请求发送之前显示一条消息。
- jQuery.ajaxSetup()  设置将来的 Ajax 请求的默认值。
- .ajaxStart()    当首个 Ajax 请求完成开始时注册要调用的处理程序。这是一个 Ajax 事件。
- .ajaxStop() 当所有 Ajax 请求完成时注册要调用的处理程序。这是一个 Ajax 事件。
- .ajaxSuccess()  当 Ajax 请求成功完成时显示一条消息。
- jQuery.get()    使用 HTTP GET 请求从服务器加载数据。
- jQuery.getJSON()    使用 HTTP GET 请求从服务器加载 JSON 编码数据。
- jQuery.getScript()  使用 HTTP GET 请求从服务器加载 JavaScript 文件，然后执行该文件。
- .load() 从服务器加载数据，然后把返回到 HTML 放入匹配元素。
- jQuery.param()  创建数组或对象的序列化表示，适合在 URL 查询字符串或 Ajax 请求中使用。
- jQuery.post()   使用 HTTP POST 请求从服务器加载数据。
- .serialize()    将表单内容序列化为字符串。
- .serializeArray()   序列化表单元素，返回 JSON 数据结构数据。


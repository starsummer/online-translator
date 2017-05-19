##XMLHttpRequest 对象

XMLHttpRequest 用于在后台与服务器交换数据。这意味着可以在不重新加载整个网页的情况下，对网页的某部分进行更新。

####创建XMLHttpRequest 对象

    variable=new XMLHttpRequest();
    若要兼容旧版本浏览器
    var xmlhttp;
    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else{// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

####向服务器发送请求

- xmlhttp.open("GET","test1.txt",true);
- xmlhttp.send();

**open(method,url,async)**

规定请求的类型、URL 以及是否异步处理请求

参数：

- method：请求的类型；GET 或 POST
- url：文件在服务器上的位置
- async：true（异步）或 false（同步）

**send(string)**

将请求发送到服务器。

string：仅用于 POST 请求

####get与post
与 POST 相比，GET 更简单也更快，并且在大部分情况下都能用。

在以下情况中，请使用 POST 请求：

- 无法使用缓存文件（更新服务器上的文件或数据库）
- 向服务器发送大量数据（POST 没有数据量限制）
- 发送包含未知字符的用户输入时，POST 比 GET 更稳定也更可靠

####GET 请求

    xmlhttp.open("GET","demo_get.asp",true);
    xmlhttp.send();

如果希望通过 GET 方法发送信息，请向 URL 添加信息：

    xmlhttp.open("GET","demo_get2.asp?fname=Bill&lname=Gates",true);
    xmlhttp.send();

####POST请求

一个简单 POST 请求：
    
    xmlhttp.open("POST","demo_post.asp",true);
    xmlhttp.send();

若需要像 HTML 表单那样 POST 数据，请使用 setRequestHeader() 来添加 HTTP 头。然后在 send() 方法中规定希望发送的数据：

    xmlhttp.open("POST","ajax_test.asp",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("fname=Bill&lname=Gates");

**setRequestHeader(header,value)**

向请求添加 HTTP 头。

- header: 规定头的名称
- value: 规定头的值

####AJAX - 服务器响应

**responseText 属性**

如果来自服务器的响应并非 XML，请使用 responseText 属性。

responseText 属性返回字符串形式的响应

    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;

**responseXML 属性**

如果来自服务器的响应是 XML，而且需要作为 XML 对象进行解析，请使用 responseXML 属性。

#### XMLHttpRequest对象的三个重要的属性

**onreadystatechange 事件**

当请求被发送到服务器时，我们需要执行一些基于响应的任务。

每当 readyState 改变时，就会触发 onreadystatechange 事件。

**readyState**
存有 XMLHttpRequest 的状态。从 0 到 4 发生变化。

- 0: 请求未初始化
- 1: 服务器连接已建立
- 2: 请求已接收
- 3: 请求处理中
- 4: 请求已完成，且响应已就绪

**status**

- 200: "OK"
- 404: 未找到页面

####Callback 函数

callback 函数是一种以参数形式传递给另一个函数的函数。

该函数调用应该包含 URL 以及发生 onreadystatechange 事件时执行的任务（每次调用可能不尽相同）：

    function myFunction(){
    loadXMLDoc("ajax_info.txt",function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
        }
    });
    }














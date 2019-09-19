function zc(){
    window.location.href='./php/zc.php';
}

function dc(){
    window.location.href='./php/dc.php';
}

function change(b){
    var all=document.getElementsByTagName("a");
    for(var i=0;i<4;i++){
        all[i].className='';
    }
    b.className='clicked';
}

var catid=0;
function getNews(a){
    catid=a;
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("newst").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","/test/php/getNews.php?id="+a+"&page=0",true);
xmlhttp.send();
}

var page=0; //页数
function getNewsy(a){
    if(a==2)page+=1;
    else if(a==1)page-=1;
    else page=0;
    var zy=document.getElementsByTagName("option");
    zy=zy[zy.length-1].value;
    if(page>=zy)page=0;
    if(page<0)page=0;
    var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("newst").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","/test/php/getNews.php?id="+catid+"&page="+page,true);
xmlhttp.send();
}

getNews(1);

function yschange(){
  var  myselect=document.getElementById("ys");
  var index=myselect.selectedIndex;
  page=myselect.options[index].value;
  myselect.options[index].selected;
  page-=1;
  if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("newst").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","/test/php/getNews.php?id="+catid+"&page="+page,true);
xmlhttp.send();
}


function liuy(){
  var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("conment").innerHTML+=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","/test/php/liuy.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("lyt="+lyt.value+"&id="+Nid.value);
lyt.value="";
}

function checkn(){
  if(title.value==''||njy.value==''||editor.value==''){
    alert("请填写完整，不要留空");
    return false;
  }
  else return ture;
}
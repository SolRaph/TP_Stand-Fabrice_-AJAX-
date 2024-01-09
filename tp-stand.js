function getxhr() {
   try{xhr=new XMLHttpRequest();}
   catch(e){
    try{xhr=new ActiveXObject("Microsoft.XMLHTTP");}
    catch(e1){
        alert("Erreur!");
    }
   }
   return xhr;
}

function ajaxing(){
    xhr=getxhr();
    xhr.onreadystatechange=function(){
        if(xhr.readyState===4 && xhr.status===200) {
            document.getElementById("sugg").innerHTML=xhr.responseText;
        }
        else
        document.getElementById("sugg").innerHTML="error";
    }
    xhr.open("post","contenu.php",true);
    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhr.send("mot="+document.getElementById("mot").value);
}
document.getElementById("sugg").onclick=function(){
    document.getElementById("mot").value=event.target.textContent;
}
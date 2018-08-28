var xhttp;
var xmlhttp;
var xmlResponse;
var xmlStatusResponse;
var statusRoot;
var msg;
var usr;
var chatData;
var printMsg='';
var newData='';
var cprintMsg='';
var cuser='';
var cuData='';
var count=0;

function handle(){
    try {
        xhttp = new XMLHttpRequest();
        if (xhttp){
            if (xhttp.readyState==0 || xhttp.readyState==4){
                xhttp.open("GET", "fetch.php?getMsg", true);
                xhttp.onreadystatechange=handleResponse;
                xhttp.send(null);
            }
        }
    }
    catch (e){
        alert("Sorry, something went wrong !");
        console.log(e);
    }
    setTimeout(handle, 1000);
}

function handleResponse(){
    if (xhttp.readyState==4){
        if (xhttp.status==200){
            xmlResponse=xhttp.responseXML;
            root=xmlResponse.documentElement;
            msg=root.getElementsByTagName("message");
            usr=root.getElementsByTagName("user");
            chatData=document.getElementById("chatData");

            for(var i=0; i<msg.length; i++){
                var inputData= msg.item(i).firstChild.data;
                var usrPrint= usr.item(i).firstChild.data;
                printMsg='<pre class="">'+usrPrint+':    '+inputData+'</pre>';
                newData += printMsg;
            }
            var ht=chatData.innerHTML;
            console.log(newData);
            console.log(chatData.innerHTML);

            if (chatData.innerHTML != newData){
                chatData.innerHTML = newData;
                scroll();
                count=count+1;
            }

            newData='';
            printMsg='';
            usr='';
            checkStatus();
        }
    }
}

function send(){
    var newMsg=document.getElementById('newMsg').value;
    if (newMsg != ''){
        newMsg = 'saveMsg='+newMsg;
        newMsg = encodeURI(newMsg);
        console.log(newMsg);
        try {
            xhttp = new XMLHttpRequest();
            if (xhttp){
                if (xhttp.readyState==0 || xhttp.readyState==4){
                    xhttp.open("POST", "fetch.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                   
                    xhttp.send(newMsg);
                }
            }
            document.getElementById('newMsg').value='';
        }
        catch (e){
            alert("Sorry, something went wrong !");
            console.log(e);
        }
    }
}


function validate(){
    textChat=document.getElementById('newMsg').value;
    btn=document.getElementById('send');
    if (!textChat.replace(/\s/g, '').length) {
        // string only contained whitespace (ie. spaces, tabs or line breaks)
        btn.setAttribute("disabled", "disabled");
    }
    else{
        btn.removeAttribute("disabled", "disabled");
    }
}


function clearTxt(){
    document.getElementById('newMsg').value='';
}


function scroll(){
    $(document).ready(function(){
        height = 360000;
        $('#scroll1').animate({scrollTop: height});
        });
}



function register(){
    var empID= document.getElementById('empID').value;
    var name= document.getElementById('name').value;
    var mobile= document.getElementById('mobile').value;
    var email= document.getElementById('email').value;
    var pass= document.getElementById('pass').value;

    if (empID == '' || name == '' || mobile == '' || email == '' || pass ==''){
        swal("Hey !", "Registration Fields can not be empty !", "warning");
    }
    else{
        try {
            xhttp = new XMLHttpRequest();
            if (xhttp){
                if (xhttp.readyState==0 || xhttp.readyState==4){
                    console.log(empID+' '+name+' '+mobile+' '+email+' '+pass);
                    var userData= 'empID='+empID+'&name='+name+'&mobile='+mobile+'&email='+email+'&pass='+pass;
                    xhttp.open("GET", "fetch.php?"+userData, true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.onreadystatechange=handleResponseRegister;
                    xhttp.send(null);
                    // swal("Yupp !!!", "You have been registered successfully !", "success");
                    
                }
            }
        }
        catch (e){
            alert("Sorry, something went wrong !");
            console.log(e);
        }   
    }
}

function handleResponseRegister(){
    if (xhttp.responseText == "noID"){
        swal("Oops !!!", "Employee ID exists !", "error");
    }
    else if (xhttp.responseText == "noMob"){
        swal("Oops !!!", "Mobile number already exists !", "error");
    }
    else if (xhttp.responseText == "noEmail"){
        swal("Oops !!!", "Email already exists !", "error");
    }
    else if (xhttp.responseText == "yes"){
        swal("Yo !!!", "Successfully Registered !", "success");
    }
}

function login(){
    var userID= document.getElementById('loginID').value;
    var userPass= document.getElementById('loginPass').value;
    if (userID == '' || userPass == ''){
        swal("Hey !", "Login Fields can not be empty !", "warning");
    }
    else{
        try {
            xhttp = new XMLHttpRequest();
            if (xhttp){
                if (xhttp.readyState==0 || xhttp.readyState==4){
                    var userData= 'userID='+userID+'&userPass='+userPass;
                    xhttp.open("GET", "fetch.php?"+userData, true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.onreadystatechange=handleResponseLogin;
                    xhttp.send(null);
                    // swal("Yupp !!!", "You have been registered successfully !", "success");
                    
                }
            }
        }
        catch (e){
            alert("Sorry, something went wrong !");
            console.log(e);
        }   
    }
}

function handleResponseLogin(){
    if (xhttp.responseText == "invalid"){
        swal("Sorry !!!", "Login ID or Password is incorrect !", "error");
    }

    else if (xhttp.responseText == "success"){
        window.location = "home.php";
    }
}

function about(){
    swal("Zauba Live Chat v1.0 Beta", "Zauba Technologies & Data Services Private Limited.", "info");
}

function logout(){
        try {
            xhttp = new XMLHttpRequest();
            if (xhttp){
                if (xhttp.readyState==0 || xhttp.readyState==4){
                    xhttp.open("GET", "fetch.php?logout", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.onreadystatechange=handleResponseLogout;
                    xhttp.send(null);
                    // swal("Yupp !!!", "You have been registered successfully !", "success");
                    
                }
            }
        }
        catch (e){
            alert("Sorry, something went wrong !");
            console.log(e);
        }    
}

function handleResponseLogout(){
    window.location = "index.php";
}


function checkStatus() {
    try {
        xmlhttp = new XMLHttpRequest();
        if (xmlhttp){
            if (xmlhttp.readyState==0 || xmlhttp.readyState==4){
                xmlhttp.open("GET", "fetch.php?checkStatus", true);
                xmlhttp.onreadystatechange=handleResponseStatus;
                xmlhttp.send(null);
            }
        }
    }
    catch (e){
        alert("Sorry, something went wrong !");
        console.log(e);
    }
}

function handleResponseStatus() {
    if (xmlhttp.readyState==4){
        if (xmlhttp.status==200){
            xmlStatusResponse=xmlhttp.responseXML;
            croot=xmlStatusResponse.documentElement;
            cuser=croot.getElementsByTagName("user");
            var cnewData='';

            for(var i=0; i<cuser.length; i++){
                cuData= cuser.item(i).firstChild.data;
                cprintMsg='<pre class="text-muted bg-success">'+cuData+'</pre>';
                cnewData += cprintMsg;
            }
            var onlineDiv = document.getElementById('scroll2');

            if (onlineDiv.innerHTML != cnewData){
                onlineDiv.innerHTML = cnewData;
            }

            cuData='';
            cnewData='';
            cprintMsg='';
            cusr='';
        }
    }   
}

function update(){
    var name= document.getElementById('name').value;
    var mobile= document.getElementById('mobile').value;
    var email= document.getElementById('email').value;
    var password= document.getElementById('pass').value;
    var data= '?name='+name+'&mobile='+mobile+'&email='+email+'&password='+password;
    try {
        xhttp = new XMLHttpRequest();
        if (xhttp){
            if (xhttp.readyState==0 || xhttp.readyState==4){
                xhttp.open("GET", "fetch.php"+data, true);
                xhttp.onreadystatechange=handleResponseUpdate;
                xhttp.send(null);
            }
        }
    }
    catch (e){
        alert("Sorry, something went wrong !");
        console.log(e);
    }
}

function handleResponseUpdate(){
    if (xhttp.responseText == "ok"){
        swal("Yupp !!!", "Information successfully updated !", "success");
    }
    else if (xhttp.responseText == "no") {
        swal("Oops !!!", "Failed to update !", "error");
    }
}
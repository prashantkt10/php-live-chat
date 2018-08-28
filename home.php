<?php
    session_start();
    if (!isset($_SESSION['id'])){
        header("Location: index.php"); /* Redirect browser */
    exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zauba Live Chat</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/3/journal/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="chat_style.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="handle.js"></script>
</head>
<body onload="handle()" style="background-color:grey">
      <!-- Static navbar -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><span class="glyphicon">&#xe021;</span> Zauba Live Chat</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li><a href="edit.php"><span class="glyphicon">&#xe008;</span> Edit Profile</a></li>
                
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  
                  <li><a href="#" onclick="about()"><span class="glyphicon">&#xe086;</span> About</a></li>
                  <li><a href="#" onclick="logout()"><span class="glyphicon">&#xe163;</span> Logout</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
          </nav>

    <div class="container mainCont">

        <div class="row">
            <div class="table-responsive col-xs-12 col-md-9 well bg-active" id="scroll1">
            <table class="table table-condensed">
                <tbody>
                    <tr id="chatData"></tr>
                </tbody>
            </table>
            </div>
            <div class="hidden-xs col-md-3" id="panel">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="color:white; text-align:center">Online Users</div>
                    <div class="panel-body online_status"  id="scroll2" onclick="checkStatus()"></div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer_cont">
        <div class="container">
            <div class="row well">
                <div class="form-group col-xs-12 col-md-9">
                        <textarea required id="newMsg" class="form-control"
                        placeholder="Enter text...." onfocus="validate()" 
                        onkeypress="validate()"></textarea>
                </div>
                <div class="form-group col-xs-12 col-md-3 pull-right btnMain" >
                    <div class="btnCont">
                        <button type="button" id="send" class="form-control btn btn-info" onclick="send()">Send</button>
                        <button type="button" id="clear" class="hidden-xs form-control btn btn-danger" onclick="clearTxt()">Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <audio id="audio">
        <source src="fb.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
    </audio>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        var mainheight = $(window).height() - $(".navbar-inverse").height() - $(".footer_cont").height();
        // alert(mainheight);
        $('.mainCont').attr("height", mainheight);
        $('.mainCont').css("margin-top", $(".navbar-inverse").height()+10);
        // $('#scroll1').attr("height", mainheight-50);
        // console.log($(window).height());
        // console.log($(".navbar-inverse").height());
        $('#newMsg').keypress(function(e){
        if(e.keyCode == 13 && !e.shiftKey) {
        e.preventDefault();
        send();
    }  
    });
    </script>

</body>
</html>
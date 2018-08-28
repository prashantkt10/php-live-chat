<?php
  session_start();
  if (isset($_SESSION['id'])){
      header("Location: home.php"); /* Redirect browser */
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
<body onload="" style="background-color:grey">
      <!-- Static navbar -->
      <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Zauba Live Chat</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#" onclick="about()"><span class="glyphicon">&#xe086;</span> About</a></li>
                </ul>
              </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
          </nav>

    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-md-4 well bg-active" id="login">
              <form>
              <div class="form-group">
                <label for="empID">Employee ID</label>
                <input required type="text" class="form-control" id="loginID" placeholder="Employee ID" name="email">
              </div>
              <div class="form-group">
                <label for="empID">Password</label>
                <input required type="password" class="form-control" id="loginPass" placeholder="***********" name="pass">
              </div>
              <div class="form-group">
                <button onclick="login()" type="button" class="form-control btn btn-success" id="loginUser">Login</button>
        
                <input type="reset" class="form-control btn btn-danger pull-right" id="clearData" value="Reset">
              </div>
            </form>

            </div>
            <div class="col-xs-12 col-md-7 col-md-offset-1 well" id="signup">
              <form>
                    <div class="form-group">
                      <label for="empID">Employee ID</label>
                      <input required type="text" class="form-control" id="empID" placeholder="Employee ID" maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="empID">Name</label>
                        <input required type="text" class="form-control" id="name" placeholder="Ram Kumar" maxlength="50">
                      </div>
                      <div class="form-group">
                        <label for="empID">Mobile No.</label>
                        <input required type="number" class="form-control" id="mobile" placeholder="9987******" maxlength="10">
                      </div>
                      <div class="form-group">
                        <label for="empID">Email ID</label>
                        <input required type="email" class="form-control" id="email" placeholder="abc@xyz.com">
                      </div>
                      <div class="form-group">
                        <label for="empID">Password</label>
                        <input required type="password" class="form-control" id="pass" placeholder="***********">
                      </div>
                      <div class="form-group">
                        <button type="button" onclick="register()" class="form-control btn btn-success" id="submit" value="Register Me">Register Me
                        </button>

                        <input type="reset" class="form-control btn btn-danger pull-right" id="clear" value="Clear Data">
                      </div>
                    </form>
            </div>
        </div>

    </div>

</body>
</html>
<?php
session_start();
$userNM=$_SESSION['user'];
?>
<!DOCTYPE>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Larry's Laptop Land</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-color:grey;" onload="checkAccessSecure()">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button id="mobileButton" type="button" class="navbar-toggle collapsed"
          data-toggle="collapse" data-target="#nav-link" aria-expanded="false"
          aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Larry's Laptop Land</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="nav-link">
          <ul class="nav navbar-nav">
            <li><a href="catalog">Catalog</a></li>
            <li><a href="survey">Survey</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="userPage"><a href='userPage.php'><?php echo $userNM;?></a></li>
            <li id="logoutIndicator"><a data-toggle="modal" data-target="#logout">Logout</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
              <button id="displayButton"class="btn btn-default" data-toggle="modal" onclick="displayUserResults();">Survey Results</button>

            </div>
            <div class="btn-group" role="group">
              <button id="pastResultsButton"class="btn btn-default" data-toggle="modal" onclick="pastSurveys();">Past Survey Results</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!Login Popup>
    <div class="container">
      <div class="modal" data-backdrop="static"
       data-keyboard="false" role="dialog" id="login" aria-labelledby="User Sign In"
      aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">You must be logged in to visit this page!</h4>
            </div>
            <form id="loginForm" method="POST" onsubmit="return formLoginSubmit();">
              <div class="modal-body">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username"
                  placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password"
                  placeholder="Enter your password" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"
                data-toggle="modal" data-target="#signup">Sign Up</button>
                <button type="submit" class="btn btn-primary">Sign In</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!SignUp Popup>
    <div class="container">
      <div class="modal" data-backdrop="static"
       data-keyboard="false" role="dialog" id="signup" aria-labelledby="user sign up"
      aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registration</h4>
            </div>
              <form  id="signupForm" method="POST" onsubmit="return formSignupSubmit();">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email"
                    placeholder="Enter your email" required>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" name="username"
                    placeholder="Enter Username" required>
                  </div>
                  <div id="passwordDiv"class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="pword" class="form-control"
                    name="password" placeholder="Enter your password" required>
                  </div>
                  <div id="confirmPword"class="form-group">
                    <label for="password">Confirm your password</label>
                    <input type="password" id="conPword" onchange="confirmPword()"
                     class="form-control" name="conPassword"
                     placeholder="Confirm your password" required>
                  </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>

    <!LOGOUT>
    <div class="container">
      <div class="modal" id="logout" role="dialog" aria-labelledby="user_logout"aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"
              aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Logout</h4>
            </div>
            <div class="modal-body">
              <h3>Are you sure you wish to log out?</h3>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" value="No"
              data-dismiss="modal">No</button>
              <button id="logoutbtn" type="button" class="btn btn-primary" onclick="logout();">Yes</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!SURVEYRESULTS>
    <div class="container-fluid">
      <div class="modal" id="userSurveyResults" role="dialog" aria-labelledby="userSurveyResults"aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"
              aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Your Survey Results!</h4>
            </div>
            <div class="modal-body">
              <div id="theActualResults">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!PASTSURVEY>
    <div class="container-fluid">
      <div class="modal" id="pastSurveyResults" role="dialog" aria-labelledby="pastSurveyResults"aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"
              aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Your Past Survey Results</h4>
            </div>
            <div class="modal-body">
              <div id="pastResults">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="homeMade.js"></script>
    <script type="text/javascript">
    function displayUserResults(){
      $.ajax({
        url: "php/displayUserResults.php",
        success: function(html){
          $('#userSurveyResults').modal('toggle');
          $('#theActualResults').html(html);
        }
      });
    }
    function pastSurveys(){
      $.ajax({
        url: "php/displayPastResults.php",
        success:function(html){
          $('#pastSurveyResults').modal('toggle');
          $('#pastResults').html(html);
        }
      })
    }
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
</html>

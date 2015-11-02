 function checkAdmin(){
  $(document).ready(function(){
    $.ajax({
      url: "php/adminSecure.php",
      success:function(result){
        if(result!="valid"){
          window.location = "index.html";
          alert("Access restricted!");
        }
      }
    });
  });
}

function checkAccess(){
  $(document).ready(function(){
    $.ajax({
      url:"php/userControl.php",
      success:function(result){
        if(result=="user"){
          $('#loginIndicator').hide();
          $('#logoutIndicator').show();
          $('#adminPage').hide();
        }else if(result=="admin"){
          $('#loginIndicator').hide();
          $('#userPage').hide();
          $('#logoutIndicator').show();
        }else{
          $('#logoutIndicator').hide();
          $('#adminPage').hide();
        }
      }
    });
  });
}
function checkAccessSecure(){
  $(document).ready(function(){
    $.ajax({
      url:"php/userControl.php",
      success:function(result){
        if(result=="user"){
          $('#loginIndicator').hide();
          $('#logoutIndicator').show();
          $('#adminPage').hide();
        }else if(result=="admin"){
          $('#loginIndicator').hide();
          $('#userPage').hide();
          $('#adminPage').show();
          $('#logoutIndicator').show();
        }else{
          $('#login').modal('show');
        }
      }
    });
  });
}

function formLoginSubmit(){ //submit form through ajax
  $(document).ready(function(){
    request=$.ajax({
      url:"php/ajax_login.php",
      type:'post',
      data: $("#loginForm").serialize(),
      success:function(result){
        if(/^Error/.test(result)){ //if an error happened tell the user and clear the form data
          $('#loginForm').trigger("reset");
          alert(result);
        }else{ // no issue occurred then hide the login modal, resent the form, and change the login link to my page link
          $('#login').modal('hide');
          $('#login').trigger('reset');
          $('#loginIndicator').hide();
          $('#logoutIndicator').show();
          if(result=="1"){
            alert("User Signed In");
          }
          if(result=="2"){
            $('#userPage').hide();
            $('#adminPage').show();
            alert("Admin Signed In");
          }
        }
      }
    });
    request.fail(function (jqXHR, textStatus, errorThrown){//to check for errors with js or php
    // Log the error to the console
      console.error(
      "The following error occurred: "+
      textStatus, errorThrown
      );
    });
  });
  return false;
}
function formSignupSubmit(){  //form submit stuff.  works the same as login
  $(document).ready(function(){
    request=$.ajax({
      url:"php/ajax_signup.php",
      type:'post',
      data: $("#signupForm").serialize(),
      success:function(result){
        if(/^Error/.test(result)){
          $('#signupForm').trigger("reset");
          $('#confirmPword').removeClass("has-success");
          $('#passwordDiv').removeClass("has-success");
          alert(result);

        } else{
          $('#signup').modal('hide');
          $('#signupForm').trigger("reset");
          $('#loginIndicator').hide();
          $('#logoutIndicator').show();
          alert(result);
        }
      }
    });
    request.fail(function (jqXHR, textStatus, errorThrown){
    // Log the error to the console
      console.error(
      "The following error occurred: "+
      textStatus, errorThrown
      );
    });
  });
  return false;
  }

  function confirmPword(){ //check to make sure passwords are the same when signing up
    $(document).ready(function(){
      if($('#conPword').val()!=$('#pword').val()){
        $('#confirmPword').addClass("has-error");
        $('#passwordDiv').addClass("has-error");
      }else{
        $('#confirmPword').addClass("has-success");
        $('#passwordDiv').addClass("has-success");
      }
    });
  }

  function logout(){
    $(document).ready(function(){ //only used on userPage and called when logout button is clicked
      request=$.ajax({
        url: "php/logout.php",    // clears the session variables and possibly semi logs out
        success: function(result){
          $('#logout').hide();
          alert("You have been logged out!");
          window.location = "index.html";
        }
      });
      request.fail(function (jqXHR, textStatus, errorThrown){
      // Log the error to the console
        console.error(
        "The following error occurred: "+
        textStatus, errorThrown
        );
      });
    });
  }
  /*
  function submitSurvey(){
    $.ajax({
      url:"submit_survey.php",
      data:$('#surveyForm').serialize(),
      success: function(result){
        alert("Survey Submitted");
      }
    });
  }
  function displayUserResults(){
    $('#userSurveyResults').modal('toggle');
    $.ajax({
      url: "php/displayUserResults.php",
      success: function(html){
        $('#theActualResults').html(html);
      }
    });
  }
*/

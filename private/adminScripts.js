function checkAdmin(){
 $(document).ready(function(){
   $.ajax({
     url: "../php/adminSecure.php",
     success:function(result){
       if(result!="valid"){
         window.location = "../index.html";
         alert("Access restricted!");
       }
     }
   });
 });
}

function logout(){
  $(document).ready(function(){ //only used on userPage and called when logout button is clicked
    request=$.ajax({
      url: "../php/logout.php",    // clears the session variables and possibly semi logs out
      success: function(result){
        $('#logout').hide();
        alert("You have been logged out!");
        window.location = "../index.html";
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

function getSurveyResults(){
  $.ajax({
    url: "adminSurveyResult.php",
    dataType: "html",
    success: function(html){
      $('#resultsByType').html(html);
    },
    error:function(result){
      alert(result);
    }
  });
}

function getSurveyAndSales(){
  $.ajax({
    url: "salesVSSurvey.php",
    dataType: "html",
    success: function(html){
      $('#salesAndSurvey').html(html);
    },
    error:function(result){
      alert(result);
    }
  });
}

function displayQuestionsYes(){
    $.ajax({
      url:"questionsInUse.php",
      success:function(result){
        $('#questionsInUse').html(result);
      }
    });
}
function displayQuestionsNo(){
    $.ajax({
      url:"questionsNotInUse.php",
      success: function(results){
        $('#questionsNotInUse').html(results);
      }
    });
}

function surveyQuestionChange(){
  //have two ajax request made, through one submit button
  $(document).ready(function(){
    request = $.ajax({
      url:"changeSurveyQuestions.php",
      data: $('#modifySurvey').serialize(),
      type:'get',
      success: function(){
        alert('Questions Changed');
        window.location = "../adminPage";
        }
    });
    request.fail(function (jqXHR, textStatus, errorThrown){
    // Log the error to the console
      console.error(
      "The following error occurred: "+
      textStatus, errorThrown
      );
    })
  });
  return false;
}

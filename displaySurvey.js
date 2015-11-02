function displaySurvey(){
	$.ajax({
	url:"survey.php",
	    success: function(html){
	      $('#surveyDisplay').append(html);
	    }
	});
}
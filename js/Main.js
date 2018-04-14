jQuery(document).ready(function(e){

	$('.message a').click(function(){
	   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
	});


	submitForms = function(){
	    
	    document.getElementById("form2").submit();
	}
});
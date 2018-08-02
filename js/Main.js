jQuery(document).ready(function(e){

	$('.message a').click(function(){
	   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
	});


	submitForms = function(){	    
	    document.getElementById("form2").submit();
	}

	$('#accionar').click(function(){		  
		  $('#tablainformativa').toggle();		  
		});

	$('.boton').on('click',function(){
		  $('.datos:visible').slideToggle('fast');
		  $('.datos#Info'+$(this).attr('id')).slideToggle('fast');
		})
	

});
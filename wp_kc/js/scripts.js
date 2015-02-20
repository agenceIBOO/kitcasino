(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';

		$('#nav-jeux ul li a').click(function(event) {
  		event.preventDefault();

  		$('#jeux-content>div').css('display','none');
  		var selected = $(this).attr('href');
  		$(selected).css('display', 'block');


	    /*$('div.wrapper').css('display', 'block');var selected = $(this).attr("href");
	    $(selected).css('display', 'block');
	    

	    if($(this).href() == $('#jeux-content div').id){

	    }*/
  		});



  		$('header .nav ul li a img').mouseover(
		    function() {
		      var src = $(this).attr('src');
		      var newsrc = src.replace('_off.png', '_on.png');
		      $(this).attr('src', newsrc);
		  });

		  $('header .nav ul li a img').mouseout(
		    function() {
		      var src = $(this).attr('src');
		      var newsrc = src.replace('_on.png', '_off.png');
		      $(this).attr('src', newsrc);
		    });
		// DOM ready, take it away
		
	});




	
})(jQuery, this);

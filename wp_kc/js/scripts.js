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

		var color = $('#nav-jeux ul li a').css('color');
		$('#nav-jeux ul li a').mouseover(function(){
				$(this).css('color','#ffb142');
			});

		$('#nav-jeux ul li a').mouseout(function(){
				$(this).css('color',color);
			});


		var checkboxes = $("input[type='checkbox']");
   	 	var submitButt = $("input[type='submit']");

   	 	var cptCheckbox = 0;
		checkboxes.click(function() {
    		if ($(this).is(":checked")){
    			cptCheckbox++;
    		}
    		else {
    			cptCheckbox--;
    		}

    		if (cptCheckbox >=2){
    			submitButt.removeAttr("disabled");
    		}
    		else {
    			submitButt.attr("disabled", "disabled");
    		}
		});

		var prependOk = true;


		$('#nonSelected li').click(function(){
			if (prependOk){
				if ($(this).parents('#nonSelected').length) {
					$(this).prependTo('#selected');	

					var newsrc = $(this).find('img').attr('src');
					newsrc = newsrc.replace('.png', '-checked.png');
					$(this).find('img').attr('src', newsrc);		
				}
				else {
					$(this).prependTo('#nonSelectedUl');

					var oldsrc = $(this).find('img').attr('src');
					oldsrc = oldsrc.replace('-checked.png', '.png');
					$(this).find('img').attr('src', oldsrc);
				}
				prependOk = false;
				setTimeout(function(){
					prependOk = true;
				}, 200);
			}
		});

		$('#nonSelected ul li').mouseover(function(){
			$(this).find('p').css('color', 'orange');
		});

		$('#nonSelected ul li').mouseout(function(){
			$(this).find('p').css('color', 'white');
		});

		$('#selected ul li').mouseover(function(){
			$(this).find('p').css('color', 'orange');
		});

		$('#selected ul li').mouseout(function(){
			$(this).find('p').css('color', 'white');
		});



		

		

		



		
	});




	
})(jQuery, this);

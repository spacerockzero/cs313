$(window).load(function() {

	// $('.hero-unit img').fadeIn();
	// $('.well').slideDown();
	// $('.nav-collapse li a')

	//header contact icons animation
   $(".nav-collapse li a").hover(
	  function () {
	    $(this).animate({
	    opacity: 1,
	    top: '-5px'
	  },{queue:false,duration:200});
	  },
	  function () {
	    $(this).animate({
	    opacity: 0.7,
	    top: '0px'
	  },{queue:false,duration:200});
	  }
	);

});
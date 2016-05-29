(function($){
  $(document).ready( function() {

    var rWidth = 976;

    $(".flexslider").flexslider({
		 animation:"slide",
		 slideshowSpeed:5000,
		 animationSpeed:750 
		});

    $(".accordion").accordion({heightStyle:'content'});

		$("#front-product-list").accordion('option', 'heightStyle', 'content');
		$("#front-product-list").accordion('option', 'collapsible', true);
		$("#front-product-list").accordion('option', 'active', false);

    if ( $(window).width() < rWidth ) {
      $("#sidebar-first div.block").addClass('collapsed');
    }

    $(window).resize( function() {
    if ( $(window).width() < rWidth ) {
      $("#sidebar-first div.block").addClass('collapsed')
		 .removeClass('expanded').find("div.content").hide();
    } else {
      $("#sidebar-first div.block").addClass('expanded')
       .removeClass('collapsed').find("div.content").show();
	 }
	 });

    $("#sidebar-first div.block h2").on("click", function(e) {
      if ( $(window).width() < rWidth ) {
        $(this).parent().find("div.content").slideToggle();
        $(this).parent().toggleClass('collapsed').toggleClass('expanded');
      }
    });

  });
})(window.jQuery);

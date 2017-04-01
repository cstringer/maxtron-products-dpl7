(function($){
    $(document).ready( function() {

        var rWidth = 976,
            currWidth = $(window).width();

        $(".flexslider").flexslider({
            animation:"slide",
            slideshowSpeed:5000,
            animationSpeed:750 
        });

        $(".accordion").accordion({
            heightStyle:'content',
            collapsible:true,
            active:false
        });

        if ( $(window).width() < rWidth ) {
            $("#sidebar-first div.block").addClass('collapsed');
        }

        $(window).resize( function() {
            if ($(window).width() != currWidth) {
                currWidth = $(window).width();
                if (currWidth < rWidth ) {
                    $("#sidebar-first div.block").addClass('collapsed')
                        .removeClass('expanded').find("div.content").hide();
                } else {
                    $("#sidebar-first div.block").addClass('expanded')
                        .removeClass('collapsed').find("div.content").show();
                }
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

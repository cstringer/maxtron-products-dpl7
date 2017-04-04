(function($){
    $(document).ready(function() {
        var rWidth = 976,
            currWidth = $(window).width(),
            sels = {
                accordion: '.accordion',
                slider: '.flexsider',
                sidebar: '#sidebar-first div.block',
                content: 'div.content'
            },
            cls = {
                expanded: 'expanded',
                collapsed: 'collapsed'
            };

        $(sels.slider).flexslider({
            animation: 'slide',
            slideshowSpeed: 5000,
            animationSpeed: 750 
        });

        $(sels.accordion).accordion({
            heightStyle: 'content',
            collapsible: true,
            active: false
        });

        if ( $(window).width() < rWidth ) {
            $(sels.sidebar).addClass(cls.collapsed);
        }

        $(window).on('resize', function() {
            if ($(window).width() !== currWidth) {
                currWidth = $(window).width();
                if (currWidth < rWidth ) {
                    $(sels.sidebar).addClass(cls.collapsed)
                                   .removeClass(cls.expanded)
                                   .find(sels.content)
                                   .hide();
                } else {
                    $(sels.sidebar).addClass(cls.expanded)
                                   .removeClass(cls.collapsed)
                                   .find(sels.content)
                                   .show();
                }
            }
        });

        $(sels.sidebar).on('click', 'h2', function(e) {
            if ($(window).width() < rWidth) {
                $(this).parent().toggleClass(cls.collapsed)
                                .toggleClass(cls.expanded)
                                .find(sels.content)
                                .slideToggle();
            }
        });

    });
})(window.jQuery);

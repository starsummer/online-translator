function init(){
    height = parseInt($(window).height()) - 160;
    $('#content').MyPagination({height: 1200, fadeSpeed: 400});    
}

(function($) {
    $.fn.extend({
        MyPagination: function(options) {
            var defaults = {
                width: 800,
                height: 400,
                fadeSpeed: 400
            };
            var options = $.extend(defaults, options);

            var $content = $(this);

            var fontSize = 16;
            var lineHeight=25;

            //set content height

            var scrollHeight;
            var lastPage;
            var cPage = 1;
            setContent = function() {
                $content.removeAttr("style");
                $content.css("font-size",fontSize);
                $content.css("line-height",lineHeight+"px");
                scrollHeight = $content.innerHeight();
                lastPage = Math.ceil(scrollHeight / options.height);
                $content.css("height", options.height);
                _setColumnWidth(options.width);
               _setColumnGap("100px");
            };

            _setColumnWidth = function(width) {
                $content.css("column-width", width);
                $content.css("-moz-column-width", width);
                $content.css("-webkit-column-width", width);
            };

            _setColumnGap = function(gap) {
                $content.css("column-gap", gap);
                $content.css("-moz-column-gap", gap);
                $content.css("-webkit-column-gap", gap);
            };

            showPage = function(page) {
                page = page > 1 ? page : 1;
                page = page >= lastPage ? lastPage : page;
                cPage = page;

                $content.animate({
                    scrollLeft: (page - 1) * (options.width+100)
                }, options.fadeSpeed);

                $("#cPage").html(cPage + '/' + lastPage);
            };

            setContent();
            showPage(1);

            // and binding 2 events - on clicking to Prev
            // $('.pagination #prev').mousedown(function() {
            //     showPage(cPage - 1);
            // });

            $(document).keyup(function(e) {
                var key = e.which;
                if (key === 37 || key === 38) {
                    showPage(cPage - 1);
                } else if (key === 39 || key === 40) {
                    showPage(cPage + 1);
                }
            });
            $('#to-prev').click(function(e){
                showPage(cPage - 1);
            })

            $('#to-next').click(function(e){
                showPage(cPage + 1);
            })
            // and Next
            // $('.pagination #next').mousedown(function() {
            //     showPage(cPage + 1);
            // });

            $("#fontsize").change(function() {
                fontSize = $(this).val();
                $content.css("font-size", fontSize);
                setContent();
                showPage(cPage);
            });


        }
    });
})(jQuery);



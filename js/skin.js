(function($){
    "use strict";
    $('#feedback').click(function(){
        $('html, body').animate(
            {scrollTop: $("#comments").offset().top}
        );
    });

    // 返回顶部
    var backtop = $("span#backtop");
    backtop.click(function(){
        $('html, body').animate(
            {scrollTop: 0},600
        );
    });

    // 显示返回顶部按钮
    if($(window).scrollTop() > 100){
        backtop.addClass('show')
    }
    $(window).scroll(function(){
        if($(window).scrollTop() > 100){
            backtop.addClass('show')
        }else{
            backtop.removeClass('show')
        }
    });

    var mouseAtX = 0;
    $(document).ready(function(){
        if('undefined' == typeof (IS_MOBILE)){
            return false;
        }
        if(window.innerWidth < 888){
            makeMenuHeadroom();
        }

        $('#toggle-nav').click(function(e){
            $("#wrap").removeClass("scale-up");
            $('#wrap').toggleClass('display-nav');
            $('#footer').toggleClass('display-nav');
            $('#toggle-nav').removeClass('hide');
            $('#wrap #body').off('click');
            var body = $('#wrap.display-nav #body');
            body.off('click');
            body.on('click', function(e){
                body.off('click');
                $('#wrap').removeClass('display-nav');
                $('#footer').removeClass('display-nav');
                e.preventDefault();
            });
            $('#body').off('touchmove').on('touchmove', function(e){
                body.off('click');
                $('#wrap').removeClass('display-nav');
                $('#footer').removeClass('display-nav');
            });
        });
        $(window).bind("scroll", function(e){
            scalePage(e);
        });
        $(window).bind("mousemove", function(e){
            mouseAtX = e.clientX;
        });
        $('.slide-toggle').click(function(e){
            $('.category-list').each(function(){
                $(this).toggleClass('hide');
            });
        });

    });
    var hasTouchMove = false;
    if ("touchmove" in document.createElement("div")){
        hasTouchMove = true;
    }

    var makeMenuHeadroom = function(){
        var header = new Headroom(document.querySelector("#toggle-nav"), {
            tolerance: 5,
            offset : 5,
            classes: {
                initial: "show",
                pinned: "show",
                unpinned: "hide"
            }
        });
        header.init();
    };

    var scalePage = function(e){
        var wrap = $("#wrap");
        var nav = $("#wrap #nav");
        if (nav.width() < mouseAtX) {
            if ((IS_MOBILE && hasTouchMove) || !IS_MOBILE){
                $('#wrap.display-nav #body').unbind('click');
                wrap.removeClass('display-nav');
                $('#footer').removeClass('display-nav');
            }
        }
    };
})(jQuery);
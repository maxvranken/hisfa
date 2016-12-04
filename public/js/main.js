var menu = false;
var scrollTimeout = false;

$(function(){
    $('.nav_button').click(function(){
        if(!menu) {
            menu = true;
            if (document.documentElement.clientWidth > 481) {
                $('main').css('left', '-300px');
                $('main').css('pointerEvents', 'none');
                $('header').css('left', '-300px');
                $('nav').css('left', 'calc(100% - 300px)');
            }else{
                $('main').css('left', 'calc(-100% + 80px)');
                $('main').css('pointerEvents', 'none');
                $('header').css('left', 'calc(-100% + 80px)');
                $('nav').css('left', '80px');
            }
        }else {
            menu = false;
            $('main').css('left', '0');
            $('main').css('pointerEvents', 'auto');
            $('header').css('left', '0');
            $('nav').css('left', '100%')
        }
    });

    $('.nav_button').click(function () {
        $(this).toggleClass('open');
    });

    $("section.foam_stock .scroll").scroll(function(){
        $("section.foam_stock .blocks")
            .scrollLeft($("section.foam_stock .scroll").scrollLeft());
    });
    $("section.foam_stock .blocks").scroll(function(){
        $("section.foam_stock .scroll")
            .scrollLeft($("section.foam_stock .blocks").scrollLeft());
    });

    if ($("section.foam_stock .blocks").length !== 0) {
        var scroll_width = document.getElementById('blocks').scrollWidth;
        $('section.foam_stock .scroll span').css('width', scroll_width);
        setTimeout(function () {
            var scroll_width = document.getElementById('blocks').scrollWidth;
            $('section.foam_stock .scroll span').css('width', scroll_width);
        }, 150);
    };

    $('input,textarea').focus(function(){
        $(this).data('placeholder',$(this).attr('placeholder'))
            .attr('placeholder','');
    }).blur(function(){
        $(this).attr('placeholder',$(this).data('placeholder'));
    });

    $( window ).resize(function() {
        if(parseInt($('main').css('left')) == 0){
            menu = false;
            $('.nav_button').removeClass('open');
        }

        $('nav').css('transition', 'none');
        $('header').css('transition', 'none');
        $('main').css('transition', 'none');

        clearTimeout(scrollTimeout);

        scrollTimeout = setTimeout(function () {
            $('nav').css('transition', 'left 1s ease-out');
            $('header').css('transition', 'left 1s ease-out');
            $('main').css('transition', 'left 1s ease-out');
        }, 500);

        if(document.documentElement.clientWidth < 1350){
            $('nav').css('width', '300px');
            $('nav').css('width', '400px');
            $('main').css('left', '0');
            $('main').css('pointerEvents', 'auto');
            $('header').css('left', '0');
            $('nav').css('left', '100%');
        }else{
            $('nav').css('left', 'calc(100% - 400px)');
            $('main').css('left', '0');
        }

        if ($("section.foam_stock .blocks").length !== 0) {
            var scroll_width = document.getElementById('blocks').scrollWidth;
            $('section.foam_stock .scroll span').css('width', scroll_width);
        };
    });

    $('.show_drop').click(function(){
        if($('.drop').css('display') == 'none') {
            $('.drop').css('opacity', 0).slideDown().animate({ opacity: 1 }, { queue: false} );
        }else{
            $('.drop').css('display', 'none');
        }
    });

    $('.drop li').click(function(){
        $('.drop').css('display', 'none');
        var name = $(this).text();
        $('.selected').text(name);
        var id = $(this).val();
        materialAjax(id);
    });

    $('.focus .drop li').click(function(){
        $('.drop').css('display', 'none');
        var id = $(this).val();
        window.location.replace("/foam/" + id);
    });
});

function materialAjax(id){
    $.get('/blocks' , { id: id})
        .done(function( response ) {
            $(".blocks li").remove();
            for (var x = 0; x < response.length; x++) {
                $('.blocks').append("<li><p class='name'>" + response[x].length + "<span>m</span></p>" +
                        "<div><p><span><span>x</span>" + response[x].quantity + "</span> " +
                        "<span>" + (1.03 * 1.29 * response[x].length * response[x].quantity).toFixed(1) + "m³</span>" +
                    "</p></div></li>");
            }
            if ($("section.foam_stock .blocks").length !== 0) {
                var scroll_width = document.getElementById('blocks').scrollWidth;
                $('section.foam_stock .scroll span').css('width', scroll_width);
            };
        });
}

function permissions(id){
    window.location.replace("/permissions/" + id);
};
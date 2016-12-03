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

    /////////////////////////////////////

    if(!$('section.foam_stock .scroll').is(':visible')){
        $('.dashboard  .material_data').css('cursor', 'initial');
        $('.dashboard  .number_stock').css('height', '76px');
        $('.dashboard  .number_stock').css('line-height', '80px');
        $('.dashboard  .volume_stock').css('line-height', '0px');
    };

    $('input,textarea').focus(function(){
        $(this).data('placeholder',$(this).attr('placeholder'))
            .attr('placeholder','');
    }).blur(function(){
        $(this).attr('placeholder',$(this).data('placeholder'));
    });
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
    }

    /////////////////////////////////////

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

function materialAjax(id){
    $('.material_loader').css('opacity', '1');
    $('.material_loader').css('z-index', '1');
    $('.material_loader').css('display', 'block');
    $.get('/blocks' , { id: id})
        .done(function( response ) {
            $(".stock_container .stock").remove();
            $(".length_container .length").remove();
            for (var x = 0; x < response.length; x++) {
                $('.length_container').append("<div class='length' id='length" + x + 1 + "'>" +
                    "<div class='mtrl_length'>" + response[x].length + "m</div></div>");

                $('.stock_container').append("<div class='stock' id='stock" + x + 1 + "'><div class='number_stock'>" +
                    "<span class='number'>" + response[x].quantity + "</span><span class='st'>st</span></div>" +
                    "<div class='volume_stock'><span class='number'>" +
                    (1.03 * 1.29 * response[x].length * response[x].quantity).toFixed(1) +
                    "</span><span class='m3'>m³</span></div></div>");
            }
            if(response.length == 0){
                $('.material_fill').css('display', 'block');
            }else{
                $('.material_fill').css('display', 'none');
            }
            $('.material_loader').css('display', 'none');

            if(response.length > 4) {
                var scroll_width = document.getElementById('material_data').scrollWidth;
                $('.dashboard .material_scroll').css('display', 'block');
                $('.dashboard .material_scroll div').css('width', scroll_width);
                $('.dashboard .material_data').css('cursor', '-webkit-grab');
                $('.dashboard .number_stock').css('height', '54px');
                $('.dashboard .number_stock').css('line-height', '70px');
                $('.dashboard .volume_stock').css('line-height', '20px');
            }else{
                $('.dashboard .material_scroll').css('display', 'none');
                $('.dashboard .material_data').css('cursor', 'initial');
                $('.dashboard .number_stock').css('height', '76px');
                $('.dashboard .number_stock').css('line-height', '80px');
                $('.dashboard .volume_stock').css('line-height', '0px');
            }
        });
}

function permissions(id){
    window.location.replace("/permissions/" + id);
};
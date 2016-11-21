$(function(){
    if(!$('.dashboard .material_scroll').is(":visible")){
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

    $(".dashboard  .material_scroll").scroll(function(){
        $(".dashboard  .material_data")
            .scrollLeft($(".dashboard  .material_scroll").scrollLeft());
    });
    $(".dashboard  .material_data").scroll(function(){
        $(".dashboard  .material_scroll")
            .scrollLeft($(".dashboard  .material_data").scrollLeft());
    });

    if ($("#material_data").length !== 0) {
        var scroll_width = document.getElementById('material_data').scrollWidth;
        $('.material_scroll div').css('width', scroll_width);
        setTimeout(function () {
            var scroll_width = document.getElementById('material_data').scrollWidth;
            $('.dashboard  .material_scroll div').css('width', scroll_width);
        }, 150);
    };
});

$( window ).resize(function() {
    if ($("#material_data").length !== 0) {
    var scroll_width = document.getElementById('material_data').scrollWidth;
    $('.dashboard  .material_scroll div').css('width', scroll_width);
    };
});

$('.show_drop').click(function(){
    if($('.drop').css('display') == 'none') {
        $('.drop').css('opacity', 0).slideDown().animate({ opacity: 1 }, { queue: false} );
    }else{
        $('.drop').css('display', 'none');
    }
});

$('.dashboard .drop li').click(function(){
    $('.drop').css('display', 'none');
    var name = $(this).text();
    $('.selected_foamtype').text(name);
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
}

$('.permission_edit').change(function(){
    $('#permissions_form').submit();
});

/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("menu").style.width = "300px";
    document.getElementById("menu").style.display = "block";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("menu").style.width = "0";
    document.getElementById("menu").style.display = "none";
}
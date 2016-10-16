$(function(){
    var scroll_width = document.getElementById('material_data').scrollWidth;
    $('.material_scroll div').css('width', scroll_width);

    $(".material_scroll").scroll(function(){
        $(".material_data")
            .scrollLeft($(".material_scroll").scrollLeft());
    });
    $(".material_data").scroll(function(){
        $(".material_scroll")
            .scrollLeft($(".material_data").scrollLeft());
    });
    setTimeout( function(){
        var scroll_width = document.getElementById('material_data').scrollWidth;
        $('.material_scroll div').css('width', scroll_width);
    }  , 50 );
});

$( window ).resize(function() {
    var scroll_width = document.getElementById('material_data').scrollWidth;
    $('.material_scroll div').css('width', scroll_width);
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
    $('.selected_foamtype').text(name);
    var id = $(this).val();
    materialAjax(id);
});

function materialAjax(id){
    $('.material_loader').css('opacity', '1');
    $('.material_loader').css('z-index', '1');
    $('.material_loader').css('display', 'block');
    $.get('/blocks' , { id: id})
        .done(function( response ) {
            $( ".stock_container .stock" ).remove();
            $( ".length_container .length" ).remove();
            for (var x = 0; x < response.length; x++) {

                $('.length_container').append("<div class='length' id='length" + x+1 + "'>" +
                "<div class='mtrl_length'>" + response[x].length + "m</div></div>");

                $('.stock_container').append("<div class='stock' id='stock"+ x+1 + "'><div class='number_stock'>" +
                "<span class='number'>" + response[x].quantity +"</span><span class='st'>st</span></div>" +
                "<div class='volume_stock'><span class='number'>" +
                (1.03 * 1.29 * response[x].length * response[x].quantity).toFixed(1) +
                "</span><span class='m3'>m³</span></div></div>");

            }
            $('.material_loader').css('display', 'none');
            var scroll_width = document.getElementById('material_data').scrollWidth;
            $('.material_scroll div').css('width', scroll_width);
        });
}
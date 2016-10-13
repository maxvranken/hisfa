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
        .done(function( response ){
            $('#length1 div').text(response[0].length + 'm');
            $('#length2 div').text(response[1].length + 'm');
            $('#length3 div').text(response[2].length + 'm');
            $('#length4 div').text(response[3].length + 'm');

            $('#stock1 div:first-child .number').text(response[0].quantity );
            $('#stock2 div:first-child .number').text(response[1].quantity );
            $('#stock3 div:first-child .number').text(response[2].quantity );
            $('#stock4 div:first-child .number').text(response[3].quantity );

            $('#stock1 div:last-child .number').text( Math.round(1.03 * 1.29 * response[0].length * response[0].quantity * 10) / 10 );
            $('#stock2 div:last-child .number').text( Math.round(1.03 * 1.29 * response[1].length * response[1].quantity * 10) / 10 );
            $('#stock3 div:last-child .number').text( Math.round(1.03 * 1.29 * response[2].length * response[2].quantity * 10) / 10 );
            $('#stock4 div:last-child .number').text( Math.round(1.03 * 1.29 * response[3].length * response[3].quantity *  10) / 10 );

            $('.material_loader').css('display', 'none');
        });
}
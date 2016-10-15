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
            var amount = 0;
            var mass = 0;
            for (var x = 0; x < response.length; x++) {
                if (response[x].length === 4) {
                    $('#stock1 div:first-child .number').text(response[x].quantity);
                    $('#stock1 div:last-child .number').text( (1.03 * 1.29 * response[x].length * response[x].quantity).toFixed(1) );
                } else if(response[x].length === 6){
                    $('#stock2 div:first-child .number').text(response[x].quantity);
                    $('#stock2 div:last-child .number').text( (1.03 * 1.29 * response[x].length * response[x].quantity).toFixed(1) );
                } else if (response[x].length === 8){
                    $('#stock3 div:first-child .number').text(response[x].quantity);
                    $('#stock3 div:last-child .number').text( (1.03 * 1.29 * response[x].length * response[x].quantity).toFixed(1) );
                } else{
                    amount += response[x].quantity;
                    mass += 1.03 * 1.29 * response[x].length * response[x].quantity;
                }
            }
            $('#stock4 div:first-child .number').text( amount );
            $('#stock4 div:last-child .number').text( mass.toFixed(1) );
            $('.material_loader').css('display', 'none');
        });
}
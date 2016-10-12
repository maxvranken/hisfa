$(function () {
    materialDisplay();
})

$('.material_form').change(function(){
    materialDisplay();
});

function materialDisplay(){
    var material = $( '.material_form option:selected' ).text();
    $('.selected_foamtype').text(material);

    $.get('/foam/5', { material: material})
        .done(function( response ){
            console.log( response);
            //alert(response.name)
        });
}
$(function () {
    $(document).on('click','.remove-item',function (){
        removeFromShoppingCart($(this))
    });


})


function removeFromShoppingCart(element)
{
    element.attr('disabled', true)
    let url = element.attr('data-action');


    $.ajax({
        url,
        type: 'delete',
    })
     .done(res => {
         element.closest('.product-card').remove();
         reloadInvoice()
     })
     .fail(res => {
         element.attr('disabled', false)
     })
     .always(() => {
     })

}

function reloadInvoice()
{
    $("#invoice").load("/shopping-cart-details");
}



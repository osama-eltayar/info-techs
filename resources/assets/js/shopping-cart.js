$(function () {
    $(document).on('click','.remove-item',function (){
        removeFromShoppingCart($(this))
    });

    $(document).on('click','.checkout-btn',function (){
        checkout($(this));
    })


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

function checkout(element)
{
    element.attr('disabled',false)
    let url = element.attr('data-url')
    $.ajax({
        url,
        type: 'post',
    })
     .done(res => {
         $('#payment-form').html(res)

     })
     .fail(res => {
         element.attr('disabled', false)
     })
     .always(() => {
     })
}



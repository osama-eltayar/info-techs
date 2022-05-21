$(function () {
    $(document).on('click','.remove-item',function (){
        removeFromShoppingCart($(this))
    });

    $(document).on('click','.checkout-btn',function (){
        checkout($(this));
    })

    $(document).on('click','.btn-default',function (){
        applyDiscount($(this), $('#copouns').val(), $('.message.faild'), $('.message.success'));
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
        cache:true
    })
     .done(res => {
         $.ajaxSetup({cache:true});
         $('#payment-form').html(res)
     })
     .fail(res => {
         element.attr('disabled', false)
     })
     .always(() => {
     })
}

function applyDiscount(element, code, failedSpan, successSpan) {
    element.attr('disabled', true);
    let url = element.attr('data-url');

    $.ajax({
        url,
        type: 'post',
        cache: true,
        data: {
            code: code
        }
    })
    .done(res => {
        $('.product-card').each((i, item) => {
            if ($(item).find('input[name="id"]').val() == res.discount_user.shopping_cart_id) {
                let subtotal = +$('.subtotal p').html().substring(1);
                let total = +$('.total p').html().substring(1);
                subtotal -= res.discount_user.amount;
                total -= res.discount_user.amount;

                $(item).find('.product-price').html((res.course.price - res.discount_user.amount).toFixed(2));
                $('.subtotal p').html('$' + subtotal);
                $('.total p').html('$' + total);

                return false;
            }
        });
        failedSpan.addClass('d-none');
        successSpan.removeClass('d-none');
    })
    .fail(res => {
        failedSpan.removeClass('d-none');
        successSpan.addClass('d-none');
    })
    .always(() => {
        element.attr('disabled', false);
    });
}
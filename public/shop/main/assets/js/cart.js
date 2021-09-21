$(document).ready(function (){
    $('.remove-from-cart').click(function (event){
        product_id = $(this).attr('data-id');
        remove_from_cart();
    });
    $('.cart_add_count').click(function (event){
        product_id = $(this).attr('data-id');
        operation = +1;
        cart_edit_count();
    });
    $('.cart_minus_count').click(function (event){
        product_id = $(this).attr('data-id');
        operation = -1;
        cart_edit_count();
    });

});

function cart_edit_count()
{
    $.ajax({
        url: "/cart/edit_count",
        type: "POST",
        data: {
            product_id: product_id,
            operation: operation
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            console.log(data);
            if(data['OK'] == 1)
            {
                $('.cart_total').text(data['cart_total']+' грн');
                $('input.qty[data-id='+product_id+']').val(data['quantity']);
                $('strong.product_total[data-id='+product_id+']').text(data['total']+' грн');
            }

        }
    });
}

// function cart_add_count()
// {
//     $.ajax({
//         url: "/cart/add_count",
//         type: "POST",
//         data: {
//             product_id: product_id,
//         },
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         success: (data) => {
//             console.log(data);
//             if(data['OK'] == 1)
//             {
//                 $('.cart_total').text(data['cart_total']+' грн');
//                 $('input.qty[data-id='+product_id+']').val(data['quantity']);
//                 $('strong.product_total[data-id='+product_id+']').text(data['total']+' грн');
//             }
//
//         }
//     });
// }

function remove_from_cart()
{
    $.ajax({
        url: "/cart/remove_item",
        type: "POST",
        data: {
            product_id: product_id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            console.log(data);
            $('.cart_total').text(data['cart_total']+' грн');
            if(data['OK'] == 1)
            {
                $('button.remove-from-cart[data-id='+product_id+']').parent().parent().fadeOut();
                $('.cart-item-count').text(data['count']);
            }

        }
    });
}

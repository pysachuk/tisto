$(document).ready(function (){
    $('.add_to_cart').click(function (event){
        event.preventDefault();
        product_id = $(this).attr('data-id');
        product_title = $('.product_title[data-id='+product_id+']').text();
        add_to_cart();
    })
});

function add_to_cart()
{
    let qty = 1;
    $.ajax({
        url: "/add-to-cart",
        type: "POST",
        data: {
            id: product_id,
            qty: qty,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            if(data['OK'] == 1)
            {
                $('.cart-item-count').text(data['count']);
                Swal.fire({
                    icon: "success",
                    title: '<strong>'+product_title+'</strong>',
                    html:
                        'Додано до кошика',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText:
                        '<a href="/cart" style="color: white;"><i class="fas fa-shopping-cart"></i> Кошик</a>',
                    cancelButtonText:
                        '<b><i class="fas fa-chevron-left"></i> Назад до меню</b>',
                    timer: 3000,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            }
        }
    });
}

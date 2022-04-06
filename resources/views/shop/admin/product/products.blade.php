<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">ID</th>
                <th>Назва</th>
                <th>Опис</th>
                <th>Ціна</th>
                <th>Вага</th>
                <th>Фото</th>
                <th class="text-right">Правка</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->weight }}</td>
                    <td><img src="/storage/{{ $product->image->image ?? '' }}" style="width: 100px"></td>
                    <td class="text-right py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <form class="del_form" method="POST" action="{{ route('admin.product.destroy', $product->id) }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger delete" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                    @empty
                        <h2>Продуктов нет</h2>
                    @endforelse
                </tr>
            </tbody>
        </table>
    </div>
{{--    <div class="card-footer clearfix">--}}
{{--        <?php echo $products->links(); ?>--}}
{{--    </div>--}}
</div>
<script>
    $(document).ready(function (){
        $('.delete').click(function (event){
            event.preventDefault();
            Swal.fire({
                text: "Видалити продукт?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Так!',
                cancelButtonText: 'Ні'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('.del_form').submit();
                }
            })
        })
    })
</script>

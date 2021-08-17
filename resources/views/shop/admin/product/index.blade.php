@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Продукты')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-success">Добавить</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Категория</th>
                            <th>Название</th>
                            <th>Описание</th>
                            <th>Цена</th>
                            <th>Вес</th>
                            <th>Фото</th>
                            <th class="text-right">Правка</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                        <tr>
                                <td>{{ $product -> id }}</td>
                                <td>{{ $product -> category -> title }}</td>
                                <td>{{ $product -> title }}</td>
                                <td>{{ $product -> description }}</td>
                                <td>{{ $product -> price }}</td>
                                <td>{{ $product -> weight }}</td>
                                <td><img src="/storage/{{ $product -> image -> image ?? '' }}" style="width: 100px"></td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.product.edit', $product -> id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <form class="del_form" method="POST" action="{{ route('admin.product.destroy', $product -> id) }}">
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
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <?php echo $products->links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $('.delete').click(function (){
            if(!confirm('Вы уверены?'))
                return false;
        });
    </script>
@endsection

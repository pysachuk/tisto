@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Продукты')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Продукты</h3>
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
                                <td><img src="/storage/{{ $product -> image -> image }}" style="width: 100px"></td>
                            @empty
                                <h2>Продуктов нет</h2>
                            @endforelse
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

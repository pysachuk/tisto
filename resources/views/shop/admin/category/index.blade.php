@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Категории')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.category.create') }}" class="btn btn-success">Добавить</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th class="text-right">Правка</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $category -> id }}</td>
                                        <td>{{ $category -> title }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <form class="del_form" method="POST" action="{{ route('admin.category.destroy', $category->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger delete" type="submit"><i class="fas fa-trash"></i></button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td><h2>НЕТ КАТЕГОРИЙ</h2></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $('.delete').click(function (){
            if(!confirm('Вы уверены?'))
                return false;
        });
    </script>
@endsection

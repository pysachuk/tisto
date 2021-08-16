@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Категории')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Добавление категории</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.category.update', $category -> id) }}">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Название:</label>
                                <input type="text" value="{{ $category -> title }}"  name="title" class="form-control" id="title" placeholder="Введите название">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
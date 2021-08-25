@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Админ Панель')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Шапка головної сторінки</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.pages.main.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <img src="/storage/{{ $image }}" style="max-width: 100%">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="image" value="" type="file" class="custom-file-input" id="photo_input">
                                    <label class="custom-file-label" for="photo_input">Выберите фото...</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
{{--                            <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Назад</a>--}}
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

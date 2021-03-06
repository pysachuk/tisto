@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Категории')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Редагування категорії</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.category.update', $category -> id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <img src="/storage/{{ $category -> image_url }}" style="max-width: 100%">
                            </div>
                            <div class="form-group">
                                <label for="title">Название:</label>
                                <input type="text" value="{{ $category -> title }}"  name="title" class="form-control" id="title" placeholder="Введите название">
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Описание...">{{ $category -> description }}</textarea>
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="photo" value="" type="file" class="custom-file-input" id="photo_input">
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
                            <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

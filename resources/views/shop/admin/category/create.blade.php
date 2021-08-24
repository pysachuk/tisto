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
                <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Название:</label>
                            <input type="text"  name="title" class="form-control" id="title" placeholder="Введите название">
                        </div>
                        <div class="form-group">
                            <label>Описание</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Описание..."></textarea>
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
                        <button type="submit" class="btn btn-primary">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

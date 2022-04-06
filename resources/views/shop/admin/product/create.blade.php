@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Категории')
@section('content')
<div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Добавить продукт</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Категория</label>
                            <select name="category_id" class="form-control">
                                @forelse($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @empty
                                    <option active >КАТЕГОРИЙ НЕТ!</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Название</label>
                            <input name="title" type="text" value="{{ old('title') }}" class="form-control" id="title" placeholder="Название продуткта">
                        </div>
                        <div class="form-group">
                            <label>Описание продута</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Описание...">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="title">Цена</label>
                            <input name="price" value="{{ old('price') }}" type="text" class="form-control" id="title" placeholder="Цена">
                        </div>
                        <div class="form-group">
                            <label for="title">Вес</label>
                            <input name="weight" value="{{ old('weight') }}" type="text" class="form-control" id="title" placeholder="Вес">
                        </div>
                        <div class="form-group">
                            <label for="photo_input">Фото</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="photo" value="{{ old('photo') }}" type="file" class="custom-file-input" id="photo_input">
                                    <label class="custom-file-label" for="photo_input">Выберите фото...</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

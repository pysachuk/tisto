@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Категории')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Створення категорії</h3>
                </div>
{{--                @if ($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach ($errors->all() as $error)--}}
{{--                                <li>{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Назва:</label>
                            <input type="text"  name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Введіть назву категорії">
                            @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Опис</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Опис категорії..."></textarea>
                            @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="photo" value="" type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo_input">
                                <label class="custom-file-label" for="photo_input">Виберіть зображення...</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Завантажити</span>
                            </div>
                        </div>
                        @error('photo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Створити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

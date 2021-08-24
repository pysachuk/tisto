@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Админ Панель')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Дані адміна</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.user.update') }}">
                        @csrf
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="name_input">Ім'я</label>
                                <input type="text" name="name" value="{{ old('name')? old('name') : $user -> name }}" class="form-control" id="name_input" >
                            </div>
                            <div class="form-group">
                                <label for="email_input">E-mail</label>
                                <input type="email" name="email" value="{{ old('email') ? old('email') : $user -> email }}" class="form-control" id="email_input">
                            </div>
                            <div class="form-group">
                                <label for="old_password_input">Пароль<span class="text-danger">*</span></label>
                                <input type="password" name="old_password" class="form-control" id="old_password_input" placeholder="Поточний пароль" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password_input">Новий пароль</label>
                                <input type="password" name="new_password" class="form-control" id="new_password_input" placeholder="Новий пароль">
                            </div>
                            <div class="form-group">
                                <label for="new_password_input_confirm">Підтвердіть новий пароль</label>
                                <input type="password" name="new_password_confirmation" class="form-control" id="new_password_input_confirm" placeholder="Підтвердження">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Зберегти</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

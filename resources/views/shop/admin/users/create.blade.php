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
                    <form method="POST" action="{{ route('admin.users.store') }}">
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
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name_input" >
                            </div>
                            <div class="form-group">
                                <label for="email_input">E-mail</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email_input">
                            </div>
                            <div class="form-group">
                                <label for="new_password_input">Пароль</label>
                                <input type="password" name="password" class="form-control" id="new_password_input" placeholder="Новий пароль">
                            </div>
                            <div class="form-group">
                                <label for="new_password_input_confirm">Підтвердіть пароль</label>
                                <input type="password" name="password_confirmation" class="form-control" id="new_password_input_confirm" placeholder="Підтвердження">
                            </div>
                                <div class="form-group">
                                    <label>Роль</label>
                                    <select name="role" class="form-control select_page">
                                        <option value="manager" selected>Менеджер</option>
                                        <option value="admin">Адміністратор</option>
                                    </select>
                                </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Створити</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

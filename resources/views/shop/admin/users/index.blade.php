@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Админ Панель')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-right">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-success">Створити</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Імя</th>
                                    <th>E-Mail</th>
                                    <th>Роль</th>
                                    <th class="text-right">Правка</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user -> name }}</td>
                                        <td>{{ $user -> email }}</td>
                                        <td>{{ $user -> role -> role }}</td>
                                        <td class="text-right py-0 align-middle">
                                            @if(\Auth::id() == $user -> id)
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('admin.user') }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                </div>
                                            @else
                                                <div class="btn-group btn-group-sm">
{{--                                                    <a href="{{ route('admin.users.edit_user', $user -> id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>--}}
                                                    <form class="del_form" method="POST" action="{{ route('admin.users.delete', $user -> id) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger delete" type="submit"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function (){
            $('.delete').click(function (event){
                event.preventDefault();
                Swal.fire({
                    text: "Видалити користувача?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Так!',
                    cancelButtonText: 'Ні'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('.del_form').submit();
                    }
                })
            })
        })
    </script>
@endsection

@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Категории')
@section('content')
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
                            <th>Ім'я</th>
                            <th>E-mail</th>
                            <th class="text-right">Правка</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($admins as $admin)
                            <tr>
                                <td>{{ $admin -> name }}</td>
                                <td>{{ $admin -> email }}</td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-info edit"><i class="fas fa-eye"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td><h2>НЕТ АДМИНОВ</h2></td>
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
@endsection


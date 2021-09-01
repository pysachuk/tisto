@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Продукты')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-success">Створити</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <label>Категорія</label>
                        <select name="category" class="form-control select_category">
                            @foreach($categories as $category)
                                <option value="{{ $category -> id }}">{{ $category -> title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 products">

        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function (){
            get_products();
            $('.select_category').on('change', function (){
                get_products();
            })
        })

        function get_products()
        {
            let category_id = $('.select_category').val();

            $.ajax({
                url: "{{ route('admin.category_products') }}",
                type: "POST",
                data: {
                    category_id: category_id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.products').html(data);
                }
            });
        }
    </script>
@endsection

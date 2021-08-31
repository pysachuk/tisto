@extends('shop.layouts.admin.main_layout')
@section('title', 'TISTO - Админ Панель')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <!-- form start -->
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Редагувати</label>
                                <select name="page" class="form-control select_page">
                                    <option value="info" selected>Про нас</option>
                                    <option value="contacts">Контакти</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <div class="card page_edit_card">

                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function (){
            get_page();
            $('.select_page').on('change', function (){
                get_page();
            })
        })

        function get_page()
        {
            let page = $('.select_page').val();

            $.ajax({
                url: "{{ route('admin.pages.info.getPage') }}",
                type: "POST",
                data: {
                    page: page
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    $('.page_edit_card').html(data);
                }
            });
        }
    </script>
@endsection

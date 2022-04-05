<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/shop/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/shop/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/shop/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/shop/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/shop/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/shop/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/shop/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/shop/admin/plugins/summernote/summernote-bs4.min.css">
    @livewireStyles
    @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/shop/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('admin.home')}}" class="nav-link">Головна</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('admin.home') }}" class="brand-link">
            <img src="/shop/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">TISTO Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/shop/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('admin.user') }}" class="d-block">{{Auth::user() -> name}}</a>
                </div>
                <form action="{{route('admin.logout')}}" method="post">
                    @csrf
                    <button class="btn btn-danger" type="submit">Вихід</button>
                </form>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link @menuActive('admin.home', 'active')">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Головна адмінки
                            </p>
                        </a>
                    </li>
                    @can('view-admin-part')
                    <li class="nav-item">
                        <a href="{{ route('admin.users') }}" class="nav-link @menuActive('admin.users', 'active')">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>Користувачі</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('shop.main') }}" class="nav-link" target="_blank">
                            <i class="fas fa-circle nav-icon"></i>
                            <p>На сайт</p>
                        </a>
                    </li>
                    <li class="nav-item  has-treeview @menuActive('admin.category.index', 'menu-open') @menuActive('admin.category.create', 'menu-open')">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Категорії
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.category.index') }}" class="nav-link @menuActive('admin.category.index', 'active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Всі категорії</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.category.create') }}" class="nav-link  @menuActive('admin.category.create', 'active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Додати категорію</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview @menuActive('admin.products', 'menu-open') @menuActive('admin.product.create', 'menu-open')">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Товари
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.products') }}" class="nav-link @menuActive('admin.products', 'active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Всі товари</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.products.create') }}" class="nav-link @menuActive('admin.product.create', 'active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Додати товар</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview @menuActive('admin.pages.main.edit', 'menu-open') @menuActive('admin.pages.info.edit', 'menu-open')">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Сторінки
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.pages.main.edit') }}" class="nav-link @menuActive('admin.pages.main.edit', 'active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Головна</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.pages.info.edit') }}" class="nav-link @menuActive('admin.pages.info.edit', 'active')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Про нас</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Замовлення
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.orders', 'new') }}" class="nav-link @menuActive('admin.order.new', 'active')">
                                    <i class="fas fa-cart-plus nav-icon" style="color: #28a745!important"></i>
                                    <p>Нові замовлення</p>
                                    <span class="right badge badge-success">New</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.orders', 'approved') }}" class="nav-link @menuActive('admin.order.accepted', 'active')">
                                    <i class="fas fa-cart-plus nav-icon" style="color: #007bff!important"></i>
                                    <p>Прийняті замовлення</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.orders', 'rejected') }}" class="nav-link @menuActive('admin.order.rejected', 'active')">
                                    <i class="fas fa-cart-plus nav-icon" style="color: #dc3545!important"></i>
                                    <p>Відхилені замовлення</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022 <a href="{{ route('shop.main') }}">TISTO</a>.</strong>
        Усі права захищено.
{{--        <div class="float-right d-none d-sm-inline-block">--}}
{{--            <b>Version</b> 3.1.0--}}
{{--        </div>--}}
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/shop/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/shop/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/shop/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/shop/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/shop/admin/dist/js/adminlte.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session()->has('message'))
    <script>
        var message = [];
        message['type'] = '{{ session() -> get('message.type') }}';
        message['message'] = '{{ session() -> get('message.message') }}';
    </script>
@endif
<script>
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
        if(typeof message !== "undefined")
        {
            var title = '';
            switch (message['type'])
            {
                case 'success':
                    title = 'Успіх'
                    break
                case 'info':
                    title = 'Інфо'
                    break
                case 'error':
                    title = 'Упс...'
                    break
            }
            swal({
                title: title,
                text: message['message'],
                icon: message['type']
            });
            // Swal.fire(
            //     title,
            //     message['message'],
            //     message['type']
            // );
        }
    });
</script>
<script>
    window.addEventListener('swal:modal', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
        });
    });

    window.addEventListener('swal:confirm', event => {
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.livewire.emit('delete', event.detail.id);
                }
            });
    });
</script>

@livewireScripts
@yield('js')
</body>
</html>

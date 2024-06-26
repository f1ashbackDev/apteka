<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Аптека - Админ панель</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @vite(['resources/css/admin/bootstrap.min.css', 'resources/css/admin/theme.min.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <!-- LOGO -->
            <div class="navbar-brand-box d-flex align-items-left">
                <a href="{{ route('admin.users.index') }}" class="logo">
                    <i class="mdi mdi-album"></i>
                    <span>
                            Аптека
                    </span>
                </a>

                <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect waves-light" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu" style="background-color: #ebebeb;">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li>
                        <a href="{{ route('admin.users.index') }}">Пользователи</a>
                        <a href="{{ route('admin.category.index') }}">Каталоги</a>
                        <a href="{{ route('admin.products.index') }}">Товары</a>
                        <a href="{{ route('admin.orders.index') }}">Заказы</a>
                        <a href="{{ route('admin.reviews.show') }}">Отзывы пользователей</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-content">
    <div class="page-content">
        @yield('content')
    </div>
</div>
<div class="menu-overlay"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

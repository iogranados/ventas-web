<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Icons-->
    <link href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pace.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/datatable/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/datatable/Responsive-2.2.2/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" rel="stylesheet">
</head>
<body class="app header-fixed sidebar-fixed sidebar-lg-show">
    <header class="app-header navbar">
        @auth
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        @endauth
        <a class="navbar-brand" href="{{ url('/') }}">

            <span class="navbar-brand-full">{{ config('app.name', 'Laravel') }}</span>
            <img class="navbar-brand-minimized" src="{{ asset('svg/sale.svg') }}" width="30" height="30" alt="{{ config('app.name', 'Laravel') }}">
        </a>
        @auth
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-12">
                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
            </li>
        </ul>
        @endauth

        <ul class="nav navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item" style="padding-right: 1em;">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown" style="padding-right: 1em;">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Cerrar sesión') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </header>

    <div class="app-body">
        @auth
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">{{ config('app.name', 'Laravel') }}</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sellers') }}">
                            <i class="nav-icon cui-user"></i> Vendedores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customers') }}">
                            <i class="nav-icon cui-people"></i> Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products') }}">
                            <i class="nav-icon cui-list"></i> Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders') }}">
                            <i class="nav-icon cui-task"></i> Ordenes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('payments') }}">
                            <i class="nav-icon cui-dollar"></i> Pagos a cuenta
                        </a>
                    </li>

                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>
        @endauth

        <main class="main">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/datatable/jQuery-3.3.1/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/pace.min.js') }}" defer></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" defer></script>

    <script src="{{ asset('js/datatable/DataTables-1.10.18/js/jquery.dataTables.min.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('js/datatable/Responsive-2.2.2/js/dataTables.responsive.min.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('js/datatable/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}" type="text/javascript" defer></script>
    <script src="{{ asset('js/datatable/Responsive-2.2.2/js/responsive.bootstrap4.min.js') }}" type="text/javascript" defer></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js" defer></script>

    @yield('script')

</body>
</html>

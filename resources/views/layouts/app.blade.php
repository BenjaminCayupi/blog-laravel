<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    @yield('title')
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>
    <div class="row">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" id="navbar">
            <div class="container px-md-auto " id="contenedorgral">
                <a class="navbar-brand" href="/" style="color:#6C02FC;padding-left: 6.4px"><strong>Blog</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cate.tecnologia')}}">Tecnologia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cate.cine')}}">Cine</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cate.juegos')}}">Gaming</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cate.series')}}">Series</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cate.anime')}}">Anime</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cate.comics')}}">Comics</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item" style="margin-right:0px">
                            <a class="btn btn-primary btn-sm my-1" id="btn-grad"
                                href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('home')}}"><i class="fas fa-tachometer-alt mr-1"></i>Dashboard</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>    {{ __('Cerrar Sesion') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest



                    </ul>

                </div>

            </div>

        </nav>
    </div>

    <main class="py-1">
        @yield('content')
    </main>
    </div>

    <footer class="py-5" style="background:#EBF1F7">
        <div class="container" id="contenedorgral">
            <div class="row container" >
                <div class="col-12 col-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img"
                        viewBox="0 0 24 24" focusable="false">

                        <circle cx="12" cy="12" r="10" />
                        <path
                            d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
                    </svg>
                    <strong>Blog</strong>
                    <small class="d-block mb-3 text-muted">&copy; 2019 · Benjamin Cayupi</small>
                </div>
                <div class="col-6 col-md float-right">
                    <h5 style="color:#6C02FC">Noticias</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="/Tecnologia">Tecnologia</a></li>
                        <li><a class="text-muted" href="#">Anime</a></li>
                        <li><a class="text-muted" href="#">Cine</a></li>
                        <li><a class="text-muted" href="#">Series</a></li>
                        <li><a class="text-muted" href="#">VideoJuegos</a></li>
                        <li><a class="text-muted" href="#">Comics</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5 style="color:#6C02FC">Sobre Nosotros</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="#">Equipo</a></li>
                        <li><a class="text-muted" href="#">Contactanos</a></li>
                        <li><a class="text-muted" href="#">Privacidad</a></li>
                        <li><a class="text-muted" href="#">Terminos</a></li>
                    </ul>
                </div>

            </div>

        </div>

    </footer>
</body>

</html>

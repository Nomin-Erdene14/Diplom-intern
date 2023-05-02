<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <link defer rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script  defer src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
    $(function() {
            $("#datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd'
                }).val();
        } );
    </script> 

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Нэвтрэх') }}</a>
                                </li>
                            @endif
                             @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('employer.create') }}">{{ __('Дадлага зарлагчаар бүртгүүлэх') }}
                                        
                                </a>
                                </li>
                            @endif 
                           @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Бүртгүүлэх') }}</a>
                                </li>
                            @endif
                         @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->user_type === 'employer')
                                    {{ Auth::user()->company->cname  }}
                                @else
                                    {{ Auth::user()->name }}
                                @endif
                                <span class="caret"></span>  
                                    
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                   
                                    @if(Auth::user()->user_type === 'employer')
                                        <a class="dropdown-item" href="{{ route('company.create') }}">{{ __('Компаны мэдээлэл') }}</a>
                                        <a class="dropdown-item" href="{{ route('jobs.create') }}">{{ __('Зар үүсгэх') }}</a>
                                        <a class="dropdown-item" href="{{ route('myjob') }}">{{ __('Дадлагын жагсаалт') }}</a>
                                        <a class="dropdown-item" href="{{ route('applicants') }}">{{ __('Дадлага хүсэгчдийн CV харах') }}</a>
                                        
                                    @elseif(Auth::user()->user_type === 'simple_user')
                                        <a class="dropdown-item" href="{{ route('user.profile') }}">Профайл</a>
                                        <a class="dropdown-item" href="{{ route('home') }}">Хадгалсан дадлага</a>
                                        @else
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Гарах') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> 
                        @endguest
                    </ul>
                </div> 
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

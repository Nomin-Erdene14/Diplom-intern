 <head>
    <script src="https://kit.fontawesome.com/72b31b3e61.js" crossorigin="anonymous"></script>    
</head><!-- Spinner Start -->
 <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Уншиж байна...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ url('/') }}" class="navbar-brand p-0">
            <h1 class="m-0">INtern</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                 <li class="nav-item">
                    
                </li> 
                @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Нэвтрэх') }}</a>
                            </li>
                        @endif
                     @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('employer.create') }}">{{ __('Дадлага зарлагч') }}
                                
                        </a>
                        </li>
                    @endif 
                    
                   @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Дадлага хайгч') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              @if(Auth::user()->user_type == 'employer')
                            {{ Auth::user()->company->cname  }}
                        @else
                            {{ Auth::user()->name }}
                        @endif  
                        <span class="caret"></span>  
                            
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                           
                            @if(Auth::user()->user_type === 'employer')
                                <a class="dropdown-item" href="{{ route('company.create') }}">{{ __('Компаны мэдээлэл үүсгэх') }}</a>
                                <a class="dropdown-item" href="{{ route ('company.index',[Auth::user()->company->id])  }}">{{ __('Компаны мэдээлэл ') }}</a>
                                <a class="dropdown-item" href="{{ route('jobs.create') }}">{{ __('Зар үүсгэх') }}</a>
                                <a class="dropdown-item" href="{{ route('myjob') }}">{{ __('Дадлагын жагсаалт') }}</a>
                                <a class="dropdown-item" href="{{ route('applicants') }}">{{ __('Дадлага хүсэгчдийн CV харах') }}</a>
                                <a class="dropdown-item" class="nav-link"href="{{ route('company')}}">Компаниуд</a>  
                                <a class="dropdown-item" class="nav-link"href="{{ route('income')}}">Цалин тооцоолох</a> 
                            @elseif(Auth::user()->user_type === 'simple_user')
                                <a class="dropdown-item" href="{{ route('user.profile') }}">Оюутаны CV үүсгэх</a>
                                <a class="dropdown-item" href="{{ route('user.see')}} ">Миний CV</a>
                                <a class="dropdown-item" href="{{ route('home') }}">Хадгалсан дадлага</a>
                                <a class="dropdown-item" class="nav-link"href="{{ route('test')}}">Тест өгөх</a>
                                <a class="dropdown-item" class="nav-link"href="{{ route('company')}}">Компаниуд</a>
                                <a class="dropdown-item" class="nav-link"href="{{ route('income')}}">Цалин тооцоолох</a>   
                                
                            @elseif(Auth::user()->user_type === 'admin')
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('allposts') }}">Нийтлэлүүд</a>
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
                {{-- <a class="dropdown-item" href="{{ route('company.company')}}">Компаниуд</a>  --}}
            </ul>
            {{-- <div class="navbar-nav mx-auto py-0">
                <a href="index.html" class="nav-item nav-link active">Hvvp</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="service.html" class="nav-item nav-link">Service</a>
                <a href="project.html" class="nav-item nav-link">Project</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div> --}}
            
            @if (Route::has('login'))
                        <a href="{{route('alljobs')}}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">{{ __('Дадлагууд') }}</a> 
            @endif
           
           
        </div>
    </nav>

</div>
<!-- Navbar & Hero End -->
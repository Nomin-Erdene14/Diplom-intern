<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>register</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('partialsjob.head')
</head>

<body style="background-color:white">
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
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
                    <h1 class="m-0">Intern</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="index.html" class="nav-item nav-link"></a>
                        <a href="about.html" class="nav-item nav-link"></a>
                        <a href="service.html" class="nav-item nav-link"></a>
                        <a href="project.html" class="nav-item nav-link"></a>
                        <div class=" ">
                           
                            <div class="">
                                
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link active"></a>
                    </div>
                    <a href="{{ route('login') }}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Нэвтрэх</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-primary hero-header">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-12 text-center">
                            <h1 class="text-white animated slideInDown">Дадлага зарлагчаар бүртгүүлэх</h1>
                            <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
        <div>
            @if (Session::has('MessageCompany'))
                <div class="alert alert-success">
               {{Session::get('MessageCompany')}}
                @endif
               </div>
              </div>

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>Бүртгэл<span></span></p>
                   
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                            <form method="POST" action="{{ route('employer.register') }}"> @csrf
                                <input type="hidden" name="user_type" value="employer">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="cname" @error('cname') is-invalid @enderror name="cname" value="{{ old('cname') }}" required autocomplete="cname" autofocus placeholder="Компаний нэр">
                                            <label for="cname">Нэр</label>
                                            @error('cname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email">
                                            <label for="email">{{ __('И-Мэйл') }}</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
        
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"class="form-control" id="dob" placeholder="Subject"@error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                                            <label  for="password" >{{ __('Нууц үг') }}</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                      
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"class="form-control" id="dob" placeholder="Subject"@error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                                            <label  for="password-confirm" >{{ __('Нууц үг дахин оруулна уу') }}</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>


                                    
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Бүртгүүлэх</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
      

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-secondary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/digital-1-1.0.0/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/digital-1-1.0.0/js/main.js')}}"></script>
</body>

</html>
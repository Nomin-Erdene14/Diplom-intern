<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Intern</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('partialsjob.head')
</head>

<body style="background-color:white">
    <div class="container-xxl bg-white p-0">
       @include('partialsjob.Nav')
       {{-- Baih ystoi shvv --}}
       <div class="container-xxl py-5 bg-primary hero-header">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated slideInDown">Нэвтрэх</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    
                </div>
            </div>
        </div>
    </div>
    {{-- ene hurtel --}}
        <!-- Contact Start -->
        <div>
            @if (Session::has('Message'))
           <div class="alert alert-success">
            {{Session::get('Message')}}
            @endif
            </div> 
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>Нэвтрэх<span></span></p>
                   
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                            <form method="POST" action="{{ route('login') }}">@csrf
                                <input type="hidden" name="user_type" value="simple_user">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            <label for="email" >{{ __('И-Мэйл') }}</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                   
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Нэвтрэх</button>
                                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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

    <!-- JavaScript Libraries -->
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
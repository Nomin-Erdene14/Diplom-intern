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
        <div class="container my-1 py-1 px-lg-1">
            
        </div>
    </div>
    {{-- ene hurtel --}}

<div class="container">
    
    <div class="row">
        
    @if(Session::has('Message'))
                        <div class="alert alert-success">
                            {{ Session::get('Message') }}
                        </div>
                    @endif
    @if(Session::has('MessageAvatar'))
                    <div class="alert alert-success">
                        {{ Session::get('MessageAvatar') }}
                    </div>
                @endif
                @if(Session::has('MessageCover'))
                <div class="alert alert-success">
                    {{ Session::get('MessageCover') }}
                </div>
            @endif   
    @if(Session::has('MessageResume'))
            <div class="alert alert-success">
                {{ Session::get('MessageResume') }}
            </div>
        @endif 
       <div class="col-md-8">
        <div class="col-md-2">
            @if(!empty(Auth::user()->profile->avatar))
                <img src="{{ asset('upload/avatar') }}/{{ Auth::user()->profile->avatar }}" width="50px" style="width:100%;">
            @else
                <img src="{{ asset('avatar/me.png') }}" width="50px" style="width:100%;">
            @endif
        </div>
         


            <form action="{{ route('user.profile.avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    {{-- <div class="card-header">
                        Профайл зураг шинэчлэх
                    </div> --}}
                    <div class="card-body">
                        <input type="file" class="form-control" name="avatar">
                        @if($errors->has('avatar'))
                            <div class="error" style="color: red;">
                                {{ $errors->first('avatar') }}
                            </div>
                        @endif <br>
                        <button type="submit" class="btn btn-outline-primary float-right">Шинэчлэх</button>
                    </div>
                </div>
            </form>
           
                        <form action="{{ route('user.profile.update') }}" method="POST">
                                @csrf
                        <div class="card">
                            <div class="card-header">Профайл мэдээллээ шинэчлэх</div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label for="name">Нэр</label>
                                        <input type="text" class="form-control border " id="name"  name="name" 
                                        value="{{ auth()->user()->name}}" required autocomplete="name" autofocus >
                                        
                                    
                                    </div> <br>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">И-Мэйл</label>
                                        <input type="email" class="form-control border" id="email" @error('email') is-invalid @enderror name="email" 
                                        value="{{ auth()->user()->email }}" required autocomplete="email">
                                        
                                        
                                    </div>
                                </div>
                            </div>
                                <div class="col-12"> 
                                    <div class="form-group">
                                        <label  for="password" >Нууц үг</label>
                                        <input id="password" type="password" @error('password') is-invalid @enderror" 
                                        name="password" required autocomplete="new-password"class="form-control" id="password" 
                                        @error('dob') is-invalid @enderror" name="dob" value="{{ auth()->user()->password }}" required autocomplete="password" autofocus>
                                        
                                        
                                    </div> <br>
                                </div>
                                <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="dob">Төрсөн огноо</label>
                                        <input type="date" class="form-control" id="dob" placeholder="Subject"@error('dob') is-invalid @enderror" name="dob" value="{{auth()->user()->profile->dob }}" required autocomplete="dob" autofocus>
                                        @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Хүйс</label>
                                        <div class="input-group mb-3">
                                              
                                            <input type="radio" name="gender" value="male" required >Эрэгтэй
                                            
                                          &nbsp;
                                            <input type="radio"name="gender" value="female" required>Эмэгтэй
                                            
            
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="">Гэрийн хаяг</label>
                                    <input type="text" name="address" value="{{ auth()->user()->profile->address }}" class="form-control">
                                    @if($errors->has('address'))
                                        <div class="error" style="color: red;">
                                            {{ $errors->first('address') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Сургууль</label>
                                    <input type="text" name="school" value="{{ auth()->user()->profile->school }}" class="form-control">
                                    @if($errors->has('school'))
                                        <div class="error" style="color: red;">
                                            {{ $errors->first('school') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Салбар сургууль</label>
                                    <input type="text" name="GPA" value="{{ auth()->user()->profile->GPA }}" class="form-control">
                                    @if($errors->has('GPA'))
                                        <div class="error" style="color: red;">
                                            {{ $errors->first('GPA') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Утасны дугаар</label>
                                    <input type="text" name="phone_number" value="{{ auth()->user()->profile->phone_number}}" class="form-control">
                                    @if($errors->has('phone_number'))
                                        <div class="error" style="color: red;">
                                            {{ $errors->first('phone_number') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Оюутны Чадвар</label>
                                    <textarea name="experience"  rows="10" class="form-control">{{auth()->user()->profile->experience  }}</textarea>
                                    @if($errors->has('experience'))
                                        <div class="error" style="color: red;">
                                            {{ $errors->first('experience') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Таны бусдаас ялгарах давуу тал</label>
                                    <textarea name="bio" rows="8" class="form-control">{{ auth()->user()->profile->bio }}</textarea>
                                    @if($errors->has('bio'))
                                        <div class="error" style="color: red;">
                                            {{ $errors->first('bio') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group"> <br>
                                    <button class="btn btn-outline-success">Шинэчлэх</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    </div> 
                    <div class="col-md-4"><br><br><br><br><br>
                        <div class="card">
                            <form action="{{ route('user.profile.coverletter') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="card-header">Сургуулийн тодорхойлолт</div>
                                    <div class="card-body">
                                        <input type="file" class="form-control" name="cover_letter">
                                        @if($errors->has('cover_letter'))
                                            <div class="error" style="color: red;">
                                                {{ $errors->first('cover_letter') }}
                                            </div>
                                        @endif <br>
                                        <button type="submit" class="btn btn-outline-primary float-right">Файл хуулах</button>
                                    </div>
                            </form>
                           
                            </div>
                        <div class="card">
                            <form action="{{ route('user.profile.resume') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                            <div class="card-header">Дүнгийн тодорхойлолт</div>
                            <div class="card-body">
                                    <input type="file" class="form-control" name="resume">
                                    @if($errors->has('resume'))
                                        <div class="error" style="color: red;">
                                            {{ $errors->first('resume') }}
                                        </div>
                                    @endif <br>
                                    <button type="submit" class="btn btn-outline-primary float-right">Файл хуулах</button>
                            </div>
                            </form>
                            
                        </div>
                    </div>

                    </div>
                </div>
            
        </div>
        
    </div>
</div>
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


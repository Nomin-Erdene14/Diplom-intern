<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Intern</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('partialsjob.head')
    <style>
        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
            -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }
        .badge-success {
            color: #fff;
            background-color: #38c172;
            }
        .badge-primary {
            color: #fff;
            background-color: #3490dc;
            }

    </style>
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

<div class="container ">
    <div class="row">
        <div class="col ">
    <div>
        @if (Session::has('MessageCompany'))
       <div class="alert alert-success">
        {{Session::get('MessageCompany')}}
        @endif
        </div> 
    <div>
        @if (Session::has('MessageCover'))
       <div class="alert alert-success">
        {{Session::get('MessageCover')}}
        @endif
        </div> 
        <div>
            @if (Session::has('MessageResume'))
           <div class="alert alert-success">
            {{Session::get('MessageResume')}}
            @endif
            </div>
            <div>
                @if (Session::has('Message'))
        <div class="alert alert-success">
         {{Session::get('Message')}}
         @endif
            </div>
          
            @if (Session::has('MessageCoverPhoto'))
        <div class="alert alert-success">
         {{Session::get('MessageCoverPhoto')}}
         @endif
            </div>
            @if (Session::has('MessageLogo'))
        <div class="alert alert-success">
         {{Session::get('MessageLogo')}}
         @endif
            </div>
            <div><h5 style="text-align: center" >Компани мэдээлэл шинэчлэх</h5> </div>
    <div class="row">
    <div class="col-md-6 ">

        @if (!empty(Auth::user()->company->logo))
        <img src="{{URL('upload/logo')}}/{{Auth::user()->company->logo}}"  width="90px" >
    @else
    <img src="{{URL('avatar\pro.jpg')}}" width="90px">
    @endif
    
       
        КОМПАНИ НЭР: &nbsp; <strong> 
            {{Auth::user()->company->cname}}</strong>
        <form action="{{route('company.logo')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            
            
                <div class="card-body">
            <input type="file" class="form-control" name="logo">
            <button type="submit" class="btn btn-success float-right">Шинэчлэх</button>
                </div>
            
        </div>
      
         </form>
        @if($errors->has('logo'))
          <div class="error" style="color:red">
            {{$errors->first('logo')}}
           </div>
        @endif
        <div class="card">
             
            <div class="card-header">
                
                Дадлага зарлагчын дэлгэрэнгүй мэдээлэл
            </div>
            
            <div class="card-body">
                <p> <strong>Компани нэр:</strong> {{Auth::user()->company->cname}} </p>
                <p><strong>Компани и-мэйл:</strong>{{Auth::user()->email}}  </p>
                <p><strong>Компани Хаяг:</strong> {{Auth::user()->company->address}} </p>
                <p><strong>Компани Утасны дугаар:</strong>{{Auth::user()->company->phone}} </p>
                <p> <strong>Компани Вэб сайт:</strong> {{Auth::user()->company->website}} </p>
                <p><strong>Компани Мэдээлэл:</strong>  {{Auth::user()->company->description}} </p>
                <p><strong>Компани Нэмэлт Мэдээлэл:</strong>  {{Auth::user()->company->slogan}} </p>
                <p><strong>Компани бүртгүүлсэн огноо: </strong>{{Auth::user()->company->created_at}}   </p>
                 <a href="{{ route ('company.index',[Auth::user()->company->id])  }}">Компаны хуудасруу шилжих</a>  
                {{-- <button>
                <a href="{{route('company.index',company->slug,Auth::user()->company->id)}}" class="btn btn-sm btn-primary">edit</a>
                </button> --}}
                {{-- @if (!empty(Auth::user()->profile->cover_letter))
                    <p>
                        <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">
                        Сургуулийн тодорхойлолт харах</a>
                    </p>
                @else
                   <p>Сургуулийн тодорхойлолт оруулна уу</p> 
                @endif
                @if (!empty(Auth::user()->profile->resume))
                    <p>
                        <a href="{{Storage::url(Auth::user()->profile->resume)}}">
                        Дүнгийн тодорхойлолт харах</a>
                    </p>
                @else
                   <p>Дүнгийн тодорхойлолт оруулна уу</p> 
                @endif --}}
            </div>
        </div>
        <div class="card">
            <form action="{{route('company.cover.photo')}}" method="POST" enctype="multipart/form-data">
               @csrf
                <div class="card-body">
                Компаний ковер зураг оруулах  {{-- cover_photo --}}
                <div class="card">
                    <input type="file" class="form-control"
                    name="cover_photo">
                    <button type="submit" class="btn btn-war
                    ">Файл хуулах</button>
                </div>
                @if($errors->has('cover_photo'))
               <div class="error" style="color:red">
               {{$errors->first('cover_photo')}}
               </div>
               @endif
            </div> 
                
            </form>
         
        </div>
        <div class="card">
         
            
           
        </div>
   </div>
   <div class="col-md-6">
        <br><br>
        <form action="{{route('company.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group"> 
                        <label for="cname">Нэр</label>
                        <input type="text" class="form-control" id="cname" @error('cname') is-invalid @enderror name="cname" 
                        value="{{ Auth::user()->company->cname }}" required autocomplete="cname" autofocus >
                       
                        
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">{{ __('И-Мэйл') }}</label>
                        <input type="email" class="form-control" id="email" @error('email') is-invalid @enderror name="email" 
                        value="{{Auth::user()->email }}" required autocomplete="email">
                        
            
                    </div>
                </div> 
                <div class="col-12"><br>
                    <div class="form-group"> 
                        <label  for="password" >Нууц үг</label>
                        <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"class="form-control" id="password" placeholder="Subject"@error('password') is-invalid @enderror" name="password" 
                        value="{{ Auth::user()->password }}" required autocomplete="dob" autofocus>
                       
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
               <label for="address">Шинэчлэх компани хаягаа оруулна уу</label>
                <input type="text" name="address" class="form-control" value="{{Auth::user()->company->address}}">
                @if($errors->has('address'))
                <div class="error" style="color:red">
                {{$errors->first('address')}}
                </div>
                @endif
            </div> <br>
            <div class="form-group">
                <label for="phone">Утасны дугаар оруулна уу</label>
                <input type="text" name="phone" class="form-control"
                value="{{Auth::user()->company->phone}}">
                @if($errors->has('phone'))
                <div class="error" style="color:red">
                {{$errors->first('phone')}}
                </div>
                @endif
            </div>
            <br>
            <div class="form-group">
                <label for="website">Website оруулна уу</label>
                <input name="website" id="" cols="30" rows="10"  class="form-control"
                value="{{Auth::user()->company->website}}" >
                @if($errors->has('website'))
                <div class="error" style="color:red">
                {{$errors->first('website')}}
                </div>
                @endif
            </div>
            <br>
            <div class="form-group">
                <label for="description">Компаний тухай мэдээлэл оруулна уу</label>
                <textarea name="description" id="" cols="30" rows="10"  class="form-control"
                 placeholder="{{Auth::user()->company->description}}"></textarea>
                @if($errors->has('description'))
                <div class="error" style="color:red">
                {{$errors->first('description')}}
                </div>
                @endif
            </div>
            <br>
            <div class="form-group">
                <label for="slogan">Нэмэлт мэдээлэл</label>
                <textarea name="slogan" id="" cols="30" rows="10"  class="form-control"
                 placeholder="{{Auth::user()->company->slogan}}"></textarea>
                @if($errors->has('slogan'))
                <div class="error" style="color:red">
                {{$errors->first('slogan')}}
                </div>
                @endif
            </div>
            <br>
            <div class="form-group">
                <button class="btn btn-success">Шинэчлэх</button>
            </div>
           </form>
           
            
        </div>
    </div>
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

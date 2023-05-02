@include('partialsjob.link')
@include('partialsjob.script')
<head>
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
        .badge-yellow {
            color: #fff;
            background-color: #03fcd2;
            }

    </style>
</head>
<body class="g-sidenav-show  bg-gray-200">
  @include('admin.leftmenu')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav  justify-content-end">
            
            <li class="nav-item d-flex align-items-center">
               
                <button class="btn btn-primary">
                <a class="dropdown-item" href="{{ route('allposts') }}">Нийтлэлүүд</a>
            </button> &nbsp; &nbsp;&nbsp;   
           
              <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                <i class="bi bi-person-fill"></i>
                <a class="d-sm-inline d-none">
                @if(Auth::user()->user_type === 'employer')
                                    {{ Auth::user()->company->cname  }}
                                    
                                @else
                                    {{ Auth::user()->name }}
                                @endif
                  </a>   
              </a>
                        
            </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Дадлага зарлагч нэмэх</h6>
              </div>
            </div>
            <div class="container">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
             <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <div class="col-md-16">
                   <div class="card">
                    <div class="card-header">
                       
                    </div>
                     <div class="card-body">
                         <form action="{{Route('admin.employer.store')}}" method="POST"> @csrf
                            <input type="hidden" name="user_type" value="employer">
                            <div class="row ">
                            <div class="col-md-6"> 
                                <div class="form-floating">
                                    <input type="text" class="form-control border " id="name" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Нэр оруулна уу">
                                    <label for="name">Нэр</label>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control border" id="email" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <label for="email">{{ __('И-Мэйл') }}</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                
                            </div>
                            
                            <div class="col-12"> <br>
                                <div class="form-floating rounded border">
                                    <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"class="form-control" id="dob" placeholder="Subject"@error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                                    <label  for="password" >{{ __('Нууц үг') }}</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                              
                            <div class="col-12"> <br>
                                <div class="form-floating rounded border">
                                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"class="form-control" id="dob" placeholder="Subject"@error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                                    <label  for="password-confirm" >{{ __('Нууц үг дахин оруулна уу') }}</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>


                           
                            <div class="col-12"> <br>
                                <button class="btn btn-primary w-100 py-3" type="submit">Бүртгүүлэх</button>
                            </div>
                      
                            </div>
                         </form>
                            
                            <br><br>
                            {{-- <div>{{$users->links()}}</div>  --}}
                    </div> 
                  </div>

                </div>
            </div> 
         </div> 
       </div>
     </div>
   </div>
  </div>
 </div>

</main>
</body>
</html>
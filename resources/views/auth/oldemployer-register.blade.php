@extends('layouts.app')

@section('content')
<style>
    
</style>
<div class="container">
    <h4>Дадлага зарлагчаар бүртгүүлэх</h4>
    <div class="row ">
        <div class="col-md-2">
  
        </div>
        <div class="col-md-3">
                    <img src="{{URL('avatar/reg.png')}}" width="425">
                       </div>
        <div class="col-md-6">
             
            <div class="card">
              
               
                {{-- <div class="card-header" style="color:#FFCC00"><h4><b>{{ __('Сайтд бүртгүүлэх') }}</b></h4></div> --}}

                <div class="card-body">
                    <form method="POST" action="{{ route('employer.register') }}">
                        @csrf
                        <input type="hidden" name="user_type" value="employer">
                        <div class="row mb-3">
                            <label for="cname" class="col-md-4 col-form-label text-md-end">{{ __('Компаний нэр') }}</label>

                            <div class="col-md-6">
                                <input id="cname" type="text" class="form-control @error('cname') is-invalid @enderror" 
                                name="cname" value="{{ old('cname') }}" required autocomplete="cname" autofocus>

                                @error('cname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $cname }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('И-Мэйл') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                     
                   


                        
                        

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Нууц үг') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Нууц үг дахин оруулна уу') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Бүртгүүлэх') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

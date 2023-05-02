@include('partialsjob.link')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Intern</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta charset="UTF-8">
    @include('partialsjob.link')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    @include('partialsjob.head')
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
          <div class="">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Сонголтууд нэмэх</h6>
              </div>
            </div>
            <div class="container">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="col-md-16">

<div class="card">

    <div class="card-body">
        <form method="POST" action="{{ route("admin.options.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="question_id">{{ trans('Асуултыг сонгоно уу') }}</label>
                <select class="form-control select2 {{ $errors->has('question') ? 'is-invalid' : '' }}" name="question_id" id="question_id" required>
                    @foreach($questions as $id => $question)
                        <option value="{{ $id }}" {{ old('question_id') == $id ? 'selected' : '' }}>{{ $question }}</option>
                    @endforeach
                </select>
                @if($errors->has('question_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('question_id') }}
                    </div>
                @endif
               
            </div>
            <div class="form-group">
                <label class="required" for="option_text">{{ trans('Сонголтыг оруулна уу') }}</label>
                <textarea class="form-control {{ $errors->has('option_text') ? 'is-invalid' : '' }}" name="option_text" id="option_text" required>{{ old('option_text') }}</textarea>
                @if($errors->has('option_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('option_text') }}
                    </div>
                @endif
                
            </div>
            <div class="form-group">
                <label for="points">{{ trans('Оноо') }}</label>
                <input class="form-control {{ $errors->has('points') ? 'is-invalid' : '' }}" type="number" name="points" id="points" value="{{ old('points') }}" step="1">
                @if($errors->has('points'))
                    <div class="invalid-feedback">
                        {{ $errors->first('points') }}
                    </div>
                @endif
           
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit" style="background-color: rgb(80, 200, 120)">
                    <span class="text-capitalize">Хадгалах</span>
                </button>
            </div>
        </form>
    </div>
</div>


</div>

</div>
@include('partialsjob.script')

</body>

</html>  
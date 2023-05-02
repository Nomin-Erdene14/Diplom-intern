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
                <div class="card my-4">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                      <h6 class="text-white text-capitalize ps-3">Ажлын талбар</h6>
                    </div>
                  </div> <br>
                  <div class="col-md-16">
                    <div class="container">
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                    <form action="{{route('post.store')}} "method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control" name="title" placeholder="Гарчиг оруулна уу"> <br>
                        <textarea name="content" id="summernote" cols="30" rows="10"></textarea> <br>
                        <input type="file" name="image" class="form-control @error('content') is-invalid @enderror"
                            autocomplete="image" > <br>
                            <div class="form-group">
                                <select name="status" class="form-control ">
                                 
                                 <option value="1"class="form-control">Тийм</option>
                                 <option value="0"class="form-control">Үгүй</option>
                                </select>
                             </div>
                        <button type="submit" class="btn  btn-primary">Нийтлэх</button>
                    </form>
                </div>
            </div>
        </div>
        <div id="summernote"></div>
        <script>
          $('#summernote').summernote({
            placeholder: 'Текст бичнэ үү',
            tabsize: 2,
            height: 100
          });
        </script>
                </div>
              </div>
            </div>
          </div>
           
    {{-- <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Пост үүсгэх
            </div>
                <div class="card-body">
                    
                <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        placeholder="Гарчиг" >
                        @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                    </div> <br>
                    <div class="form-group">
                        <textarea name="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror" 
                        placeholder="Текст бичнэ үү" ></textarea>
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror
                    </div> <br>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control @error('content') is-invalid @enderror"
                        autocomplete="image" >
                        @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <p>{{ $message }}</p>
                                </span>
                            @enderror
                    </div> <br>
                    <div class="form-group">
                       <select name="status" class="form-control ">
                        <option value=""class="form-control">Нийлэх үү</option>
                        <option value="1"class="form-control">Тийм</option>
                        <option value="0"class="form-control">Үгүй</option>
                       </select>
                    </div><br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Хадгалах</button>
                    </div>
                </form>
                </div>
            </div>
        </div> --}}
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
    </main>
    @include('partialsjob.script')
</body>

</html>
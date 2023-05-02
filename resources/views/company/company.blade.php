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
        <div class="container my-5 py-3 px-lg-5">
            {{-- <div class="row g-5 py-5"> --}}
                 <div class="col-12 text-center">
                    <h1 class="text-white animated slideInDown">Компаниуд</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    
                </div> 
            </div>
        </div>
    </div>
    {{-- ene hurtel --}}
    
    <div class="container">
        <div class="row">
            @foreach($companies as $company)
            <div class="col-md-3">
                <div class="card shadow-sm p-3 mb-5 bg-body rounded" style="width: 18rem;">
                    @if (!empty($company->logo))
                    <img src="{{URL('upload/logo')}}/{{$company->logo}}"   style="width: 70;  border-radius: 300px">
                @else
                    <img src="{{URL('avatar\pro.jpg')}}" style="width: 90;  border-radius: 300px">
                @endif
                    <div class="card-body">
                      <h5 class="card-title">{{Str::limit($company->cname,'20')}}</h5>
                      <p class="card-text">{{Str::limit($company->description,'40')}}</p>
                      <a href="{{route('company.index',[$company->id, $company->slug])}}" class="btn btn-primary">Дэлгэрэнгүй</a>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="row">{!! $companies->withQueryString()->links('pagination::bootstrap-5') !!}</div>  --}}
           
        </div>
    </div>
 
    
    @include('partialsjob.footer')
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
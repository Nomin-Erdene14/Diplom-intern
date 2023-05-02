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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Тестийн хариу</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    <p>{{ session('status') }}</p>

                                    
                                </div>
                            </div>
                        </div>
                    @endif

                    <p>Дүн: {{ $result->total_points }} Оноо</p>
                    
                    <a href="{{ route('results.send', $result->id) }}" class="btn btn-primary">Тестийн дэлгэнгvйг имэйлээр авах</a> &nbsp;
                   <a href="{{ route('test') }}" class="btn btn-outline-primary">Дахин тест өгөх</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partialsjob.footer')
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
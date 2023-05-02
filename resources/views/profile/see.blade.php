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
    <p class="section-title text-secondary justify-content-center"><span></span>Профайл<span></span></p>
           <h1 class="text-center mb-5">Оюутаны дэлгэнгvй мэдээлэл</h1>
<div class="container">
    <div class="row">
    <div class="col-md-10">
        
        <div class="card">
            <div class="card-header">Хэрэглэгчийн мэдээлэл</div>
            <div class="card-body">
                <p> <strong>Оюутаны нэр:</strong>  {{ auth()->user()->name ??'Хоосон'}}</p>
                <p><strong>Оюутаны И-мэйл:</strong>  {{ auth()->user()->email ??'Хоосон'}}</p>
                <p><strong>Оюутаны гэрийн хаяг:</strong> {{ auth()->user()->profile->address ??'Хоосон'}}</p>
                <p><strong>Сургууль:</strong> {{ auth()->user()->profile->school ??'Хоосон'}}</p>
                <p><strong>Салбар сургууль:</strong> {{ auth()->user()->profile->GPA ??'Хоосон'}}</p>
                <p><strong>Утас:</strong> {{ auth()->user()->profile->phone_number ??'Хоосон'}}</p>
                <p><strong>Хүйс:</strong> {{ auth()->user()->profile->gender ??'Хоосон' }}</p>
                <p><strong>Оюутны Чадвар:</strong> {{ auth()->user()->profile->experience ??'Хоосон'}}</p>
                <p><strong>Таны бусдаас ялгарах давуу тал:</strong> {{ auth()->user()->profile->bio ??'Хоосон'}}</p>
                <p><strong>Бүртгэгдсэн огноо:</strong> {{ auth()->user()->created_at ??'Хоосон'}}</p>
                <p> <strong>Шалгалтын оноо(10 оноос):</strong>  {{ $totalPoints->total_points ?? 'Шалгалт өгөөгүй байна'}} оноо</p>
                
                   

                @if(!empty(Auth::user()->profile->cover_letter))
                    <p>
                        <a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Сургуулийн тодорхойлолтоо харах </a>
                    </p>
                @else
                    <p>Сургуулийн тодорхойлолт оруулаагүй байна</p>
                @endif
                @if(!empty(Auth::user()->profile->resume))
                    <p>
                        <a href="{{ Storage::url(Auth::user()->profile->resume) }}">Дүнгийн тодорхойлолтоо харах </a>
                    </p>
                @else
                    <p>Дүнгийн тодорхойлолт оруулна уу</p>
                @endif
            </div>
        </div>
    </div>

        <div class="col-md-2">
            @if(!empty(Auth::user()->profile->avatar))
                <img src="{{ asset('upload/avatar') }}/{{ Auth::user()->profile->avatar }}" width="50px" style="width:100%;">
            @else
                <img src="{{ asset('avatar/me.png') }}" width="50px">
            @endif
            <h4>Оюутаны нэр: {{auth()->user()->name}}</h4>
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


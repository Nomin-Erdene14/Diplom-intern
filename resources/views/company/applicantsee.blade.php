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
              <p> <strong>Оюутаны нэр:</strong>  {{ $user_id->name }}</p>
                <p><strong>Оюутаны И-мэйл:</strong>  {{ $user_id->email }}</p> 
                <p><strong>Оюутаны гэрийн хаяг:</strong> {{$user_id->profile->address ??'хоосон'}}</p>
                 <p><strong>Сургууль:</strong> {{ $user_id->profile->school ??'хоосон'}}</p>
                <p><strong>Салбар сургууль:</strong> {{ $user_id->profile->GPA ??'хоосон'}}</p>
                <p><strong>Утас:</strong> {{$user_id->profile->phone_number ??'хоосон'}}</p>
                <p><strong>Хүйс:</strong> {{$user_id->profile->gender ??'хоосон'}}</p>
                <p><strong>Оюутны Чадвар:</strong> {{$user_id->profile->experience ??'хоосон'}}</p> 
                <p><strong>Таны бусдаас ялгарах давуу тал:</strong> {{ $user_id->profile->bio ??'хоосон'}}</p>
               <p><strong>Бүртгэгдсэн огноо:</strong> {{$user_id->created_at }}</p>
               <p> <strong>Шалгалтын оноо(10 оноос):</strong>  {{ $totalPoints->total_points ?? 'Шалгалт өгөөгүй байна'}} оноо</p>
                @if(!empty($user_id->profile->cover_letter))
                    <p>
                        <a href="{{ Storage::url($user_id->profile->cover_letter) }}">Сургуулийн тодорхойлолтоо харах </a>
                    </p>
                @else
                    <p>Сургуулийн тодорхойлолт оруулаагүй байна</p>
                @endif
                @if(!empty($user_id->profile->resume))
                    <p>
                        <a href="{{ Storage::url($user_id->profile->resume) }}">Дүнгийн тодорхойлолтоо харах </a>
                    </p>
                @else
                    <p>Дүнгийн тодорхойлолт оруулна уу</p>
                @endif 
            </div>
        </div>
    </div>

        <div class="col-md-2">
            @if(!empty($user_id->profile->avatar))
                <img src="{{ asset('upload/avatar') }}/{{ $user_id->profile->avatar }}" width="50px" style="width:100%;">
            @else
                <img src="{{ asset('avatar/me.png') }}" width="50px">
            @endif
            <h4>Оюутаны нэр: {{$user_id->name}}</h4>
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


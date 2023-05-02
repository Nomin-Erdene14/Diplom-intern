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
<div class="container">
    <h1 class="text-center mb-5">CV илгээсэн оюутанууд</h1>
   <div class="row ">
         @foreach ($applicants as $applicant)
                        @foreach ($applicant->users as $user)
                        <div class="col-md-6"> 
                        <div class="card">
                            <center>
                        <div class="card-header">CV илгээсэн дадлагын зар: {{ $applicant->title }}</div>
                           <div class="col-md-2">
                            @if(!empty($user->profile->avatar))
                                <img class="card-img-top" src="{{ asset('upload/avatar') }}/{{ $user->profile->avatar }}" width="80px" style="width:100%;">
                            @else
                                <img class="card-img-top" src="{{ asset('avatar/me.png') }}" width="80px" style="width:100%;">
                            @endif
                            </div>
                            <div class="card-body">
                            
                              <p class="card-text"><p> <strong>Оюутаны нэр:</strong>  {{ $user->name ??'хоосон' }}</p>
                              <p> <strong>Оюутаны И-мэйл:</strong>  {{ $user->email??'хоосон' }}</p>
                              
                              <p> <strong>Оюутаны төрсөн өдөр:</strong>  {{ $user->profile['dob']  ??'хоосон'}}</p>
                              
                              <p> <strong>Бүртгэгдсэн огноо:</strong>  {{ $user->profile['created_at'] ??'хоосон'}}</p></p>
                              
                                <p>
                                    <a class="btn btn-primary" href="{{ route('applicantsee',[$user->id]) }}">Дэлгэнгvй</a>
                                </p>
                            </div>
                          </div>
                        </div> 
                    </center>
                        @endforeach
                    @endforeach
                </div>
            </div>  
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
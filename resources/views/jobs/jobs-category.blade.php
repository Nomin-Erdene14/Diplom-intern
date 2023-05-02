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

<body style="background-color:white "class="antialiased">
    <div class="container-xxl bg-white p-0">
       @include('partialsjob.Nav')
       {{-- Baih ystoi shvv --}}
       <div class="container-xxl py-5 bg-primary hero-header">
        <div class="container my-3 py-3 px-lg-3">
            {{-- <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated slideInDown">Зарын дэлгэрэнгүй</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    
                </div> --}}
            </div>
        </div>
    </div>
    {{-- ene hurtel --}}
<div >
    
<div class="container">
    <div class="row ">
        <h3>Бүх зарлагдсан дадлага</h3>
           <small>{{$categoryName->name}}</small>
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <td class="col-md-1" ></td>
                    <td class="col-md-2">Гарчиг</td>
                    <td class="col-md-4">Үүрэг</td>
                    <td class="col-md-2">Технологи</td>
                    <td class="col-md-2">Хугацаа</td>
                    <td class="col-md-2"></td>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                    <tr>
                        <td class="col-md-1">
                            <img src="{{URL('/avatar/logo.png')}}" width="50">
                        </td>
                        <td class="col-md-2">
                            {{Str::limit($job->title),1}} <br>
                            <div class="fast"> <h6 style="color: burlywood" >Төрөл:{{Str::limit($job->type),10}}</h6> </div> 
                        </td class="col-md-4">
                        <td>
                            {{Str::limit($job->position),5}}
                        </td>
                        <td class="col-md-2">
                            {{Str::limit($job->tehnology),5}}
                        </td>
                        <td class="col-md-2">
                             {{$job->last_date}}
                        </td>
                        <td>
                            <a href="{{route('jobs.show',$job->id,$job->slug)}}">
                                <button type="button" class="btn btn-outline-primary">Дэлгэрэнгүй</button>
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
                
            </table>
            {{$jobs->appends(request()->except('page'))->links()}}
       
         
        <div>
           
        </div>
        
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

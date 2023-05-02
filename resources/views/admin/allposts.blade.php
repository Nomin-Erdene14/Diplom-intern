<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Intern</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <script src="https://kit.fontawesome.com/72b31b3e61.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    @include('partialsjob.head')
    <style>
        .cropped {
         width: 150px; /* width of container */
         height: 250px; /* height of container */
         overflow: hidden;
         
     }
     
     .cropped img {
         margin: -10px 0px 0px -180px;
     }
         </style> 
</head>

<body style="background-color:white">
    <div class="container-xxl bg-white p-0">
       @include('partialsjob.Nav')
       {{-- Baih ystoi shvv --}}
       <div class="container-xxl py-5 bg-primary hero-header">
        <div class="container my-3 py-3 px-lg-3">
             <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated slideInDown">Мэдээ мэдээлэл</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    
                </div> 
            </div>
        </div>
    </div>
    {{-- ene hurtel --}}
    <!-- Projects Start -->
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
               
                <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-12 text-center">
                        {{-- <ul class="list-inline mb-5" id="portfolio-flters">
                            <li class="mx-2 active" data-filter="*">All</li>
                            
                        </ul> --}}
                    </div>
                </div>
                <div class="row g-4 portfolio-container">
                @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 portfolio-item second wow fadeInUp" data-wow-delay="0.3s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100  cropped" src={{asset('storage/'.$post->image)}} alt="" width=100px >
                            <div class="portfolio-overlay">
                                <a class="btn btn-square btn-outline-light mx-1" href="img/portfolio-2.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-square btn-outline-light mx-1" href="{{route('seepost',[$post->id])}}"><i class="fa fa-link"></i></a>
                            </div>
                        </div>
                        <div class="bg-light p-4">
                            <p class="text-primary fw-medium mb-2">{{$post->title}}</p>
                            <h5 class="lh-base mb-0">
                                {!!  substr(strip_tags($post->content), 0, 50) !!}</a>
                        </div>
                        
                    </div>
                </div>
               
                @endforeach
                </div>
                <br><br>
                {{-- <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div> --}}
          
        <!-- Projects End -->
</div></div>
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
        </div>
</body>

</html>
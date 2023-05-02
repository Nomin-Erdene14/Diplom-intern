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
                    <h1 class="text-white animated slideInDown">Мэдээ л</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    
                </div> 
            </div>
        </div>
    </div>
    {{-- ene hurtel --}}
    <div class="container">
        <div class="row">
        <a href="{{route('reportpdf')}}">
            <button class="btn btn-primary"> Эрэлттэй технологиор тайлан авах   </button>
        </a>

    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">3</th>
            <th scope="col">Нэр</th>
            <th scope="col">Имэйл</th>
            <th scope="col">Бүртгэгдсэн</th>
          </tr>
        </thead>
        @foreach($datas as $data)
        <tbody>
          <tr>
            <th scope="row">{{$data->id}}</th>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->created_at}}</td>
          </tr>
          
          
        </tbody>
        @endforeach
      </table>
    </div>
    </div>
      

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
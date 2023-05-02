<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Intern</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
     <style>

     </style>
    @include('partialsjob.head')
</head>

<body style="background-color:white">
    <div class="container-xxl bg-white p-0">
       @include('partialsjob.Nav')
       {{-- Baih ystoi shvv --}}
       <div class="container-xxl py-5 bg-primary hero-header ">
      
            <div class="row g-5 py-5">
               
                {{-- <div class="col-12 text-center">
                    <h1 class="text-white animated slideInDown">Компаны дэлгэрэнгүй</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    
                </div> --}}
            </div>
        </div>
    </div>
    {{-- ene hurtel --}}
    <div class="container ">
    
        <div class="row">
        <div class="col ">
             <h1 class="col-12 text-center animated slideInDown"> Компаны дэлгэрэнгүй</h1> <br>
           <div class="card ">
            @if(empty($company->cover_photo))
                        <img class="center"src="{{URL('avatar\companyCover.jpg')}}" height="400px">
                    @else
                        <img src="{{URL('upload/coverphoto')}}/{{$company->cover_photo}}" style="width: 100%; height: 337px; object-fit: scale-down; " >
            @endif
        {{-- NAV Start --}}
         <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active center" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Бидний тухай</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Зарлагдсан дадлага</button>
              <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Холбоо барих</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="text-center">
                   <br> 
                   @if(empty($company->logo))
                   <img src="{{URL('avatar\pro.jpg')}}" style="border-radius: 300px" width="100px">
               @else
                   <img src="{{URL('upload/logo')}}/{{$company->logo}}" class="box" style="width: 10%;  border-radius: 300px " >
               @endif  
                  </div>
                <p  class="text-center">Компани нэр: {{$company->cname ?? ''}}</p> 
                <hr class="border border-danger border-1 opacity-20">
                    <p style="margin: 10px"> <strong>Тайлбар:</strong> <br> {{$company ->description ?? ''}}</p> 
                     <p style="margin: 10px" > <strong>Нэмэлт мэдээлэл:</strong> <br> {{$company->slogan ?? ''}}</p> 
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                        <td class="col-md-1"></td>
                        <td class="col-md-2"> <b>Гарчиг</b> </td>
                        <td class="col-md-4"> <b>Үүрэг</b> </td>
                        <td class="col-md-2"> <b>Технологи</b> </td>
                        <td class="col-md-2"> <b>Сүүлийн хугацаа</b> </td>
                        <td class="col-md-2"></td>
                    </thead>
                    <tbody>
                        @foreach($company->jobs as $job)
                        <tr>
                            <td class="col-md-1">
        
                            @if(empty(auth::user()->company->logo))
                            <img class="center"src="{{URL('/avatar/logo.png')}}" style="width:80px;  border-radius: 300px" >
                        @else
                            <img src="{{URL('upload/logo')}}/{{auth::user()->company->logo}}" style="width: 80px;  border-radius: 300px ">
                        @endif    
                        
                        </td>
                            <td class="col-md-2">
                                {{$job->title ?? ''}}
                               <div class="fast"> <h6>{{$job->type}}</h6> </div> 
                            </td>
                            <td class="col-md-4">
                                 {{$job->position ?? ''}}
                            </td> 
                            <td class="col-md-2">
                                {{$job->tehnology ?? ''}}
                           </td>
                            <td class="col-md-2">
                                 {{$job->last_date ?? ''}}
                            </td>
                            <td class="col-md-2">
                                <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                    <button type="button" class="btn btn-outline-primary">Дэлгэрэнгүй</button>
                                </a>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> 
           
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                     <p  style="margin: 10px"> <strong>Хаяг: </strong> <br> {{$company->address}}</p>
                     <p  style="margin: 10px"> <strong>Утас:</strong><br>  {{$company->phone}}</p>
                     <p style="margin: 10px"><strong>Вэб сайт:</strong> <br> {{$company->website}}</p> 
            </div>
          </div>
         {{-- NAV end --}}
        </div>  
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
@include('partialsjob.footer')
</body>

</html>
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
            <div>
            @if (Session::has('MessageApply'))
                <div class="alert alert-success">
            {{Session::get('MessageApply')}}
                @endif
            </div>
            </div>
             <div>
                <div>
            @if (Session::has('Messagesave'))
        <div class="alert alert-success">
        {{Session::get('Messagesave')}}
        @endif
            </div>
            </div>
            <div>
              @if (Session::has('message'))
                  <div class="alert alert-success">
              {{Session::get('message')}}
                  @endif
              </div>
              </div>
              <div>
                @if (Session::has('error-message'))
                    <div class="alert alert-danger">
                {{Session::get('error-message')}}
                    @endif
                </div>
                </div>
    {{-- Sessionend? --}}
    <div class="container">
    <div class="row">
      <h1 class="text-center mb-5">Зарын дэлгэрэнгүй</h1>
     <div class="col-md-8" >
      <div class="card">
        <div class="card-header" style="color: darkorchid">
            {{$job->title}} 
         </div>
          <ol class="list-group list-group-numbered">
              <li class="list-group-item d-flex justify-content-between align-items-start">
               
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Ажлын байр</div>
                  {{$job->role}}
                </div>
              </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Тавигдах шаардлага</div>
                  {{$job->description}}
                </div>
              </li>

              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Чиг үүрэг</div>
                  {{$job->position}}
                </div>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Ашиглах технологи</div>
                  {{$job->tehnology}}
                </div>
              </li>
              
              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Дадлага хийх байршил</div>
                  {{$job->address}}
                </div>
              </li>

              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Цалин</div>
                  {{$job->salary}}
                </div>
              </li>

              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">7 хоногт ажиллах цаг</div>
                  {{$job->time}}
                </div>
              </li>

              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Төлөв</div>
                  {{$job->type}}
                </div>
              </li>

              <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Дадлага Зарлагдсан огноо:</div>
                  {{$job->created_at}}
                </div>
              </li>
            </ol>
           </div><br>
           <div style="display:inline-block">
            @if (Auth::check() && Auth::user()->user_type == 'simple_user')
            @if(!$job->checkApplication())
            <form action="{{route('apply',[$job->id])}}" method="POST">
              @csrf
               <button type="submit" class="btn btn-success ">CV илгээх</button>
            </form>
               @else
            @endif
        @endif
        </div>
           <div style="display:inline-block">
            @if (Auth::check() && Auth::user()->user_type == 'simple_user')
              @if(!$job->checkSaved())
              <form action="{{route('savejob',[$job->id])}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-success">Хадгалах</button>
              </form>
                 @else
                 <form action="{{route('unsavejob',[$job->id])}}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-outline-dark">Хадгалахаа болих</button>
                 </form>
                  
                  @endif
              @endif
            </div>   
        </div>       
   {{-- Company heseg --}}
            <div class="col-md-4 ">
                {{-- &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  --}}
                
                <div class="card "> 
                <img style="text-align:center" src="{{URL('avatar/jobcover.png')}}"  width="350" >
                    <div >
                    <h3 class="h5 text-black mb-3 text-center">Компаны тухай</h3>
                        <div class="card-body">
                            <p><strong>Нэр:</strong><br>  {{$job->company->cname}}</p>
                            <p><strong>Веб хаяг:</strong><br>  {{$job->company->website}}</p>
                            <p>
                                <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" class="btn btn-outline-primary" style="width: 100%;">Компаны дэлгэрэнгүй</a>
                            </p>
                        </div>
                    
                    </div>
                    
                </div> <br>
                <div class="">
                {{-- <h6>Энэ дадлагын зарыг найздаа илгээ</h6> <i class="fa-regular fa-face-smile-halo"></i>
                  <div class="position-relative w-100 mt-3">
                    
                    <input  class="form-control border-0 shadow-5 rounded-pill w-100 ps-4 pe-5 shadow-sm p-3 mb-5 bg-white rounded" type="text" placeholder="И-Мэйл оруулах" style="height: 48px;">
                    <button type="submit"  class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2 rounded-pill">  <i class="fa fa-paper-plane text-primary fs-4"></i></button>
                </div> --}}
                <div class="card" style="width: 22.3rem;">
                  <div class="card-body">
                    <h5 class="card-title">Найздаа илгээ</h5>
                    <p class="card-text">Дээрх дадлагын зар найзын чинь хайж байсан зар мөн бол найздаа санал болгоод үз &nbsp; <i class="fa-sharp fa-regular fa-face-smile-wink"></i></p>
                    <a href="#" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#exampleModal" >Илгээе</a>
                  </div>
                </div>
               
                <form action="{{ route('email') }}" method="post">
                  @csrf
                     <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <input type="hidden" name="job_id" value="{{ $job->id }}">
                                <input type="hidden" name="job_slug" value="{{ $job->slug }}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Найздаа санал болгох</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <input  class="form-control border-0 shadow-5 rounded-pill w-100 ps-4 pe-5 shadow-sm p-3 mb-5 bg-white rounded" 
                                      type="text" placeholder="Нэрээ оруулах" style="height: 48px;" name="your_name">

                                      <input  class="form-control border-0 shadow-5 rounded-pill w-100 ps-4 pe-5 shadow-sm p-3 mb-5 bg-white rounded" 
                                      type="email" placeholder="Таны мэйл" style="height: 48px;" name="your_email">

                                      <input  class="form-control border-0 shadow-5 rounded-pill w-100 ps-4 pe-5 shadow-sm p-3 mb-5 bg-white rounded" 
                                      type="text" placeholder="Илгээх хүний нэр оруулна уу" style="height: 48px;" name="friend_name">

                                      <input  class="form-control border-0 shadow-5 rounded-pill w-100 ps-4 pe-5 shadow-sm p-3 mb-5 bg-white rounded" 
                                      type="email" placeholder="Илгээх майл оруулна уу" style="height: 48px;" name="friend_email">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Болих</button>
                                      <button type="submit" class="btn btn-primary">Илгээх</button>
                                    </div>
                                  </div>
                                </div>
                              </div> 
                  </form>
                </div>
                
            </div>          
            </div> 
            <!-- Button trigger modal -->
            <br>
            <div class="row">
             <h4>Санал болгох дадлагууд</h4>
              @foreach($jobRecomandations as $jobRecomandation)
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">{{Str::limit($jobRecomandation->title,15)}}</h5>
                <p class="card-text">{{Str::limit($jobRecomandation->description,50)}}</p>
                <p class="badge badge-success">{{$jobRecomandation->type}}</p> <br>
                <a href="{{route('jobs.show',[$jobRecomandation->id,
                $jobRecomandation->slug])}}" class="btn btn-primary">Дэлгэрэнгүй</a>
              </div>
            </div>
            @endforeach
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
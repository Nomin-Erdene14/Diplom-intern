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
            </div>
        </div>
    </div>
    {{-- ene hurtel --}}
<div >
    
<div class="container">
    <div class="row ">
        <h3 class="text-center mb-5">Бүх зарлагдсан дадлага</h3>
        {{-- <div>
            @if (Session::has('MessageError'))
                <div class="alert alert-error">
            {{Session::get('MessageError')}}
                @endif
            </div>
            </div> --}}
            
           
            <form action="{{route('alljobs')}}" method="GET">
                @csrf
                
                <div class="input-group" >
                    <div class="form-outline" style="width:94%">
                      <input type="search" name="search" id="form1" class="form-control" placeholder="Түлхүүр үгээр хайх" />
                    </div>
                    <button type="submit" class="btn btn-primary">
                      {{-- <i class="fas fa-search"></i> --}}
                       Хайх
                    </button>
                </div> <br>
           
                    <div  class="input-group">
                        <div class="input-group-prepend" style="width:94%">
                        <select name="type" class="form-control">
                            <option value="">Дадлагын нөхцөл</option>
                            <option value="intern">Байршиж дадлага хийх</option>
                            <option value="remote-intern">Онлайн дадлага хийх</option>
                        </select>
                         </div>
                        <button type="submit" class="btn btn-primary" > Хайх</button>
                    </div> <br>

                    <div class="input-group">
                        <div class="input-group-prepend" style="width:94%">
                        <select name="category_id" class="form-control">
                            <option value="">Дадлага хийхийг хүсэж буй чиглэлээр хайх</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary" >Хайх</button>
                    </div> <br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend" style="width:94%">
                        <select name="tehnology" class="form-control">
                            <option value="">Өөрийн чаддаг технологоор хайх</option>
                            <option value="java">java</option>
                            <option value="C++">C++</option>
                            <option value="Laravel">Laravel</option>
                            <option value="Ruby">Ruby</option>
                            <option value="Bootstrap">Bootstrap</option>
                            <option value="PHP">PHP</option>
                            <option value="phython">phython</option>
                            <option value="other">Бусад</option>
                        </select>
                       </div>
                       <button type="submit" class="btn btn-primary" > Хайх</i></button>
                    </div>
                
               
</form>
           
<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
                    <td class="col-md-1"></td>
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
                        </td>
                        <td class="col-md-4">
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
            
        <br><br>
            <div>{!! $jobs->withQueryString()->links('pagination::bootstrap-5') !!}</div> 
        <div>
           
        </div>
        
    </div>
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

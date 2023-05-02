<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Intern</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <style>
        div.a {
            position: absolute;
            right: 0;
        }
    </style>
    @include('partialsjob.head')
</head>

<body>
    <div class="container-xxl bg-white p-0">
       @include('partialsjob.nav')
       @include('partialsjob.nuur')
       @include('partialsjob.home')
       <div class="site-section bg-light">
        <div class="container"> <br><br><br>
            <div class="row">
                <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-center mb-5">Зарлагдсан ажлын байрны жагсаалт</h2>
                <div class="rounded border p-5 mb-5 bg-body-tertiary rounded table ">
                @foreach($jobs as $job)
                     <div style="align-right">
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="job-item d-block d-md-flex align-items-center  border-bottom @if($job->type=='intern')intern  @elseif($job->type=='remote-intern')remote-intern @endif;" style="width:100%">
                     </div>
                    <div class="company-logo blank-logo text-center text-md-left pl-3" style="width:20%">
                        @if(!empty($job->company->logo))
                        <img src="{{asset('upload/logo')}}/{{$job->company->logo}}" alt="Image" class="img-fluid mx-auto rounded border" width="100px">
                        @else
                    <img src="{{asset('avatar/pro.jpg')}}" alt="Image" class="img-fluid mx-auto rounded border"width="100px">
                        @endif
                    </div>
                    <div class="job-details h-100" style="width:60%">
                        <div class="p-3 align-self-center">
                        <h3>{{Str::limit($job->title,10)}}</h3>
                        <div class="d-block d-lg-flex">
                             <div class="mr-3"><span class="icon-suitcase mr-1"></span> Компани нэр:{{Str::limit($job->company->cname,10)}}</div> 
                            <div class="mr-3"><span class="icon-room mr-1"></span> Хаяг:{{ Str::limit($job->address,50)}}</div>
                            <div><span class="icon-money mr-1"></span>Цалин:{{$job->salary}}</div>
                        </div>
                        </div>
                    </div>
                    <div class="job-category d-md-flex justify-content-end col order-5 " style="width:20%">
                        @if($job->type=='intern')
                        <div class="p-3 "style="align-right">
                        <span class="text-info p-2 rounded border border-info">{{$job->type}}</span>
                        </div>
                        @elseif($job->type=='remote-intern')
                        <div class="p-3">
                        <span class="text-warning p-2 rounded border border-warning">{{$job->type}}</span>
                        </div>
                        
                        @endif
    
                    </div>
                    </a>
    
                @endforeach
    
    
                </div>
    
                <div class="col-md-12 text-center mt-5">
                    <a href="{{route('alljobs')}}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Бүгдийг харах</a>
                </div><br><br><br>
            </div>
    
        </div>
        </div>
    </div>
    
       @include('partialsjob.about')
       @include('partialsjob.facts')
       @include('partialsjob.service')
       @include('partialsjob.news')
       @include('partialsjob.project')
       
       @include('partialsjob.team')
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
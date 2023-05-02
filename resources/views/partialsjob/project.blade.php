<head>
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
</head><!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Мэдээ мэдээлэл<span></span></p>
            <h1 class="text-center mb-5">Нийтлэлүүд</h1>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                {{-- <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">All</li>
                    
                </ul> --}}
            </div>
        </div>
        <div class="row g-4 portfolio-container">
        @foreach($posts as $post)
        <div class="col-lg-4 col-md-6 col-sm portfolio-item second wow fadeInUp" data-wow-delay="0.3s">
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
                    <h5 class="lh-base mb-0">{!!  substr(strip_tags($post->content), 0, 80 )!!}</a>
                </div>
            </div>
        </div>
       
        @endforeach
        </div>
        <div class="col-md-12 text-center mt-5">
            <a href="{{route('allposts')}}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Бүгдийг харах</a>
        </div><br><br><br>
    </div>
    </div>       
<!-- Projects End -->
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Ангилал<span></span></p>
            <h1 class="text-center mb-5">Ангилалд харгалзах дадлагын зарууд</h1>
        </div>
        <div class="row g-4">
            @foreach ($categories as $category)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-search fa-2x"></i>
                    </div>
                    <h5 class="mb-3">{{$category->name}}</h5>
                    <p class="m-0">{{$category->name}} ангилалд хамааралтай <strong>{{$category->jobs->count()}}</strong>  зар байна.</p>
                    <a class="btn btn-square" href="{{route ('category.index',[$category->id])}}"><i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
            
           </div>
        </div>
    </div>
</div>
<!-- Service End -->
<!-- Facts Start -->
<div class="container-xxl bg-primary fact py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row g-3">
            <div class="col-md-8 col-lg-4 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-certificate fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{App\Models\Company::count()}}</h1>
                <p class="text-white mb-0">Компани</p>
            </div>
            <div class="col-md-8 col-lg-4 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-users-cog fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{App\Models\User::count()}}</h1>
                <p class="text-white mb-0">Бүртгэлтэй хэрэглэгчид</p>
            </div>
            {{-- <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-users fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">1234</h1>
                <p class="text-white mb-0">Satisfied Clients</p>
            </div> --}}
            <div class="col-md-8 col-lg-4 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-check fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{App\Models\Job::count();}}</h1>
                <p class="text-white mb-0">Дадлагын зар</p>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->
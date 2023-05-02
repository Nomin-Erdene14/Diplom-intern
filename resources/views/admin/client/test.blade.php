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

<body style="background-color:white">
<div class="container-xxl bg-white p-0">
       @include('partialsjob.Nav')
       {{-- Baih ystoi shvv --}}
       <div class="container-xxl py-5 bg-primary hero-header">
        <div class="container my-1 py-1 px-lg-1">
            
        </div>
    </div>
    {{-- ene hurtel --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Тест</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('test.store') }}">
                        @csrf
                        {{-- @foreach($categories as $category) --}}
                            <div class="card mb-3">
                                {{-- <div class="card-header">{{ $category->name }}</div> --}}
                
                                <div class="card-body">
                                   @foreach($questions as $question) 
                                         <div class="card @if(!$loop->last)mb-3 @endif"> 
                                            <div class="card-header">{{ $question->question_text }}</div>
                        
                                            <div class="card-body">
                                                <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                                @foreach($question->questionOptions as $option)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}"@if(old("questions.$question->id") == $option->id) checked @endif>
                                                        <label class="form-check-label" for="option-{{ $option->id }}">
                                                            {{ $option->option_text }}
                                                        </label>
                                                    </div>
                                                @endforeach

                                                @if($errors->has("questions.$question->id"))
                                                    <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                                                        <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach 
                                </div>
                            </div>
                        {{-- @endforeach --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Дуусгах
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partialsjob.footer')
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
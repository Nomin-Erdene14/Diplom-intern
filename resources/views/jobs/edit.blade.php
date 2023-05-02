
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
    <div class="container my-5 py-5 px-lg-5">
        
        </div> 
    </div>
</div>
{{-- ene hurtel --}}
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-8">
           <h3 style="text-align: center">Зар засах</h3>
            <div >
                <div>
                  @if (Session::has('message'))
                  <div class="alert alert-success">
                      {{Session::get('message')}}
                  </div>
                @endif
                  </div>
                </div>
               
                <div class="card-body">
                    <form action="{{ route('jobs.update', [$job->id, $job->slug]) }}" method="POST">
                        @csrf
                      
                        <div class="form-group">
                          <label  class="form-label">Дадлагын нэр оруулна уу</label>
                        <input type="text" name="title" id="" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}"  value="{{ $job->title }}">
                            @if($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                              </div> <br>
                        <div class="form-group">
                          <label class="form-label">Дадлагын талаарх мэдээлэл оруулна уу</label>
                            <textarea rows="5" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" >{{ $job->description }}</textarea>
                            @if($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                            </div><br>
                            <div class="form-group">
                              <label  class="form-label">Дадлага хийх ажлын байрны нэр оруулна уу</label>
                                <input type="text" name="role" id="" class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}"  value="{{ $job->role }}">
                                @if($errors->has('role'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div><br>
                           
                            <div class="form-group">
                              <label class="form-label">Дадлагын чиг үүргийн талаарх мэдээлэл оруулна уу</label>
                              <textarea rows="5" name="position" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" >{{ $job->position }}</textarea>
                                    @if($errors->has('position'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('position') }}<strong>
                                        </span>
                                @endif
                            </div><br>
                            <label class="form-label">Оюутаны эзэмшсэн байх шаардлагатай технологи</label>
                            <div class="form-group"  >
                              <select name="tehnology" class="form-control"  {{ $errors->has('tehnology') ? ' is-invalid' : '' }}" value="{{ $job->tehnology }}">
                                <option value=""  >--Сонго--</option>
                                 <option value="java"{{ $job->tehnology =='java' ? 'selected':'' }}>Java</option>
                                 <option value="laravel"{{ $job->tehnology =='laravel' ? 'selected':'' }}>Laravel</option>
                                 <option value="C++"{{ $job->tehnology =='C++' ? 'selected':'' }}>C++</option>
                                 <option value="ruby"{{ $job->tehnology =='ruby' ? 'selected':'' }}>Ruby</option>
                                 <option value="Bootstrap"{{ $job->tehnology =='Bootstrap' ? 'selected':'' }}>Bootstrap</option>
                                 <option value="PHP"{{ $job->tehnology =='PHP' ? 'selected':'' }}>PHP</option>
                                 <option value="phython"{{ $job->tehnology =='phython' ? 'selected':'' }}>phython</option>
                                 <option value="Other"{{ $job->tehnology =='Other' ? 'selected':'' }}>Бусад</option> 
                                 @if($errors->has('tehnology'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tehnology') }}</strong>
                                        </span>
                                @endif
                              </select>
                             
                            </div> <br>
                            <div class="form-group">
                              <label class="form-label ">Ангилал сонгоно уу</label>
                                <select name="category" class="form-control">
                                    @foreach(App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $job->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div><br>

                            <div class="form-group">
                              <label class="form-label">Дадлага хийх байршил оруулна уу</label>
                                <textarea name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Ажлын хаягаа оруулна уу?">{{ $job->address }}</textarea>
                                  @if($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                @endif
                            </div><br>

                            <label class="form-label">Цалингийн мэдээлэл оруулна уу</label>
                                <input name="salary" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $job->salary }}"> 
                                @if($errors->has('salary'))
                                <div class="error" style="color:red">
                                    {{$errors->first('salary')}}
                                </div>
                                @endif <br>
                              <label class="form-label">Дадлагын төрөл</label>
                              <div class="form-group"  >
                                <select name="type" class="form-control" value= "{{$job->type}}">
                                    <option value="" >--Сонго--</option>
                                  <option value="intern" {{ $job->type =='intern' ? 'selected':'' }} >Байршиж дадлага хийх</option>
                                  <option value="remote-intern" {{ $job->type =='remote-intern' ? 'selected':'' }}>Онлайн дадлага хийх</option>
                                </select>
                              </div> <br>
                              <label class="form-label">7 хоног ажиллах ёстой цагийг оруулна уу</label>
                              <input name="time" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $job->time }}"> 
                              @if($errors->has('time'))
                              <div class="error" style="color:red">
                                {{$errors->first('time')}}
                               </div>
                            @endif <br>
                              {{-- dropdown type end --}}
                              <div class="form-group">
                                  <label for="status">Нийтлэх үү</label>
                                      <select name="status" class="form-control">
                                          <option value="1" {{ $job->status =='1' ? 'selected':'' }}>Тийм</option>
                                          <option value="0" {{ $job->status =='0' ? 'selected':'' }}>Үгүй</option>
                                  </select>
                              </div> <br>
                              <div class="form-group">
                                <label class="form-label">Дадлагийн анкет хүлээн авах сүүлийн хугацаа</label>
                                  <input type="text" name="last_date" id="datepicker" class="form-control {{ $errors->has('last_date') ? ' is-invalid' : '' }}" placeholder="Ажлын байрнны анкет хүлээн авах хугацаа" value="{{ $job->last_date }}">
                                  @if($errors->has('last_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_date') }}</strong>
                                        </span>
                                @endif <br>
                              </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-outline-primary">Засах</button>
                              </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
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


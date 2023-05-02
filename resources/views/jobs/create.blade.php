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
        {{-- <div class="row g-5 py-5">
            {{-- <div class="col-12 text-center">
                <h1 class="text-white animated slideInDown">Компаны мэдээлэл</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                
            </div> --}}
        </div> 
    </div>
</div>
{{-- ene hurtel --}}
<div class="container "> 
<div class="row justify-content-center">
  <div class="col-md-8" >
   <h3>Дадлагын зар үүсгэх</h3>
  <form action="{{route('jobs.store')}}" method="POST"> 
      @csrf
      <form  class="table ">
        <div class="mb-3 form-group" >
          <div>
            @if (Session::has('MessageJob'))
        <div class="alert alert-success">
        {{Session::get('MessageJob')}}
        @endif
          </div>
           
          <label for="exampleInputEmail1" class="form-label">Гарчиг оруулна уу</label>
          <input name="title" type="text" class="form-control">
          @if($errors->has('title'))
          <div class="error" style="color:red">
            {{$errors->first('title')}}
           </div>
        @endif
        
          <label  class="form-label">Дадлага хийх ажлын байрны нэр оруулна уу</label>
          <input name="role" type="tetx" class="form-control" > 
          @if($errors->has('role'))
          <div class="error" style="color:red">
            {{$errors->first('role')}}
           </div>
        @endif
          <label class="form-label">Дадлагын талаарх мэдээлэл оруулна уу</label>
          <textarea name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> </textarea>
          @if($errors->has('description'))
          <div class="error" style="color:red">
            {{$errors->first('description')}}
           </div>
        @endif
        <label class="form-label">Дадлагын чиг үүргийн талаарх мэдээлэл оруулна уу</label>
          <textarea name="position" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> </textarea> 
          @if($errors->has('position'))
          <div class="error" style="color:red">
            {{$errors->first('position')}}
           </div>
        @endif
        
       <label class="form-label">Оюутаны эзэмшсэн байх шаардлагатай технологи</label>
        <div class="form-group"  >
          <select name="tehnology" class="form-control">
            <option value="">--Сонго--</option>
             <option value="java">Java</option>
             <option value="laravel">Laravel</option>
             <option value="C++">C++</option>
             <option value="ruby">Ruby</option>
             <option value="Bootstrap">Bootstrap</option>
             <option value="PHP">PHP</option>
             <option value="phython">phython</option>
             <option value="Other">Бусад</option>
          </select>
        </div> 
        
      
        

          @if($errors->has('tehnology'))
          <div class="error" style="color:red">
            {{$errors->first('tehnology')}}
           </div>
        @endif

          {{-- dropdown start --}}
          <label class="form-label">Ангилал сонгоно уу</label>
          <div class="form-group">
            <select name="category" class="form-control">
                @foreach (App\Models\Category::all() as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
               </select>
          </div>
          {{-- dropdown end --}}
        </div>
        <label class="form-label">Дадлага хийх байршил оруулна уу</label>
          <input name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
          @if($errors->has('address'))
          <div class="error" style="color:red">
            {{$errors->first('address')}}
           </div>
        @endif

          <label class="form-label">Цалингийн мэдээлэл оруулна уу</label>
          <input name="salary" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
          @if($errors->has('salary'))
          <div class="error" style="color:red">
            {{$errors->first('salary')}}
           </div>
        @endif 


        {{-- dropdown type start --}}
        <label class="form-label">Дадлагын төрөл</label>
          <div class="form-group"  >
            <select name="type" class="form-control">
              <option value="">--Сонго--</option>
               <option value="intern">Байршиж дадлага хийх</option>
               <option value="remote-intern">Онлайн дадлага хийх</option>
            </select>
          </div> 
          {{-- dropdown type end --}}

          <label class="form-label">7 хоног ажиллах ёстой цагийг оруулна уу</label>
          <input name="time" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> 
          @if($errors->has('time'))
          <div class="error" style="color:red">
            {{$errors->first('time')}}
           </div>
        @endif

        <label class="form-label">Дадлагийн анкет хүлээн авах сүүлийн хугацаа</label>
          <input  id="datepicker" type="date" class="form-control input-sm shadow-sm px-2" id="todate" name="last_date"> 
          @if($errors->has('last_date'))
          <div class="error" style="color:red">
            {{$errors->first('last_date')}}
           </div>
        @endif  
          
          {{-- radio status start --}}
          <label class="form-label">Нийтлэх үү</label>
          <div class="form-group"  >
            <select name="status" class="form-control">
               <option value="1">Тийм</option>
               <option value="0">Үгүй</option>
            </select>
          </div>  
          
        {{-- radio status end --}} <br>


        <button type="submit" class="btn btn-outline-primary">Нийтлэх</button>
      </form>
        
    </form>
  </div>
</div>  
</div>
</div> 
<br><br><br>
      

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

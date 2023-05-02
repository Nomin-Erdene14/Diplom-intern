@extends('layouts.app')

@section('content')

<div class="container ">
    <div>
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
          
<div class="row">   
<div class="col-md-8 ">
  <div class="card ">
      <div class="card-header">
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
               <button type="submit" class="btn btn-outline-success ">CV илгээх</button>
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
                <button type="submit" class="btn btn-success">Хадгалах</button>
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
<div class="col">
    &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 
    <img style="text-align:center;" src="{{URL('avatar/jobcover.png')}}"  width="300" >
    <div class="card "> 
       
        <div >
           
            <div class="card-header">
              Дадлага зарлагч
            </div>
            <div class="card-body">
                   <p><strong>Нэр:</strong><br>  {{$job->company->cname}}</p>
                   <a href="{{route('company.index', [$job->company->id, $job->company->slug])}}">
                    <button type="button" class="btn btn-outline-primary">Дэлгэрэнгүй</button>
                   </a>
            </div>
           
        </div>
       
       
    </div>
            
</div>  
  
</div> 
</div>
</div>
  
@endsection
    </body>
</html>

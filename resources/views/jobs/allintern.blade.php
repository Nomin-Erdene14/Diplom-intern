@extends('layouts.app')

@section('content')

<div class="container ">
    
 <div class="row">
  <div class="col-md-18 ">
    {{-- <div class="card">
       </div> --}}
       <h4>Дадлага зарлагчийн үүсгэсэн дадлагууд</h4> <br>
       <table class="shadow-lg p-3 mb-5 bg-body-tertiary rounded table  ">
        <thead class="table-light">
            <td ></td>
            <td >Гарчиг</td>
                    <td >Чиг үүрэг</td>
                    <td >Хугацаа</td>
            <td ></td>
        </thead>
        <tbody>
            @foreach($interns as $intern)
            <tr>
                <td >
                    <img src="{{URL('/avatar/logo.png')}}" width="50">
                </td>
                <td>
                    @if($intern->user_type==='simple_user')
                  {{ $user->name}}
              @endif <br>
                            <div class="fast"> <h6 style="color: burlywood" >Төрөл:{{Str::limit($job->type),10}}</h6> </div> 
                </td>
                <td>
                    {{Str::limit($job->role),1}}
                </td>
                <td>
                     {{$job->last_date}}
                </td>
                <td>
                    <a href="{{route('jobs.show', [$job->id, $job->slug])}}">
                        <button type="submit" class="btn btn-outline-success">Дэлгэрэнгүй</button>
                    </a>
                    <a href="{{route('jobs.edit',[$job->id,$job->slug])}}">
                        <button type="submit" class="btn btn-outline-primary">Засах</button>
                    </a>
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

       
       
    
            
  </div>  
  
 </div> 
</div>
@endsection
</body>
</html>

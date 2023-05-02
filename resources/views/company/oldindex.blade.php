@extends('layouts.app')

@section('content')
<head>
    <style>
        .center-logo {
            text-align: center;
}
.box {
    width: 300px;
    height: 150px;
    background: #ffb6c1;
    border: 2px solid #f08080;
    border-radius: 20px;
}

    </style>
</head>
<div class="container ">
    
<div class="row">
<div class="col ">
   <div class="card ">
        <div class="card-header">
            Компаны тухай
        </div>
        <div class="company-profile ">

            @if(empty($company->cover_photo))
                <img class="center"src="{{URL('avatar\companyCover.png')}}" >
            @else
                <img src="{{URL('upload/coverphoto')}}/{{$company->cover_photo}}" style="width: 100%; height: 337px; object-fit: scale-down; " >
            @endif

        </div>
        
 {{-- NAV Start --}}
 <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active center" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Бидний тухай</button>
      <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Зарлагдсан дадлага</button>
      <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Холбоо барих</button>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
        <div class="text-center">
           <br> 
           @if(empty($company->logo))
           <img src="{{URL('avatar\pro.jpg')}}" style="border-radius: 300px" width="100">
       @else
           <img src="{{URL('upload/logo')}}/{{$company->logo}}" class="box" style="width: 10%;  border-radius: 300px " >
       @endif  
          </div>
        <p  class="text-center">Компани нэр: {{$company->cname}}</p> 
        <hr class="border border-danger border-1 opacity-20">
            <p style="margin: 10px"> <strong>Тайлбар:</strong> <br> {{$company ->description}}</p> 
             <p style="margin: 10px" > <strong>Нэмэлт мэдээлэл:</strong> <br> {{$company->slogan}}</p> 
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
        <table class=" p-3 mb-5 bg-body-tertiary rounded table ">
            <thead class="table-light">
                <td></td>
                <td >Postion</td>
                <td >Address</td>
                <td >Date</td>
                <td></td>
            </thead>
            <tbody>
                @foreach($company->jobs as $job)
                <tr>
                    <td >

                    @if(empty(auth::user()->company->logo))
                    <img class="center"src="{{URL('/avatar/logo.png')}}" style="width: 80;  border-radius: 300px" >
                @else
                    <img src="{{URL('upload/logo')}}/{{auth::user()->company->logo}}" style="width: 80;  border-radius: 300px ">
                @endif    
                
                </td>
                    <td>
                        {{$job->position}}
                       <div class="fast"> <h6>{{$job->type}}</h6> </div> 
                    </td>
                    <td>
                         {{$job->address}}
                    </td>
                    <td>
                         {{$job->last_date}}
                    </td>
                    <td>
                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button type="button" class="btn btn-outline-primary">Дэлгэрэнгүй</button>
                        </a>
                        
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
             <p  style="margin: 10px"> <strong>Хаяг: </strong> <br> {{$company->address}}</p>
             <p  style="margin: 10px"> <strong>Утас:</strong><br>  {{$company->phone}}</p>
             <p style="margin: 10px"><strong>Вэб сайт:</strong> <br> {{$company->website}}</p> 
    </div>
  </div>
 {{-- NAV end --}}


    
</div>  
</div> 


  
@endsection
</body>
</html>

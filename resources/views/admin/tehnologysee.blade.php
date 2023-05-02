@include('partialsjob.link')
<head>
  <style>
    .no-border {
    border: 0;
    box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
}
  </style>
</head>
<body class="g-sidenav-show  bg-gray-200">
  @include('admin.leftmenu')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav  justify-content-end">
            
            <li class="nav-item d-flex align-items-center">
              <a href="../pages/sign-in.html" class="nav-link text-body font-weight-bold px-0">
                <i class="bi bi-person-fill"></i>
                <a class="d-sm-inline d-none">
                @if(Auth::user()->user_type === 'employer')
                                    {{ Auth::user()->company->cname  }}
                                @else
                                    {{ Auth::user()->name }}
                                @endif
                  </a>               
              </a>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Бүх дадлагын зарууд</h6>
              </div>
            </div>
            <div class="container">
              @if (Session::has('message'))
                  <div class="alert alert-danger">
                      {{Session::get('message')}}
                  </div>
              @endif  <br>
              <div class="row">
               
           <form action="{{route('report.tehnology.see')}}" method="GET">
            @csrf
            <div class="container">
              <div class="row">
                <div class="container-fluid">
                  <div class="form-group row">
                    <label for="date" class="col-form-label col-sm-2">Эхлэл</label>
                    <div class="col-sm-3">
                      <input type="date" class="form-control input-sm shadow-sm px-2" id="fromdate" name="fromdate" >
                    </div> 
                    <div class="col-sm-2">
                      <button type="submit" class="btn shadow-sm float-right" name="search" title="search">хайх</button>
                    </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="col-sm-3 float-right ">
                                        <input type="text" class="form-control input-sm shadow-sm px-2 float-right" id="haih" name="haih"placeholder="Хайх">
                                      </div>
                                      <div class="col-sm-1">
                                        <button type="submit" class="btn shadow-sm float-right" >хайх</button>
                                      </div>
                      </div> 
                     <div class="form-group row">
                    <label for="date" class="col-form-label col-sm-2">Дуусах</label>
                    <div class="col-sm-3">
                      <input type="date" class="form-control input-sm shadow-sm px-2" id="todate" name="todate" >
                    </div>
                    
                  </div>
                   </div>
              </div>
            </div>
           </form>
           {{-- <div class="container">
            <div class="container-fluid">
            <form action="" method="get" class="">
            <div class="input-group ">
             <select name="" id="" class="form-control dropdown shadow-sm px-2 dropdown">
               <option value="">--Сонго--</option>
               <option value="">--Тэхнологи--</option>
               <option value="">--Сонго--</option>
               
             </select> &nbsp;
             <button type="submit" class="btn btn-primary ">
              хайх</button>
              
            </div>
         </form>
         
            </div>
           </div> --}}
           
                </div>
              </div>
              <div class="col-md-16">
                <div class="table-responsive">

                  <table class="table table-striped table-hover " style="width: 621px; left: 0px; bottom: 10px;">
                                  <thead>
                                    <tr>
                                      
                                      <th class="col-md-1" scope="col">id</th>
                                      <th class="col-md-2" scope="col">Гарчиг</th>
                                      <th class="col-md-2" scope="col">Дэлгэрэнгүй</th>
                                      <th class="col-md-2" scope="col">Role</th>
                                      <th class="col-md-8" scope="col">Чиг үүрэг</th>
                                      <th class="col-md-8" scope="col">Технологи</th>
                                      <th class="col-md-1" scope="col">Хаяг</th>
                                      
                            
                                      <th class="col-md-2" scope="col">Цалин</th>
                                      <th class="col-md-2" scope="col">Цаг</th>
                                      <th class="col-md-8" scope="col">Төрөл</th>
                                      <th class="col-md-8" scope="col">Статус</th>
                                      <th class="col-md-2" scope="col">Дуусах хугацаа</th>
                                      <th class="col-md-8" scope="col">Үүсгэсэн өдөр</th>
                                     
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($tehs as $teh)
                                    <tr>
                                      
                                        <th class="col-md-2 px-4" > {{ $teh->id}} </th> 
                                       <th class="col-md-2 px-4" > {!!  substr(strip_tags($teh->title), 0, 10 )!!} </th> 
                                       <th class="col-md-2 px-4" > {!!  substr(strip_tags($teh->description), 0, 10 )!!} </th> 
                                       <th class="col-md-2 px-4" > {!!  substr(strip_tags($teh->role), 0, 10 )!!} </th> 
                                       <th class="col-md-2 px-4" > {!!  substr(strip_tags($teh->position), 0, 10 )!!} </th> 
                                       <th class="col-md-2 px-4" > {!!  substr(strip_tags($teh->tehnology), 0, 10 )!!} </th> 
                                       <th class="col-md-2 px-4" > {!!  substr(strip_tags($teh->address), 0, 10 )!!} </th> 
                                       <th class="col-md-2 px-4" > {!!  substr(strip_tags($teh->salary), 0, 10 )!!} </th> 
                                       <th class="col-md-2 px-4" > {!!  substr(strip_tags($teh->time), 0, 10 )!!} </th> 
                                       <th class="col-md-2 px-4" > {!!  substr(strip_tags($teh->type), 0, 10 )!!} </th> 
                                       <th class="col-md-2 px-4" > {!!  substr(strip_tags($teh->status), 0, 10 )!!} </th> 
                                       <th class="col-md-2 px-4" > {!!  substr(strip_tags($teh->last_date), 0, 10 )!!} </th> 
                                       <th class="col-md-2 px-4" > {!!  substr(strip_tags($teh->created_at), 0, 10 )!!} </th> 
                            
                            
                                       
                                           
                                   </tr>
                                   @endforeach
                                    {{-- <div>{!! $datas->links('pagination::bootstrap-5') !!}</div>  --}}
                                    
                                </tbody>
                                <div class="ps__rail-x" style="width: 621px; left: 0px; bottom: 10px;">
                                    ::before
                                    <div class="ps__thumb-x"style="left: 0px; width: 195px;">
                                        ::before
                                    </div>
                                </div>
                              </table>
                </div>
                              
                              
          </div>
          </div>
        </div>
      </div>
     
    </div>
  </main>
  @include('partialsjob.script')
  
</body>

</html>

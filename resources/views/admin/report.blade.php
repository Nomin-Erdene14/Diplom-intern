@include('partialsjob.link')

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
                <h6 class="text-white text-capitalize ps-3">Бүх Хэрэглэгчид</h6>
              </div>
            </div>
            <div class="container">
              @if (Session::has('message'))
                  <div class="alert alert-success">
                      {{Session::get('message')}}
                  </div>
              @endif  <br>
              <div class="row">
               
           <form action="{{route('report')}}" method="GET">
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
                                        <input type="text" class="form-control input-sm shadow-sm px-2 float-end" id="name" name="name"placeholder="Хайх">
                                      </div>
                                      <div class="col-sm-1">
                                        <button type="submit" class="btn shadow-sm float-right" name="search" title="search">хайх</button>
                                      </div>
                      </div> 
                     <div class="form-group row">
                    <label for="date" class="col-form-label col-sm-2">Дуусах</label>
                    <div class="col-sm-3">
                      <input type="date" class="form-control input-sm shadow-sm px-2" id="todate" name="todate" >
                      
                    </div>
                    <a href="{{route('reportpdf')}}">
              <button class="btn btn-primary float-end"> Хэвлэх</button></a>
                  </div>
                   </div>
              </div>
            </div>
           </form>
           <br></div>
              </div>
              <div class="col-md-16">
               
                  <table class="table">
                                  <thead>
                                    <tr>
                                      
                                      <th class="col-md-1" scope="col">id</th>
                                      <th class="col-md-2" scope="col">Type</th>
                                      <th class="col-md-2" scope="col">Name</th>
                                      <th class="col-md-2" scope="col">email</th>
                                      <th class="col-md-8" scope="col">date</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($datas as $data)
                                      <tr>
                                          
                                          <th class="col-md-2" > {{$data->id}} </th>
                                          <td class="col-md-2" >{{$data->user_type}}</td>
                                          <td class="col-md-2" >{{$data->name}}</td>
                                          <td class="col-md-2">
                                            {{$data->email}}
          
                                          </td>
                                          <td class="col-md-2">
                                            {{$data->created_at}}
          
                                          </td>
                                           
                                     </tr>
                                    
                                      @endforeach
                                    {{-- <div>{!! $datas->links('pagination::bootstrap-5') !!}</div>  --}}
                                </tbody>
                              </table>
                              
          </div>
          </div>
        </div>
      </div>
     
    </div>
  </main>
  @include('partialsjob.script')
  
</body>

</html>
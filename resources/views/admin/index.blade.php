@include('partialsjob.link')
<head>
    <style>
        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
            -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }
        .badge-success {
            color: #fff;
            background-color: #38c172;
            }
        .badge-primary {
            color: #fff;
            background-color: #3490dc;
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
               
                <button class="btn btn-primary">
                <a class="dropdown-item" href="{{ route('allposts') }}">Нийтлэлүүд</a>
            </button> &nbsp; &nbsp;&nbsp;   
           
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
                <h6 class="text-white text-capitalize ps-3">Постууд</h6>
              </div>
            </div>
            <div class="container">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <div class="col-md-16">
                     <table class="table">
                                    <thead>
                                      <tr>
                                      
                                        <th class="col-md-1" scope="col">Зураг</th>
                                        <th class="col-md-1" scope="col">Гарчиг</th>
                                        <th class="col-md-2" scope="col">Текст</th>
                                        <th class="col-md-2" scope="col">Нийтлэсэн өдөр</th>
                                        <th class="col-md-2" scope="col">Статус</th>
                                        <th class="col-md-8" scope="col">Үйлдлүүд</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                        <tr>
                                            
                                            <th class="col-md-" > <img src="{{URL('storage/'. $post->image)}}" width="80px"> </th>
                                            <td class="col-md-1" >{{Str::limit($post->title,20)}}</td>
                                            <td class="col-md-2" >{{Str::limit($post->content,20)}}</td>
                                            <td class="col-md-2" >{{($post->created_at->diffForHumans())}}</td>
                                            <td class="col-md-2">
                                                @if($post->status=='0')
                                                <a href="{{route('post.toggle',[$post->id])}}" class="badge badge-primary">Нийтлээгүй</a>
                                                @else
                                                <a href="{{route('post.toggle',[$post->id])}}" class="badge badge-success">Нийтэлсэн</a>
                                            @endif
            
                                            </td>
                                           
                                            <td class="col-md-8 inline">
                                                <div class="row"></div>
                                                <a href="{{route('post.edit',[$post->id])}}"><button class="btn btn-primary col">Засах</button>
                                                </a>
                                                <button type="button" class="btn btn-danger col" data-bs-toggle="modal" data-bs-target="#exampleModal{{$post->id}}">
                                                   Устгах
                                                </button>
                                            </div>
                                            </td>
                                          
                                            <!-- Button trigger modal -->
                                                
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Нийтлэл устгах</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        Та энэхүү нийтлэл усгахдаа итгэлтэй байна уу
                                                        </div>
                                                        <form action="{{route('post.delete')}}" method="POST">@csrf
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id" value="{{$post->id}}">
                                                        <button  type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Буцах</button>
                                                        <button  type="submit" class="btn btn-danger"data-bs-target="#exampleModal">Устга</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                    </div>
                                                </div>
                                       </tr>
                                      
                                        @endforeach
                                      
                                    </tbody>
                                </table>
                                <br><br>
                                <div>{!! $posts->withQueryString()->links('pagination::bootstrap-5') !!}</div> 
                            <div>
                    </div>
                 </div> 
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
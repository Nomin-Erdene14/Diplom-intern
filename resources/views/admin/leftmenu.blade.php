<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" {{ url('/') }} " target="_blank">
        <img src="{{asset('material-dashboard-master/assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Админ</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('dashboard')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Нүүр</span>
          </a>
        </li>

        <li class="nav-item">
          <a href="#submenu3" data-bs-toggle="collapse" class="nav-link text-white ">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
              <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z"/>
            </svg> &nbsp; &nbsp; 
            <span class="nav-link-text ms-1">  Нийтлэл</span> 
          </a>
            
          <ul class="sub-menu collapse" id="submenu3" data-bs-parent="#menu">
              <li class="w-100">
                  <a href="{{route('post.create')}}" class="nav-link px-0 right"> <span class="d-none d-sm-inline">Нийтлэл үүсгэх</span>  </a>
              </li>
              <li>
                  <a href="{{route('dashboard')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Нийтлэлүүд</span>  </a>
              </li>
              <li>
                <a href="{{route('post.trash')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Устгагдсан нийтлэлүүд</span> </a>
            </li>
          </ul>
      </li>


        {{-- <li class="nav-item">
          <a class="nav-link text-white " href="{{route('post.create')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Нийтлэл үүсгэх</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('post.trash')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
              </svg>
            </div>  &nbsp;
            <span class="nav-link-text ms-1">Устгагдсан нийтлэлүүд</span>
          </a>
        </li> --}}
        <li class="nav-item">
          <a href="#submenu2" data-bs-toggle="collapse" class="nav-link text-white ">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
              <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z"/>
            </svg> &nbsp; &nbsp; 
            <span class="nav-link-text ms-1">  Тайлан</span> 
          </a>
            
          <ul class="sub-menu collapse" id="submenu2" data-bs-parent="#menu">
              <li class="w-100">
                  <a href="{{route('report')}}" class="nav-link px-0 right"> <span class="d-none d-sm-inline">Хэрэглэгчдийн тайлан</span>  </a>
              </li>
              <li>
                  <a href="{{route('report.tehnology')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Зарын тайлан</span>  </a>
              </li>
              <li>
                <a href="{{route('report.tehnology.see')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Технологийн тайлан</span> </a>
            </li>
          </ul>
      </li>
       

        
          <li class="nav-item">
            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link text-white ">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708Z"/>
              </svg> &nbsp; &nbsp; 
              <span class="nav-link-text ms-1">  Тест</span> </a>
            <ul class="sub-menu collapse" id="submenu1" data-bs-parent="#menu">
                <li class="w-100">
                    <a href="{{route('admin.questions.index')}}" class="nav-link px-0 right"> <span class="d-none d-sm-inline">Асуулт</span>  </a>
                </li>
                <li>
                    <a href="{{route('admin.options.index')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Сонголтууд</span>  </a>
                </li>
                <li>
                  <a href="{{route('admin.results.index')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Хариулт</span> </a>
              </li>
            </ul>
        </li>
     


        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('admin.user.view')}}">
            
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                </svg>
              </div>
            <span class="nav-link-text ms-1">Хэрэглэгчид</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{route('admin.categories.index')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-back" viewBox="0 0 16 16">
                  <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
                </svg>
              </div>
            <span class="nav-link-text ms-1">Ангилал</span>
          </a>
        </li>
       
        
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
             <i class="material-icons opacity-10">login</i>
            </div> &nbsp; {{ __('Гарах') }}
                                    </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
            </form>
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            </div>
          
          </a>
        </li>
        
      </ul>
    </div>
  </aside>
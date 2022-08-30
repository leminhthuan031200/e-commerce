<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white">
  <!-- Navbar Brand-->
  <a class="navbar-brand ps-3" href="{{route('home')}}"><h4><span class="badge badge-warning right"><b> H2T- SHOP </b></span></h4>

  </a>
  <!-- Sidebar Toggle-->
  <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
  <!-- Navbar Search-->
          <!-- Navbar Search-->
  <!-- Navbar-->
  {{-- <ul class="navbar-nav ms-md-12 me-1 me-lg-12">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth()->user()->name}}</span>
              @if(Auth()->user()->photo)
                <img class="img-profile rounded-circle"width="5%" src="{{Auth()->user()->photo}}">
              @else
                <img class="img-profile rounded-circle" src="{{asset('backend/img/avatar.png')}}">
              @endif</a>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#!">Settings</a></li>
              <li><a class="dropdown-item" href="#!">Activity Log</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#!">Logout</a></li>
          </ul>
      </li>
  </ul> --}}
  <ul class="navbar-nav align-items-center ms-auto">
      <li class="nav-item dropdown no-caret d-none d-md-block me-3">
          <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="fw-500">{{Auth()->user()->name}}</div>
          </a>
      </li>
      <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
              <!-- Example Alert 1-->
              @include('backend.notification.show')
      </li>
      <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications" id="messages" data-url="{{route('messages.five')}}">
          @include('backend.message.message')
        </li>
  <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-12">
      <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @if(Auth()->user()->photo)
            <img class="img-fluid" src="{{Auth()->user()->photo}}">
          @else
            <img class="img-fluid" src="{{asset('backend/img/avatar.png')}}">
          @endif</a>
      <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
          <h6 class="dropdown-header d-flex align-items-center">
              @if(Auth()->user()->photo)
              <img class="dropdown-user-img" src="{{Auth()->user()->photo}}">
            @else
              <img class="dropdown-user-img" src="{{asset('backend/img/avatar.png')}}">
            @endif</a>
              <div class="dropdown-user-details">
                  <div class="dropdown-user-details-name">{{Auth()->user()->name}}</div>
                  <div class="dropdown-user-details-email">{{Auth()->user()->email}}</div>
              </div>
          </h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('admin-profile')}}">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Thông tin
          </a>
          <a class="dropdown-item" href="{{route('change.password.form')}}">
              <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
              Thay đổi mật khẩu
          </a>
          <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('Đăng xuất') }}
          </a>
      </div>
      
  </li>
  </ul>
</nav>
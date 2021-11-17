<nav class="navbar p-0 fixed-top d-flex flex-row">
    {{-- <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
      <a class="navbar-brand brand-logo-mini" href="{{route('admin.index')}}"><img src="{{asset('backend/images/logo-mini.svg')}}" alt="logo" /></a>
    </div> --}}
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <ul class="navbar-nav w-100">

      </ul>
      <ul class="navbar-nav navbar-nav-right">

        <li class="nav-item">


            <a class="nav-link mb-2"  href="{{route('admin.supervisors.index')}}" >

             <i class="fas fa-users p-1" style="border-radius: 17px; color: gold; background: #00000066;"></i>   Supervisors

              </a>
        </li>




        <li class="nav-item dropdown border-left">
            <livewire:backend.navbar.notification-component />
        </li>



        <li class="nav-item dropdown">
          <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
            <div class="navbar-profile">
                @if (auth()->user()->user_image != '')

                <img class="img-xs rounded-circle" src="{{asset('assets/users/' . auth()->user()->user_image)}}" alt="{{auth()->user()->full_name}}">
                @else
                <img class="img-xs rounded-circle" src="{{asset('assets/users/avatar.jpg')}}" alt="{{auth()->user()->full_name}}">

                @endif
              <p class="mb-0 d-none d-sm-block navbar-profile-name">{{auth()->user()->full_name}}</p>
              <i class="mdi mdi-menu-down d-none d-sm-block"></i>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
            <h6 class="p-3 mb-0">Profile</h6>
            <div class="dropdown-divider"></div>
            <a href="{{route('admin.account_settings')}}" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject mb-1">Settings</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item" href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <form action="{{route('logout')}}" method="post" id="logout-form" class="d-none">@csrf</form>
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-logout text-danger"></i>
                </div>
              </div>

              <div class="preview-item-content">
                <p class="preview-subject mb-1">Log out</p>

              </div>
            </a>

          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-format-line-spacing"></span>
      </button>
    </div>
  </nav>

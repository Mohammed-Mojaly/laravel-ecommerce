
@php
$current_page = \Route::currentRouteName();
@endphp
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
  <a style="color: wheat;" class="sidebar-brand brand-logo" href="{{route('admin.index')}}"><span style="color: gold">M</span>-Commerce</a>
  <a class="sidebar-brand brand-logo-mini" href="{{route('admin.index')}}"></a>
</div>
<ul class="nav">
  <li class="nav-item profile">
    <div class="profile-desc">
      <div class="profile-pic">
        <div class="count-indicator">

            @if (auth()->user()->user_image != '')

            <img class="img-xs rounded-circle" src="{{asset('assets/users/' . auth()->user()->user_image)}}" alt="{{auth()->user()->full_name}}">
            @else
            <img class="img-xs rounded-circle" src="{{asset('assets/users/avatar.jpg')}}" alt="{{auth()->user()->full_name}}">

            @endif

          <span class="count bg-success"></span>
        </div>
        <div class="profile-name">
          <h5 class="mb-0 font-weight-normal">{{auth()->user()->full_name}}</h5>
          <span>{{auth()->user()->roles[0]->display_name}}</span>
        </div>
      </div>



      <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
        <a href="#" class="dropdown-item preview-item">
          <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
              <i class="mdi mdi-settings text-primary"></i>
            </div>
          </div>
          <div class="preview-item-content">
            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
          </div>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item preview-item">
          <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
              <i class="mdi mdi-onepassword  text-info"></i>
            </div>
          </div>
          <div class="preview-item-content">
            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
          </div>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item preview-item">
          <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
              <i class="mdi mdi-calendar-today text-success"></i>
            </div>
          </div>
          <div class="preview-item-content">
            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
          </div>
        </a>
      </div>
    </div>
  </li>




  <li class="nav-item nav-category">
    <span class="nav-link">Navigation</span>
  </li>






@role(['admin'])

  @foreach ($admin_side_menu as $menu)

    @if (count($menu->apperdchildren) == 0 )

        <li class="nav-item menu-items">
        <a href="{{route('admin.' . $menu->as)}}"  class="nav-link">
            <span class="menu-icon">
            <i  class="{{$menu->icon != '' ? $menu->icon : 'mdi mdi-speedometer'}}"></i>
            </span>
            <span class="menu-title">{{$menu->display_name}}</span>
        </a>
        </li>

        @else
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="{{"#" . $menu->route}}" aria-expanded="false" aria-controls="{{$menu->route}}">
                <span class="menu-icon">
                    <i class="{{$menu->icon}}"></i>
                </span>
                <span class="menu-title">{{$menu->display_name}}</span>
                   {{-- <i  class="{{$menu->icon != '' ? $menu->icon : 'mdi mdi-speedometer'}}"></i> --}}
                   <i  class="menu-arrow"></i>
                </a>

                <div class="collapse" id="{{$menu->route}}" >
                    <ul class="nav flex-column sub-menu">
                        @if ($menu->apperdchildren && count($menu->apperdchildren)>0 !== null)

                       @foreach ($menu->apperdchildren as $sub_menu)
                               <li class="nav-item"> <a class="nav-link" href="{{route('admin.' . $sub_menu->as)}}">{{$sub_menu->display_name}}</a></li>
                       @endforeach
                    </ul>
                </div>
                @endif


            </li>
                @endif

  @endforeach

@endrole




@role(['admin'])

  @foreach ($admin_side_menu as $menu)
    @permission($menu->name)
    @if (count($menu->apperdchildren) == 0 )

        <li class="nav-item menu-items">
        <a href="{{route('admin.' . $menu->as)}}"  class="nav-link">
            <span class="menu-icon">
            <i  class="{{$menu->icon != '' ? $menu->icon : 'mdi mdi-speedometer'}}"></i>
            </span>
            <span class="menu-title">{{$menu->display_name}}</span>
        </a>
        </li>

        @else
            <li class="nav-item menu-items">
                <a class="nav-link" data-toggle="collapse" href="{{"#" . $menu->id}}" aria-expanded="false" aria-controls="{{$menu->id}}">
                <span class="menu-icon">
                    <i class="mdi mdi-laptop"></i>
                </span>
                <span class="menu-title">{{$menu->display_name}}</span>
                   {{-- <i  class="{{$menu->icon != '' ? $menu->icon : 'mdi mdi-speedometer'}}"></i> --}}
                   <i  class="menu-arrow"></i>
                </a>

                @if ($menu->apperdchildren && count($menu->apperdchildren)>0 !== null)
                    <div class="collapse" id="{{$menu->id}}">
                    <ul class="nav flex-column sub-menu">
                        {{-- <li class="nav-item"> <a class="nav-link" href="{{route('admin.index')}}">Buttons</a></li> --}}
                       @foreach ($menu->apperdchildren as $sub_menu)
                       @permission($sub_menu->name)
                               <li class="nav-item"> <a class="nav-link" href="{{route('admin.' . $sub_menu->as)}}">{{$sub_menu->display_name}}</a></li>
                               @endpermission
                       @endforeach
                    </ul>
                    </div>

                @endif

            </li>
                @endif
     @endpermission
  @endforeach

@endrole




</ul>
</nav>
<script src="{{asset('backend/vendors/js/vendor.bundle.base.js')}}"></script>

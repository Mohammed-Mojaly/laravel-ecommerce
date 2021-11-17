@php
    $current_page = \Route::currentRouteName();
@endphp


        <header class="header bg-white">
            <div class="container px-0 px-lg-3">

                <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0">
                    <ul class="navbar-nav nav_mobile" style="position: absolute; right: {{auth()->check() == true ?'19%' : '16%'}};">
                        <livewire:frontend.carts />
                    </ul>


                    <button style="width: 4rem;" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                    <a id="mylogo" style="font-weight: 600;" class="navbar-brand" href="{{route('frontend.index')}}"><span style="color: gold">M</span>-Commerce</a>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto" style="display: contents;">
                    <li class="nav-item">
                         <a class="nav-link {{$current_page =='frontend.index' ? 'active' : null}}" href="{{route('frontend.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{$current_page =='frontend.shop' ? 'active' : null}}" href="{{route('frontend.shop')}}">Shop</a>
                    </li>
                    <li class="nav-item">
                          <a class="nav-link {{$current_page =='frontend.checkout' ? 'active' : null}}" href="{{route('frontend.checkout')}}">Checkout</a>
                    </li>



                  </ul>
                  <ul class="navbar-nav ml-auto">




                    {{-- for Login --}}
                    @guest
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('register')}}"> <i class="fas fa-user-alt mr-1 text-gray"></i>Register</a></li>

                    @else

                        <livewire:frontend.header.notification-component />

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="authDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                            <img src="{{auth()->user()->user_image != '' ?  asset('assets/users/'.auth()->user()->user_image) : asset('assets/users/avatar.jpg')}}" class="rounded-circle" height="25" alt="">
                            {{ auth()->user()->full_name }}</a>
                        <div class="dropdown-menu mt-3" aria-labelledby="authDropdown">
                            <a class="dropdown-item border-0" href="{{route('customer.profile')}}"> <i class="fas fa-tachometer-alt text-gray mr-1"></i>Dashboard</a>
                            <a class="dropdown-item border-0" href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt mr-1 text-gray"></i>Logout</a>
                            <form action="{{route('logout')}}" method="post" id="logout-form" class="d-none">@csrf</form>
                        </div>
                    </li>
                </div>
                    @endguest

                  </ul>





            </nav>

        </div>
          </header>

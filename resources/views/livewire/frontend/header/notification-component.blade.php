<div>

    <li class="nav-item dropdown">
        <ul class="navbar-nav ml-auto nav-flex-icons">
         <li class="nav-item custom_notifi">
           <a class="nav-link" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             <span class="badge badge-danger p-1 border-primary" style="position: relative;border-radius: 5px;left: 9px;bottom: 11px;font-size: 10px;">{{ $unReadNotificationsCount}}</span>
           <i class="fas fa-bell"><span id="myspan" style="font-size: large; display: none"> Notifications</span></i>
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-5">


             {{-- <a class="dropdown-item waves-effect waves-light" href="#">Action</a> --}}

             {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown"> --}}
                <div class="dropdown-menu-header">
                    Notifications
                </div>

                @forelse($unReadNotifications as $notification)
                 @if ($notification->type == 'App\Notifications\Frontend\Customer\OrderThanksNotification')

                    <div class="dropdown-item">
                        <div class="row">
                            <div class="col-md-2 profile-img">
                                <img src="{{asset('assets/chat.png')}}" width="40" height="40"/>
                            </div>
                            <div class="col-md-10">
                                <a  wire:click="markAsRead('{{ $notification->id }}')" id="notifi_link">
                                    Order #{{ $notification->data['order_ref'] }} completed successfully.
                                    <br>
                                    <small>{{ $notification->data['created_date'] }}</small>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($notification->type == 'App\Notifications\Frontend\Customer\OrderCreatedNotification')
                <div class="dropdown-item">
                    <div class="row">
                        <div class="col-md-2 profile-img">
                            <img src="{{asset('assets/chat.png')}}" width="40" height="40"/>
                        </div>
                        <div class="col-md-10">
                            <a  wire:click="markAsRead('{{ $notification->id }}')"  id="notifi_link">
                                Order {{ $notification->data['order_ref'] }} status is {{ $notification->data['last_transaction'] }}<br>
                                <small>{{ $notification->data['created_date'] }}</small>
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                @empty
                <div class="dropdown-item text-center">No notifications found!</div>
        @endforelse





           </div>


         </li>
       </ul>
     </li>
</div>

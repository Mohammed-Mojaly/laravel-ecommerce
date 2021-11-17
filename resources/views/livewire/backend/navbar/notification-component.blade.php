<div>
    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">

        <i class="mdi mdi-bell"></i>
        <span class="bg-danger" style="position: relative;bottom: 9px;right: 8px;font-size: 13px;">&nbsp;{{$unReadNotificationsCount}}&nbsp;</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
        <h6 class="p-3 mb-0">Notifications</h6>


    @forelse ($unReadNotifications as $notification)

        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item" wire:click="markAsRead('{{$notification->id }}')">
        <div class="preview-thumbnail">
            <div class="preview-icon bg-dark rounded-circle">
            <i class="mdi mdi-calendar text-success"></i>
            </div>
        </div>
        <div class="preview-item-content">
            <p class="preview-subject mb-1">{{$notification->data['created_date']}}</p>
            <p class="text-muted"> A new order with amount (${{ $notification->data['amount'] }}) from {{ $notification->data['customer_name'] }}</p>
        </div>
        </a>
    @empty
         <p class="p-3 mb-0 text-center">No notifications found</p>
    @endforelse







        <div class="dropdown-divider"></div>
      </div>

    </div>

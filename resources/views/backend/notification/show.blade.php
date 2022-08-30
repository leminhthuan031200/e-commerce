{{-- <div id="notifications">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">
            @if(count(Auth::user()->unreadNotifications) >5 )<span data-count="5" class="count">5+</span>
            @else 
                <span class="count" data-count="{{count(Auth::user()->unreadNotifications)}}">{{count(Auth::user()->unreadNotifications)}}</span>
            @endif
        </span>
      </a>
      <!-- Dropdown - Alerts -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
          Notifications Center
        </h6>
        @foreach(Auth::user()->unreadNotifications as $notification)
    <a class="dropdown-item d-flex align-items-center" target="_blank" href="{{route('admin.notification',$notification->id)}}">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                    <i class="fas {{$notification->data['fas']}} text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">{{$notification->created_at->format('F d, Y h:i A')}}</div>
                    <span class="@if($notification->unread()) font-weight-bold @else small text-gray-500 @endif">{{$notification->data['title']}}</span>
                </div>
            </a>
            @if($loop->index+1==5)
                @php 
                    break;
                @endphp
            @endif
        @endforeach

        <a class="dropdown-item text-center small text-gray-500" href="{{route('all.notification')}}">Show All Notifications</a>
      </div>
    
</div> --}}

<a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <i class="fas fa-bell fa-fw"></i>
    <span class="badge badge-danger badge-counter">
    @if(count(Auth::user()->unreadNotifications) >5 )<span data-count="5" class="count">5+</span>
    @else 
        <span class="count" data-count="{{count(Auth::user()->unreadNotifications)}}">{{count(Auth::user()->unreadNotifications)}}</span>
    @endif
</span>
</a>
<div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
    <h6 class="dropdown-header dropdown-notifications-header">
       Thông báo
    </h6>
    @foreach(Auth::user()->unreadNotifications as $notification)    
        <a class="dropdown-item dropdown-notifications-item" href="{{route('admin.notification',$notification->id)}}">
            <div class="dropdown-notifications-item-icon bg-warning"> <i class="fas fa-user fa-fw"></i></div>
            <div class="dropdown-notifications-item-content">
                <div class="dropdown-notifications-item-content-details">{{$notification->created_at->format('F d, Y h:i A')}}</div>
                <div class="dropdown-notifications-item-content-text">{{$notification->data['title']}}</div>
            </div>
        </a>
        @if($loop->index+1==5)
        @php 
            break;
        @endphp
        @endif
    @endforeach
    <a class="dropdown-item text-center small text-gray-500" href="{{route('all.notification')}}">Tất cả thông báo</a>
</div>

<nav class="navbar navbar-expand">
    <div class="left-topbar d-flex align-items-center">
        <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <div class="flex-grow-1  text-center">
        <div class=" align-items-center ">
            <p class="user-name mb-0 h4 d-md-block d-none"><b>{{ session('store-shop_name') }}</b></p>
        </div>
    </div>
    <div class="right-topbar ml-auto">
        <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-lg">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;"
                    data-toggle="dropdown">
                    <i class="bx bx-bell vertical-align-middle"></i>

                </a>
                @php
                    $notification=array();
                @endphp
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:;">
                        <div class="msg-header">
                            <h6 class="msg-header-title">{{ count($notification)}} </h6>
                            <p class="msg-header-subtitle">Application Notifications</p>
                        </div>
                    </a>

                    <div class="header-notifications-list ps">
                        @if(isset($notification[0]))
                            <div class="notification">
                                @foreach ($notification as $item)
                                    <a class="dropdown-item" href="#">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h6 class="msg-name">From Admin<span class="msg-time float-right">{{date("j-M-Y", strtotime($notification[0]->date_time))}}</span></h6>
                                                <p class="msg-info notificationDetails">{{$item->sort_notification_body}}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="text-center msg-footer">View All Notifications</div>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown dropdown-user-profile">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                    <div class="media user-box align-items-center">
                        <!-- <div class="media-body user-info">
                            <p class="user-name mb-0">Jessica Doe</p>
                        </div> -->
                        <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="user-img"
                            alt="user avatar">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">
                        <i class="bx bx-user"></i><span>Profile</span>
                    </a>
                    <div class="dropdown-divider mb-0"></div> <a href="#"
                        class="dropdown-item" href="javascript:;"><i
                            class="bx bx-power-off"></i><span>Logout</span></a>
                </div>
            </li>
        </ul>
    </div>
</nav>

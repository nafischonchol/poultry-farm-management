<nav class="navbar navbar-expand">
    <div class="left-topbar d-flex align-items-center">
        <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <div class="flex-grow-1  text-center">
        <div class=" align-items-center ">
            <p class="user-name mb-0 h4 d-md-block d-none"><b>{{Auth()->user()->name}}</b></p>
        </div>
    </div>
    <div class="right-topbar ml-auto">
        <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-lg m-4">
                <a href="#" class="d-block border-bottom p-1 btn btn-outline-primary btn-sm my-1 pl-3 pr-3" data-toggle="modal" data-target="#sheetAdd"><span class="mt-3"> নতুন শিট তৈরি করুন</span></a>
                @include("library.add-sheet-modal")
            </li>
            <li class="nav-item dropdown dropdown-user-profile">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                    <div class="media user-box align-items-center">
                        <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" class="user-img"
                            alt="user avatar">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">
                        <i class="bx bx-user"></i><span>Profile</span>
                    </a>
                    <div class="dropdown-divider mb-0"></div>
                    <a href="{{route('logout')}}" class="dropdown-item" href="javascript:;">
                        <i class="bx bx-power-off"></i><span>Logout</span></a>
                </div>
            </li>
        </ul>
    </div>
</nav>


<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">

        <div>
            <h4 class="logo-text">PFM</h4>
        </div>
        <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
        </a>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>


        <li class="menu-label">COST</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="fadeIn animated bx bx-collection"></i>
                </div>
                <div class="menu-title">Cost</div>
            </a>
            <ul>
                <li>
                    <a href="{{route("cost.create")}}">
                        <div class="parent-icon icon-color-4">
                            <i class="fadeIn animated bx bx-store-alt"></i>
                        </div>
                        <div class="menu-title">Add Cost</div>
                    </a>
                </li>
                <li>
                    <a href="{{route("cost.index")}}">
                        <div class="parent-icon icon-color-5">
                            <i class="fadeIn animated bx bx-layer"></i>
                        </div>
                        <div class="menu-title">Cost List</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>

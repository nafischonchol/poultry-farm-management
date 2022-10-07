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
                <div class="menu-title">ড্যাশবোর্ড</div>
            </a>
        </li>


        <li class="menu-label">খরচ</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="fadeIn animated bx bx-collection"></i>
                </div>
                <div class="menu-title">খরচ</div>
            </a>
            <ul>
                <li>
                    <a href="{{route("cost.create")}}">
                        <div class="parent-icon icon-color-4">
                            <i class="fadeIn animated bx bx-store-alt"></i>
                        </div>
                        <div class="menu-title">নতুন খরচ অ্যাড</div>
                    </a>
                </li>
                <li>
                    <a href="{{route("cost.index")}}">
                        <div class="parent-icon icon-color-5">
                            <i class="fadeIn animated bx bx-layer"></i>
                        </div>
                        <div class="menu-title">খরচের হিসাব</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-label">বাচ্চা</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon icon-color-1"><i class="fadeIn animated bx bx-collection"></i>
                </div>
                <div class="menu-title">বাচ্চা</div>
            </a>
            <ul>
                <li>
                    <a href="{{route("baccha.mirttu.index")}}">
                        <div class="parent-icon icon-color-4">
                            <i class="fadeIn animated bx bx-store-alt"></i>
                        </div>
                        <div class="menu-title">বাচ্চা মৃত্যু হিসাব</div>
                    </a>
                </li>
                <li>
                    <a href="{{route("baccha.ojun.index")}}">
                        <div class="parent-icon icon-color-5">
                            <i class="fadeIn animated bx bx-layer"></i>
                        </div>
                        <div class="menu-title">বাচ্চা ওজন হিসাব</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
    <!--end navigation-->
</div>

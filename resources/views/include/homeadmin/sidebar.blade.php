<style>
    .icon-dashboard {
        width: 17.6px !important;
        height: 17.6px !important;
    }

    #sidebar.active img {
        margin-right: 0;
        font-size: 1.8em;
        margin-bottom: 5px;
        width: 24.49px !important;
        height: 24.50px !important;
    }
</style>

<nav id="sidebar">
    <div id="logo-header" class="sidebar-header">
        <h3>CAR</h3>
        <strong class="strong">CR</strong>
    </div>
    @php
        // dd(request()->path());
    @endphp
    <ul class="list-unstyled components">
        <li class="{{ request()->path() == 'admin-dashboard' ? 'active' : '' }}" id="dashborad">
            <a href="{{ route('home_admin') }}" aria-expanded="false">
                <i class="bi bi-bar-chart-line-fill icon-remove-margin"></i>
                Dashboard
            </a>
        </li>
        <li class="{{ request()->path() == 'admin-home' || request()->path() == 'admin-manage-car' || request()->path() == 'admin-manage-user' ? 'active' : '' }}"
            id="test">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="bi bi-gear icon-remove-margin"></i>
                จัดการข้อมูล
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li class="{{ request()->path() == 'admin-manage-car' ? 'active' : '' }}">
                    <a href="{{ route('view_managecar') }}">จัดการรถยนต์</a>
                </li>
                <li class="{{ request()->path() == 'admin-manage-user' ? 'active' : '' }}">
                    <a href="{{ route('view_manage_user') }}">จัดการข้อมูลสมาชิก</a>
                </li>
            </ul>
        </li>
        <li class="{{ request()->path() == 'admin-webborad-view' ? 'active' : '' }}">
            <a href="{{ route('webboard_view') }}">
                <i class="bi bi-file-post icon-remove-margin"></i>
                เว็บบอร์ด
            </a>
        </li>
        <li class="{{ request()->path() == 'admin-manage-faq' ? 'active' : '' }}">
            <a href="{{ route('faq_view_am') }}">
                <i class="bi bi-chat-left-text-fill icon-remove-margin "></i>
                คำขอช่วยเหลือ
            </a>
        </li>
        <li
            class="{{ request()->path() == 'admin-export-view' || request()->path() == 'admin-export-get' ? 'active' : '' }}">
            <a href="{{ route('export_view') }}">
                <i class="bi bi-save icon-remove-margin "></i>
                Export
            </a>
        </li>
    </ul>

</nav>

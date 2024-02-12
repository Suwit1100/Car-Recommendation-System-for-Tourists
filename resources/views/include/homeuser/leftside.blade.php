<aside class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header d-flex align-items-center pb-0">
        <span class="text-20-bolder text-white">
            เมนู
        </span>
        <a role="button" class="text-reset pt-2" data-bs-dismiss="offcanvas">
            <i class="fa-solid fa-rectangle-xmark" style="color: white; font-size:20px;"></i>
        </a>
    </div>
    <div class="offcanvas-body">
        <ul>
            <li
                class="{{ request()->path() == 'home_user' || request()->path() == 'car-list' || request()->path() == 'car_view' ? 'active-leftside' : '' }}">
                <a href="{{ route('home_user') }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="ms-2"> หน้าหลัก</span>
                </a>
            </li>
            <li class="{{ request()->path() == 'reccomment_view' ? 'active-leftside' : '' }}">
                <a href="{{ route('reccomment_view') }}">
                    <i class="fa-solid fa-car"></i>
                    <span class="ms-2"> แนะนำรถยนต์</span>
                </a>
            </li>
            <li class="{{ Str::contains(request()->path(), 'webboard') ? 'active-leftside' : '' }}">
                <a href="{{ route('webboard_view') }}">
                    <i class="fa-brands fa-blogger-b"></i>
                    <span class="ms-2"> เว็บบอร์ด</span>
                </a>
            </li>
            <li class="{{ Str::contains(request()->path(), 'faquser') ? 'active-leftside' : '' }}">
                <a href="{{ route('faq_view') }}">
                    <i class="fa-solid fa-circle-question"></i>
                    <span class="ms-2">ช่วยเหลือ</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

@php
    $usersession = Auth::user();
@endphp
<nav class="navbar navbar-light bg-white navbar-expand-sm">
    <div class="container-fluid mx-2">
        <div class="navbar-brand d-flex align-items-center">
            <span class="btn btn-shadow"data-bs-toggle="offcanvas" href="#sidebar" role="button">
                <i class="fa-solid fa-list"></i>
            </span>
            <img src="{{ asset('/assets/imgnav/CR.png') }}" alt="logo" width="40" height="36"
                class="d-inline-block align-text-top ms-2" style="cursor:default;">
        </div>
        <span class="btn btn-shadow btn-toggler-profile" role="button" data-bs-toggle="collapse"
            data-bs-target="#menuright">
            <i class="fa-solid fa-ellipsis"></i>
        </span>
        <div class="collapse navbar-collapse text-end" id="menuright">
            <div class="menupc">
                <ul class="navbar-nav align-items-center">
                    <li class="mx-1">
                        <span class="btn btn-shadow noti-show position-relative">
                            <i class="fa-solid fa-bell"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                @php
                                    $countnotify = DB::table('notify')
                                        ->where('to_user_id', Auth::user()->id)
                                        ->where('to_user_id_read', 'new')
                                        ->count();
                                @endphp
                                {{ $countnotify }}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </span>
                        <div class="box-notify">
                            <div class="container">
                                <div class="row mt-3 d-flex align-item-center">
                                    <div class="col-6 mb-2 d-flex justify-content-start align-item-center">
                                        <span class="text-20-bolder">การแจ้งเตือน</span>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end align-item-center">
                                    </div>
                                </div>
                                @include('include.homeuser.data-notify')
                                <div>
                                    <div id="data-wrapper"></div>
                                    <div id="no-noti"></div>
                                    <button class="btn btn-white form-control" id="more-notify">
                                        โหลดเพิ่ม
                                    </button>
                                </div>
                                <br>

                            </div>
                        </div>
                    </li>
                    <li class="mx-1">
                        <span class="btn btn-shadow text-16-normal" style="cursor:default;">
                            {{ $usersession->name }}
                            {{ $usersession->lastname }}
                        </span>
                    </li>
                    <li class="mx-1" data-bs-toggle="offcanvas" data-bs-target="#sideprofile" role="button">
                        <img src="{{ asset('assets/imguser/' . $usersession->imgprofile) }}" alt="logo"
                            width="50" height="50" class="d-inline-block align-text-top btn-shadow">
                    </li>
                </ul>
            </div>
            <div class="menumobile">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <span class="text-16-normal" data-bs-toggle="offcanvas" data-bs-target="#sideprofile"
                            role="button">
                            {{ $usersession->name }} โปรไฟล์
                        </span>
                    </li>
                    <li class="nav-item" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom">
                        <span class="text-16-normal">
                            การแจ้งเตือน
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

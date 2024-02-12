<style>
    .form-check-input:checked {
        background-color: #357266;
        border-color: #357266;
    }

    .notify-icon {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }

    /* .noti-red {
        background: red;
        border-radius: 100%;
        width: 7px;
        height: 7px;
        position: absolute;
        right: 172px;
        top: 25px;
    } */

    .noti-green {
        background: #357266;
        border-radius: 100%;
        width: 10px;
        height: 10px;
        box-sizing: border-box;
    }

    .notifybox {
        /* min-width: 500px; */
        /* height: 200px; */
        box-sizing: border-box;
        background: #f9f9f9;
        position: absolute;
        right: 173px;
        z-index: 2;
        display: none;
        overflow: hidden;
    }

    .profile-noti>img {
        width: 63px;
        height: 63px;
        border-radius: 100%;
        margin-top: 3%
    }

    .notify-textbox>span {
        color: black;
    }

    .noti-hover:hover {
        background: #848484;
    }

    .disabled-notiline {
        pointer-events: none;
        opacity: 0.5;
    }

    .box-notify-admin {
        width: 34rem;
        left: -1217% !important;
        z-index: 10000 !important;
    }

    .img-noti {
        width: 57px;
        height: 51px;
        border-radius: 100%;
    }

    .content-profile {
        left: -110px !important;
    }
</style>
<nav class="navbar navbar-expand-lg row d-flex align-items-center justify-content-center">
    <div class="col-8">
        <button type="button" id="sidebarCollapse" class="btn btn-toggle">
            <i class="bi bi-list"></i>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
    </div>
    <div class="col-4">
        <div class="row">
            <div class="col-5 d-flex align-items-center justify-content-end">
                <div class="dropdown ">
                    <span class="btn btn-light" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-bell-fill"></i>
                    </span>
                    <div class="dropdown-menu box-notify-admin">
                        <div class="container">
                            @include('include.homeadmin.notiadmin')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center">
                <span>{{ Auth::user()->name }}</span>
                <span>{{ Auth::user()->lastname }}</span>
            </div>
            <div class="dropdown col-3 d-flex align-items-center justify-content-start">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/imguser/' . Auth::user()->imgprofile) }}" alt="รูปภาพโปรไฟล์"
                        class="img_profile" id="btn-profile">
                </button>
                <ul class="dropdown-menu content-profile">
                    <li><a class="dropdown-item" href="{{ route('edit_profile_view') }}">แก้ไขข้อมูลส่วนตัว</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                            data-bs-target="#edit_token">ตั้งค่าการแจ้งเตือน</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="edit_token" tabindex="-1" aria-labelledby="edit_tokenLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="edit_tokenLabel">ตั้งค่าการแจ้งเตือน</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-token" method="get" action="{{ route('token_save') }}" class="modal-body">
                @php
                    $token = DB::table('tokenline')
                        ->where('user_id', Auth::user()->id)
                        ->first();
                    $status_token;
                    if ($token == null || $token->status_token == 'off') {
                        $status_token = 'off';
                    } elseif ($token->status_token == 'on') {
                        $status_token = 'on';
                    }
                @endphp
                <div class="form-floating">
                    <input type="text" class="form-control" id="tokenline" name="tokenline" placeholder="Token Line"
                        value="{{ $token ? $token->token_text : '' }}">
                    <label for="tokenline">Token Line</label>
                </div>
                <div class="form-check form-switch mt-2">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                        style="cursor:pointer;" {{ $status_token == 'on' ? 'checked' : '' }}
                        {{ $token ? ($token->token_text = '' ? 'disabled' : '') : 'disabled' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">ปิด/เปิด การแจ้งเตือน</label>
                </div>
                <div class="mt-2">
                    <input type="submit" id="token_submit" class="form-control btn-green text-white" value="บันทึก"
                        disabled>
                </div>
            </form>
        </div>
    </div>
</div>

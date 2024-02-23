<aside class="offcanvas offcanvas-end" tabindex="-1" id="sideprofile" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header d-flex align-items-center pb-0">
        <span class="text-white text-20-bolder">
            สุวิทย์
        </span>
        <a role="button" class="text-reset pt-2" data-bs-dismiss="offcanvas">
            <i class="fa-solid fa-rectangle-xmark" style="color: white; font-size:20px;"></i>
        </a>
    </div>
    <div class="offcanvas-body">
        <ul>
            <li>
                <a href="{{ route('edit_profile_view') }}">
                    <i class="fa-solid fa-user"></i>
                    <span class="ms-2">
                        แก้ไขโปรไฟล์
                    </span>
                </a>
            </li>
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#edit_token">
                    <i class="fa-solid fa-bell"></i>
                    <span class="ms-2">
                        ตั้งค่าการแจ้งเตือน
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('car_mylike') }}">
                    <i class="fa-solid fa-heart"></i>
                    <span class="ms-2">
                        รถยนต์ที่ถูกใจ
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="ms-2">
                        ออกจากระบบ
                    </span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- Modal -->
<div class="modal fade" id="edit_token" tabindex="-1" aria-labelledby="edit_tokenLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
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

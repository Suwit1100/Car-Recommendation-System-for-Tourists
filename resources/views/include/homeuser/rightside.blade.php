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
                    <a href="#" id="click-tooltip">วิธีออกโทเคน</a>
                </div>
                <div class="mt-2">
                    <input type="submit" id="token_submit" class="form-control btn-green text-white" value="บันทึก"
                        disabled>
                </div>
            </form>
            <div class="tooltip-token">
                <div class="card m-1">
                    <div class="card-header d-flex justify-content-between align-items-center bg-green text-white">
                        วิธีออก Token
                        <span role="button" class="btn text-white" id="close-tooltip">
                            <i class="fa-solid fa-xmark" style="font-size: 24px;"></i>
                        </span>
                    </div>
                    <div class="container">
                        <div class="row mt-2">
                            <div class="col-12 ">
                                <span>
                                    ก่อนอื่นให้เข้าไปที่ https://notify-bot.line.me/th จากนั้น Login เข้าสู่ระบบ >
                                    เลือกเมนู
                                    “หน้าของฉัน”
                                </span>
                            </div>
                            <div class="col-12 imgtooltip">
                                <img class="" src="{{ asset('assets/imgtooltip/ไปที่หน้าpage.png') }}"
                                    alt="">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 ">
                                <span>
                                    เลื่อนลงไปด้านล่างจะมีส่วน ออก Access Token ของนักพัฒนา ให้กดปุ่ม “ออก Token”
                                </span>
                            </div>
                            <div class="col-12 imgtooltip">
                                <img class="" src="{{ asset('assets/imgtooltip/คลิกออกโทเคน.png') }}"
                                    alt="">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 ">
                                <span>
                                    ให้ใส่ชื่อ Token (จะแสดงเมื่อมีการแจ้งเตือน)
                                    และเลือกห้องแชทที่ต้องการส่งข้อความแจ้งเตือน
                                    จากนั้นกดปุ่ม “ออก Token” เพื่อรับ Token key
                                </span>
                            </div>
                            <div class="col-12 imgtooltip">
                                <img class="" src="{{ asset('assets/imgtooltip/เลือกกลุ่ม.png') }}"
                                    alt="">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 ">
                                <span>
                                    ระบบจะสร้าง token ให้เรานำไปใช้งานต่อไป อย่าลืม ! Copy Token
                                    เก็บไว้ก่อนที่จะปิดหน้าต่างนะครับ เพราะจะกลับมาดูอีกครั้งไม่ได้แล้ว นอกเสียจากจะขอ
                                    Token ใหม่อีกรอบ
                                </span>
                            </div>
                            <div class="col-12 imgtooltip">
                                <img class="" src="{{ asset('assets/imgtooltip/Token.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

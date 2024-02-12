<section class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header d-flex align-items-center pb-0">
        <span class="text-20-bolder text-white">
            การแจ้งเตือน
        </span>
        <a role="button" class="text-reset pt-2" data-bs-dismiss="offcanvas">
            <i class="fa-solid fa-rectangle-xmark" style="color: white; font-size:20px;"></i>
        </a>
    </div>
    <div class="offcanvas-body small">
        <div class="row d-flex align-item-center">
            <div class="col-12 d-flex justify-content-end align-item-center">
                <span class="btn btn-shadow btn-white text-16-normal">
                    <i class="fa-solid fa-book-open-reader me-2"></i>
                    อ่านแล้วทั้งหมด
                </span>
            </div>
        </div>
        @for ($i = 0; $i < 5; $i++)
            <div class="row hovernoti m-1 p-2" role="button">
                <div class="col-2 d-flex justify-content-start">
                    <div class="row d-flex align-items-center">
                        <div class="col-2 p-0 ">
                            <p class="notyetread m-0 p-0"></p>
                        </div>
                        <div class="col-10 p-0 ps-2 d-flex justify-content-start">
                            <div class="notiprofile">
                                <img src="https://w0.peakpx.com/wallpaper/446/783/HD-wallpaper-jake-the-dog-adventure-time-cartoon.jpg"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 ps-0">
                    <div class="row">
                        <div class="col-10 d-flex justify-content-start">
                            <span class="text-16-blod text-start text-white">
                                Jake The Dog
                                ได้แสดงความคิดเห็นกระทู้ของคุณ เรื่องผัดกะเพราไม่ใส่ถั่ว
                            </span>
                        </div>
                        <div class="col-2 px-0 text-start">
                            <span class="text-14-normal text-white">
                                5 วันที่แล้ว
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</section>

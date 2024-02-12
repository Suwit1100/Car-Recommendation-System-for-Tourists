<div class="row">
    <div class="col-12">
        <div class="box-reply mt-3">
            <form class="row" method="POST" enctype="multipart/form-data" action="{{ route('faq_reply_post') }}">
                @csrf
                <div class="col-12">
                    <span class="text-20-bold">
                        ตอบกลับข้อความนี้
                    </span>
                </div>
                <div class="col-12 d-flex">
                    <img class="profile-reply" src="{{ asset('assets/imguser/' . Auth::user()->imgprofile) }}"
                        alt="">
                    <textarea name="text-reply" id="text-reply" cols="30" rows="3" class="ms-2 form-control"
                        placeholder="เขียนอะไรสักหน่อย"></textarea>
                    <input type="hidden" name="letter_id" value="{{ $letter_title->id }}">
                </div>
                <div class="col-12 mt-1 d-flex justify-content-between">
                    <span class="upimg-reply" role="button">
                        <i class="fa-solid fa-image"></i>
                        <span class="status-upimg">ยังไม่ได้อัปโหลดรูปภาพ</span>
                    </span>
                    <input type="file" name="img-reply" id="img-reply" hidden>
                    <button class="btn btn-green text-white" role="button" type="submit">ส่ง <i
                            class="fa-solid fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

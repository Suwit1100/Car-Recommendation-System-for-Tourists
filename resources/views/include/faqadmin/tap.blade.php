<div class="row pt-2">
    <div class="col-12">
        <ul class="nav nav-tabs">
            <li>
                <a data-toggle="tab" href="#faqmain" class="">
                    <div id="box-title-faq" class="box-faq-title py-2">
                        กล่องข้อความ
                        @if (count($faq_count) > 0)
                            <span class="notify1">{{ $faq_count->count() }}</span>
                        @else
                        @endif
                    </div>
                </a>
            </li>
            <li class="ms-2">
                <a data-toggle="tab" href="#faqnew" class="">
                    <div id="box-title-faqreply" class="box-faq-title py-2">
                        ข้อความที่ยังไม่อ่าน
                        @if (count($faq_count) > 0)
                            <span class="notify1">{{ $faq_count->count() }}</span>
                        @else
                        @endif
                    </div>
                </a>
            </li>
            <li class="ms-2">
                <a data-toggle="tab" href="#faqsend" class="">
                    <div id="box-title-faqreply" class="box-faq-title py-2">
                        ข้อความที่ส่งแล้ว
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>

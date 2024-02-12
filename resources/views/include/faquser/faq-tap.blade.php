<ul class="nav nav-pills mb-3 pt-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="letter-main-tab" data-bs-toggle="pill" data-bs-target="#letter-main"
            type="button" role="tab" aria-controls="letter-main" aria-selected="true">
            ข้อความเข้า <span
                class="badge text-bg-secondary"{{ $faqnew->total() < 1 ? 'hidden' : '' }}>{{ $faqnew->total() }}</span>
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="letter-new-tab" data-bs-toggle="pill" data-bs-target="#letter-new" type="button"
            role="tab" aria-controls="letter-new" aria-selected="false">
            ข้อความที่ยังไม่อ่าน <span
                class="badge text-bg-secondary"{{ $faqnew->total() < 1 ? 'hidden' : '' }}>{{ $faqnew->total() }}</span>
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="letter-send-tab" data-bs-toggle="pill" data-bs-target="#letter-send" type="button"
            role="tab" aria-controls="letter-send" aria-selected="false">
            ข้อความที่ส่งแล้ว
        </button>
    </li>
</ul>

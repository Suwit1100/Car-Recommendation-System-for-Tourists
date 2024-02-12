<div class="box-my mt-2">
    <div class="content">
        <a class="my text-decoration-none text-white" href="{{ route('webboard_my') }}">
            <i class="fa-solid fa-check-to-slot"></i>
            <span>กระทู้ของฉัน</span>
        </a>
        <br>
        <a class="likepost text-decoration-none text-white" role="button" href="{{ route('webboard_my_like') }}">
            <i class="fa-solid fa-heart"></i>
            <span>กระทู้ที่ถูกใจ</span>
        </a>
        <br>
        <a class="comment text-decoration-none text-white" href="{{ route('webboard_my_comment') }}">
            <i class="fa-solid fa-message"></i>
            <span>
                กระทู่ที่คอมเม้น
            </span>
        </a>
    </div>
</div>

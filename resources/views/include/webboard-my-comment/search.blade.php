<div class="row mt-3 d-flex align-items-center">
    <div class="col-12 col-lg-11">
        <form class="input-group" action="{{ route('webboard_my_comment') }}">
            <span class="input-group-text bg-green" id="basic-addon1">
                <i class="fa-solid fa-magnifying-glass text-white"></i>
            </span>
            <input type="text" class="form-control" placeholder="ค้นหากระทู้ของคุณ" aria-label="Username"
                aria-describedby="basic-addon1" name="mycomment_search" value="{{ $search_mycomment }}">
        </form>
    </div>
    <div class="col-12 col-lg-1">
        <a class="create-post text-black" href="{{ route('webboard_view') }}">
            <i class="fa-solid fa-circle-left text-24-bolder"></i>
        </a>
    </div>
</div>
<div class="row mt-2">
    <div class="col-6">
        <span class="text-20-bolder">กระทู้ที่คอมเม้น</span>
    </div>
    <div class="col-6 text-end">
        <span class="text-20-bolder">{{ $mycomment_post->count() }} กระทู้จากทั้งหมด
            {{ $mycomment_post->total() }}</span>
    </div>
</div>

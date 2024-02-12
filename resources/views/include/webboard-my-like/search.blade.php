<div class="row mt-3 d-flex align-items-center">
    <div class="col-12 col-lg-11">
        <form class="input-group" action="{{ route('webboard_my_like') }}">
            <span class="input-group-text bg-green" id="basic-addon1">
                <i class="fa-solid fa-magnifying-glass text-white"></i>
            </span>
            <input type="text" class="form-control" placeholder="ค้นหากระทู้ของคุณ" aria-label="Username"
                aria-describedby="basic-addon1" name="mylike_post_search" value="{{ $value_search }}">
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
        <span class="text-20-bolder">กระทู้ที่ถูกใจ</span>
    </div>
    <div class="col-6 text-end">
        <span class="text-20-bolder">{{ $mylike_post->count() }} กระทู้จากทั้งหมด {{ $mylike_post->total() }}</span>
    </div>
</div>

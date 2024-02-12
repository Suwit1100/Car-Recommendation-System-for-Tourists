<div class="col-12 mt-3">
    <div class="box-mycomment">
        <div class="row p-3">
            <div class="col-12 mb-3">
                <span class="text-20-bolder">
                    คุณรู้สึกอย่างไรกับบทความนี้
                </span>
            </div>
            <div class="col-2 col-lg-1 img-mycomment text-end">
                <img src="{{ '/assets/imguser/' . Auth::user()->imgprofile }}" alt="">
            </div>
            <form id="form-comment" action="{{ route('comment') }}" method="post"
                class="col-10 col-lg-11 input-comment d-flex">
                @csrf
                <input type="hidden" class="form-control" name="post_id" value="{{ $post->id }}">
                <input type="hidden" class="form-control" name="comment_by" value="{{ Auth::user()->id }}">
                <input type="text" class="form-control" name="content" placeholder="บอกความรู้สึกของคุณ"
                    value="">
                <button class="btn btn-green mx-2 " type="submit"> <i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
</div>

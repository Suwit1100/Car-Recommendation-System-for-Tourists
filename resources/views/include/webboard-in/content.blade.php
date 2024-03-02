<div class="col-12 text-end">
    <a href="{{ route('webboard_view') }}" class="btn text-24-bold">
        <i class="fa-solid fa-circle-left"></i>
    </a>
</div>
<div class="col-12">
    <div class="post-in-title">
        <span class="title">{{ $post->title }}</span>
        <span class="hastag" {{ $post->hastag == null ? 'hidden' : '' }}>#{{ $post->hastag }}</span>
    </div>
</div>
<div class="col-12">
    <div class="postby">
        <img src="{{ asset('/assets/imguser/' . $post->imgprofile) }}" alt="">
        <span class="ms-2 text-16-bold">{{ $post->name }} {{ $post->lastname }} </span>
        <span class="ms-2 text-14-normal"
            style="color: #777777">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
    </div>
</div>
<div class="col-12 mt-2">
    <div class="post-in-img text-center" {{ $post->image == null ? 'hidden' : '' }}>
        <img src="{{ asset('/assets/imgpost/' . $post->image) }}" alt="">
    </div>
</div>
<div class="col-12 mt-3">
    <div class="post-in-content p-3">
        <span class="text-16-normal">
            {{ $post->content }}
        </span>
    </div>
</div>
<div class="col-12 mt-3 d-flex justify-content-end">
    <div class="box-like">
        <i class="fa-solid fa-ban" style="color: red" role="button"></i>
        {{-- {{ $post->post_by == Auth::user()->id ? 'hidden' : '' }} --}}
        <i class="ms-1 fa-solid fa-eye "></i>
        <span class="ms-1">{{ $post->numview }}</span>
        <i class="fa-solid fa-comment ms-1"></i>
        <span class="ms-1">{{ $post->numcomment }}</span>
        @php
            $status = DB::table('post_like')
                ->where('like_by', Auth::user()->id)
                ->where('post_id', $post->id)
                ->first();

            if ($status == null) {
                $status = 'notready';
            } else {
                $status = $status->status_like;
            }

            // dd($status);

        @endphp
        <i class="fa-regular fa-heart ms-1 click-like" id="regular-heart" role="button"
            {{ $status == 'ready' ? 'hidden' : '' }} data-id-post ="{{ $post->id }}"
            data-status ="{{ $status }}" data-like-by = "{{ Auth::user()->id }}"></i>
        <i class="fa-solid fa-heart ms-1 click-like" id="solid-heart" role="button"
            {{ $status == 'notready' ? 'hidden' : '' }} data-id-post ="{{ $post->id }}"
            data-status ="{{ $status }}" data-like-by = "{{ Auth::user()->id }}"></i>
        <span class="ms-1" id="text-like">{{ $post->numlike }}</span>
    </div>
</div>

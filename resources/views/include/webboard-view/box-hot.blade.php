@php
    $post_hot = DB::table('post')
        ->leftJoin('users', 'post.post_by', '=', 'users.id')
        ->select('users.name', 'users.lastname', 'users.imgprofile', 'post.*')
        ->orderBy('post.numview', 'DESC')
        ->take(5)
        ->get();

    // dd($post_hot);

@endphp
<div class="card box-hot mt-2">
    <div class="card-header">
        <i class="fa-solid fa-fire"></i>
        กระทู้ยอดนิยม
    </div>
    <div class="card-body">
        @foreach ($post_hot as $ipost_hot)
            <div class="row my-2 click-post text-white" role="button" data-id-post="{{ $ipost_hot->id }}">
                <div class="col-2 img-hot p-0 d-flex align-items-center justify-content-center">
                    <img src="{{ '/assets/imguser/' . $ipost_hot->imgprofile }}" alt="">
                </div>
                <div class="col-10 text-hot">
                    <div class="row">
                        <div class="col-7 text-16-normal text-truncate">
                            <span class="text-16-bold">
                                {{ $ipost_hot->title }}
                            </span>
                            <br>
                            <span>โดย {{ $ipost_hot->name }} {{ $ipost_hot->lastname }}</span>
                        </div>
                        <div class="col-5 text-14-normal p-0 text-end text-truncate">
                            <span>{{ \Carbon\Carbon::parse($ipost_hot->created_at)->diffForhumans() }}</span>
                            <br>
                            <i class="fa-solid fa-eye me-1"></i>
                            <span class="me-1">{{ $ipost_hot->numview }}</span>
                            <i class="fa-solid fa-heart me-1"></i>
                            <span class="me-1">{{ $ipost_hot->numlike }}</span>
                            <i class="fa-solid fa-comment me-1"></i>
                            <span class="me-1">{{ $ipost_hot->numlike }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

@foreach ($mylike_post as $imylike_post)
    <div class="click-post" role="button" data-id-post="{{ $imylike_post->id }}">
        <div class="row my-2">
            <div class="col-12">
                <div class="post" {{ $imylike_post->image == null ? 'hidden' : '' }}>
                    <div class="row d-flex align-items-center">
                        <div class="col-4 col-lg-4 img-post">
                            <img src="{{ '/assets/imgpost/' . $imylike_post->image }}" alt="">
                        </div>
                        <div class="col-4 col-lg-5 text-truncate">
                            <span class="text-16-bold">{{ $imylike_post->title }}</span>
                            <br>
                            <span class="text-16-normal mt-2">โดย {{ $imylike_post->name }}
                                {{ $imylike_post->lastname }}</span>
                        </div>
                        <div class="col-4 col-lg-3 text-truncate">
                            <span
                                class="text-16-normal">{{ \Carbon\Carbon::parse($imylike_post->created_at)->diffForHumans() }}</span>
                            <br>
                            <span class="mt-2">
                                <i class="fa-solid fa-eye me-1"></i>
                                <span class="me-1 text-16-normal">{{ $imylike_post->numview }}</span>
                                <i class="fa-solid fa-heart me-1"></i>
                                <span class="me-1 text-16-normal">{{ $imylike_post->numlike }}</span>
                                <i class="fa-solid fa-comment me-1"></i>
                                <span class="me-1 text-16-normal">{{ $imylike_post->numcomment }}</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="post-noimg" {{ $imylike_post->image == null ? '' : 'hidden' }}>
                    <div class="row d-flex align-items-center">
                        <div class="col-1">
                            <div class="text-noimg"></div>
                        </div>
                        <div class="col-7 col-lg-8 text-truncate ">
                            <span class="text-16-bold">{{ $imylike_post->title }}</span>
                            <br>
                            <span class="text-16-normal mt-2">โดย {{ $imylike_post->name }}
                                {{ $imylike_post->lastname }}</span>
                        </div>
                        <div class="col-4 col-lg-3 text-truncate">
                            <span
                                class="text-16-normal">{{ \Carbon\Carbon::parse($imylike_post->created_at)->diffForHumans() }}</span>
                            <br>
                            <span class="mt-2">
                                <i class="fa-solid fa-eye me-1"></i>
                                <span class="me-1 text-16-normal">{{ $imylike_post->numview }}</span>
                                <i class="fa-solid fa-heart me-1"></i>
                                <span class="me-1 text-16-normal">{{ $imylike_post->numlike }}</span>
                                <i class="fa-solid fa-comment me-1"></i>
                                <span class="me-1 text-16-normal">{{ $imylike_post->numcomment }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
{{ $mylike_post->links() }}

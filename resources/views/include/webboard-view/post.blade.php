@foreach ($posts as $iposts)
    <div class="click-post" role="button" data-id-post="{{ $iposts->id }}">
        <div class="row my-2">
            <div class="col-12">
                <div class="post" {{ $iposts->image == null ? 'hidden' : '' }}>
                    <div class="row d-flex align-items-center">
                        <div class="col-4 col-lg-4 img-post">
                            <img src="{{ '/assets/imgpost/' . $iposts->image }}" alt="">
                        </div>
                        <div class="col-4 col-lg-5 text-truncate">
                            <span class="text-16-bold">{{ $iposts->title }}</span>
                            <br>
                            <span class="text-16-normal mt-2">โดย {{ $iposts->name }} {{ $iposts->lastname }}</span>
                        </div>
                        <div class="col-4 col-lg-3 text-truncate">
                            <span
                                class="text-16-normal">{{ \Carbon\Carbon::parse($iposts->created_at)->diffForHumans() }}</span>
                            <br>
                            <span class="mt-2">
                                <i class="fa-solid fa-eye me-1"></i>
                                <span class="me-1 text-16-normal">{{ $iposts->numview }}</span>
                                <i class="fa-solid fa-heart me-1"></i>
                                <span class="me-1 text-16-normal">{{ $iposts->numlike }}</span>
                                <i class="fa-solid fa-comment me-1"></i>
                                <span class="me-1 text-16-normal">{{ $iposts->numcomment }}</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="post-noimg" {{ $iposts->image == null ? '' : 'hidden' }}>
                    <div class="row d-flex align-items-center">
                        <div class="col-1">
                            <div class="text-noimg"></div>
                        </div>
                        <div class="col-7 col-lg-8 text-truncate ">
                            <span class="text-16-bold">{{ $iposts->title }}</span>
                            <br>
                            <span class="text-16-normal mt-2">โดย {{ $iposts->name }} {{ $iposts->lastname }}</span>
                        </div>
                        <div class="col-4 col-lg-3 text-truncate">
                            <span
                                class="text-16-normal">{{ \Carbon\Carbon::parse($iposts->created_at)->diffForHumans() }}</span>
                            <br>
                            <span class="mt-2">
                                <i class="fa-solid fa-eye me-1"></i>
                                <span class="me-1 text-16-normal">{{ $iposts->numview }}</span>
                                <i class="fa-solid fa-heart me-1"></i>
                                <span class="me-1 text-16-normal">{{ $iposts->numlike }}</span>
                                <i class="fa-solid fa-comment me-1"></i>
                                <span class="me-1 text-16-normal">{{ $iposts->numcomment }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
{{ $posts->links() }}

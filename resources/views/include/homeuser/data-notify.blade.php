@php
    use Illuminate\Pagination\Paginator as PaginationPaginator;
    PaginationPaginator::useBootstrap();
    $notify = DB::table('notify')
        ->leftjoin('users', 'notify.user_send_id', '=', 'users.id')
        ->leftjoin('post', 'post.id', '=', 'notify.web_id')
        ->leftjoin('faq', 'faq.id', '=', 'notify.faq_id')
        ->select('notify.*', 'users.name', 'users.lastname', 'users.imgprofile', 'faq.title AS faqtitle', 'post.title AS posttitle')
        ->orderBy('notify.created_at', 'DESC')
        ->where('to_user_id', Auth::user()->id)
        ->paginate(3);
@endphp
@foreach ($notify as $inotify)
    <div class="row hovernoti m-1 p-2" role="button">
        <div class="col-2 d-flex justify-content-start">
            <div class="row d-flex align-items-center">
                <div class="col-2 p-0 ">
                    <p class="notyetread m-0 p-0"></p>
                </div>
                <div class="col-10 p-0 ps-2 d-flex justify-content-start">
                    <div class="notiprofile">
                        <img src="{{ asset('assets/imguser/' . $inotify->imgprofile) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 ps-0">
            <div class="row">
                <div class="col-9 d-flex justify-content-start">
                    <span class="text-16-blod text-start">
                        {{ $inotify->name }} {{ $inotify->lastname }}
                        {{ $inotify->text_detail }}
                        เรื่อง {{ $inotify->web_id != null ? $inotify->posttitle : $inotify->faqtitle }}
                    </span>
                </div>
                <div class="col-3 px-0 text-start">
                    <span class="text-14-normal ">
                        {{ \Carbon\Carbon::parse($inotify->created_at)->diffForhumans() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
@endforeach

{{-- <div>
    {{ $notify->links() }}
</div> --}}

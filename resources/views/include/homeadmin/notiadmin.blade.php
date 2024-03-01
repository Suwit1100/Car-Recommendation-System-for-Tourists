@php
    $notiadmin = DB::table('notify')
        ->leftJoin('users', 'notify.user_send_id', '=', 'users.id')
        ->leftJoin('post', 'notify.web_id', '=', 'post.id')
        ->leftJoin('faq', 'notify.faq_id', '=', 'faq.id')
        ->where('to_user_id', Auth::user()->id)
        ->orwhere('to_admin_type', 1)
        ->select(
            'users.name',
            'users.lastname',
            'users.imgprofile',
            'notify.*',
            'faq.title As faqtitle',
            'post.title As posttitle',
        )
        ->orderBy('notify.created_at', 'DESC')
        ->paginate(6);
@endphp

@foreach ($notiadmin as $inotiadmin)
    <div class="row my-2 click_read_noti_admin" role="button" data-noti_id="{{ $inotiadmin->id }}"
        data-web_id="{{ $inotiadmin->web_id }}" data-faq_id="{{ $inotiadmin->faq_id }}">
        <div class="col-1 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-circle"
                {{ $inotiadmin->faq_id != null ? ($inotiadmin->to_admin_type_read == 'read' ? 'hidden' : '') : ($inotiadmin->to_user_id_read == 'read' ? 'hidden' : '') }}></i>
        </div>
        <div class="col-2 d-flex justify-content-center align-items-center">
            <img class="img-noti" src="{{ asset('assets/imguser/' . $inotiadmin->imgprofile) }}" alt="">
        </div>
        <div class="col-6">
            {{ $inotiadmin->name }} {{ $inotiadmin->lastname }} {{ $inotiadmin->text_detail }}
            {{ $inotiadmin->web_id != null ? $inotiadmin->posttitle : $inotiadmin->faqtitle }}
        </div>
        <div class="col-3 d-flex justify-content-center align-items-center">
            {{ Carbon\Carbon::parse($inotiadmin->created_at)->diffForhumans() }}
        </div>
    </div>
    <hr>
@endforeach

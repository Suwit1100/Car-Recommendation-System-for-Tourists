@foreach ($letter_reply as $iletter_reply)
    <div class="row">
        <div class="col-12">
            <div class="box-reply mt-3">
                <div class="row">
                    <div class="col-12 d-flex">
                        <img class="profile-reply" src="{{ asset('assets/imguser/' . $iletter_reply->imgprofile) }}"
                            alt="">
                        <div class="ms-2 text-content-reply form-control">
                            <p class="m-0 text-black">
                                <span>
                                    {<span>{{ $iletter_reply->type == 1 ? 'แอดมิน' : $iletter_reply->name . ' ' . $iletter_reply->lastname }}</span>}</span>
                                {{ $iletter_reply->content }}
                            </p>
                        </div>
                    </div>
                    <div class="col-12 mt-1 d-flex justify-content-between">
                        <div {{ $iletter_reply->imgfile == '' ? '' : 'hidden' }}></div>
                        <button {{ $iletter_reply->imgfile == '' ? 'hidden' : '' }} type="button"
                            class="btn btn-outline-dark btn-viewimg" data-bs-toggle="modal"
                            data-bs-target="#imgreply{{ $iletter_reply->id }}">
                            คลิกดูภาพ<i class="bi bi-image-fill"></i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="imgreply{{ $iletter_reply->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="imgreply{{ $iletter_reply->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('assets/imgfaq/' . $iletter_reply->imgfile) }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="text-secondary text-16-normal">
                            {{ \Carbon\Carbon::parse($iletter_reply->created_at)->diffForhumans() }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<br>
{{ $letter_reply->links() }}

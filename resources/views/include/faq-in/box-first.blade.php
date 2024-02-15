<div class="row">
    <div class="col-12">
        <div class="box-reply mt-3">
            <div class="row">
                <div class="col-12">
                    <span class="text-20-bold">
                        เรื่อง {{ $letter_title->title }}
                    </span>
                </div>
                <div class="col-12 d-flex">
                    <img class="profile-reply" src="{{ asset('assets/imguser/' . $letter_main->imgprofile) }}"
                        alt="">
                    <div class="ms-2 text-content-reply form-control">
                        <p class="m-0">
                            <strong>{{ $letter_main->type == 1 ? '{แอดมิน}' : '{คุณ}' }}</strong>
                            {{ $letter_main->content }}
                        </p>
                    </div>
                </div>
                <div class="col-12 mt-1 d-flex justify-content-between">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-dark btn-viewimg" data-bs-toggle="modal"
                        {{ $letter_main->imgfile == null ? 'hidden' : '' }} data-bs-target="#staticBackdrop">
                        คลิกดูภาพ <i class="fa-solid fa-image"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{{ asset('assets/imgfaq/' . $letter_title->imgfile) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="text-secondary text-16-normal">
                        {{ \Carbon\Carbon::parse($letter_main->created_at)->diffForhumans() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

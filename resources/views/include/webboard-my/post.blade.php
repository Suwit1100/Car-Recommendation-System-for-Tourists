@foreach ($myposts as $imyposts)
    <div>
        <div class="row my-2">
            <div class="col-12">
                <div class="post" {{ $imyposts->image == null ? 'hidden' : '' }}>
                    <div class="btn-ellipsis dropdown">
                        <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="dropdown-item" role="button" data-bs-toggle="modal"
                                    data-bs-target="#edit_post{{ $imyposts->id }}">
                                    <i class="fa-solid fa-pen text-warning"></i>
                                    แก้ไขกระทู้
                                </div>
                            </li>
                            <li>
                                <a class="dropdown-item click-delete-post" role="button"
                                    data-id-post = "{{ $imyposts->id }}">
                                    <i class="fa-solid fa-trash text-danger"></i>
                                    ลบกระทู้
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="row d-flex align-items-center click-post" role="button"
                        data-id-post="{{ $imyposts->id }}">
                        <div class="col-4 col-lg-4 img-post">
                            <img src="{{ '/assets/imgpost/' . $imyposts->image }}" alt="">
                        </div>
                        <div class="col-4 col-lg-5 text-truncate">
                            <span class="text-16-bold">{{ $imyposts->title }}</span>
                            <br>
                            <span class="text-16-normal mt-2">โดย {{ Auth::user()->name }}
                                {{ Auth::user()->lastname }}</span>
                        </div>
                        <div class="col-4 col-lg-3 text-truncate">
                            <span
                                class="text-16-normal">{{ \Carbon\Carbon::parse($imyposts->created_at)->diffForHumans() }}</span>
                            <br>
                            <span class="mt-2">
                                <i class="fa-solid fa-eye me-1"></i>
                                <span class="me-1 text-16-normal">{{ $imyposts->numview }}</span>
                                <i class="fa-solid fa-heart me-1"></i>
                                <span class="me-1 text-16-normal">{{ $imyposts->numlike }}</span>
                                <i class="fa-solid fa-comment me-1"></i>
                                <span class="me-1 text-16-normal">{{ $imyposts->numcomment }}</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="post-noimg" {{ $imyposts->image == null ? '' : 'hidden' }}>
                    <div class="btn-ellipsis dropdown">
                        <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="dropdown-item" role="button" data-bs-toggle="modal"
                                    data-bs-target="#edit_post{{ $imyposts->id }}">
                                    <i class="fa-solid fa-pen text-warning"></i>
                                    แก้ไขกระทู้
                                </div>
                            </li>
                            <li>
                                <a class="dropdown-item click-delete-post" role="button"
                                    data-id-post = "{{ $imyposts->id }}">
                                    <i class="fa-solid fa-trash text-danger"></i>
                                    ลบกระทู้
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="row d-flex align-items-center click-post" role="button"
                        data-id-post="{{ $imyposts->id }}">
                        <div class="col-1">
                            <div class="text-noimg"></div>
                        </div>
                        <div class="col-7 col-lg-8 text-truncate ">
                            <span class="text-16-bold">{{ $imyposts->title }}</span>
                            <br>
                            <span class="text-16-normal mt-2">โดย {{ Auth::user()->name }}
                                {{ Auth::user()->lastname }}</span>
                        </div>
                        <div class="col-4 col-lg-3 text-truncate">
                            <span
                                class="text-16-normal">{{ \Carbon\Carbon::parse($imyposts->created_at)->diffForHumans() }}</span>
                            <br>
                            <span class="mt-2">
                                <i class="fa-solid fa-eye me-1"></i>
                                <span class="me-1 text-16-normal">{{ $imyposts->numview }}</span>
                                <i class="fa-solid fa-heart me-1"></i>
                                <span class="me-1 text-16-normal">{{ $imyposts->numlike }}</span>
                                <i class="fa-solid fa-comment me-1"></i>
                                <span class="me-1 text-16-normal">{{ $imyposts->numcomment }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal" id="edit_post{{ $imyposts->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">แก้ไขกระทู้</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('webboard_my_edit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <h6 class="ms-1">ชื่อหัวเรื่อง</h6>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="ระบุหัวเรื่อง..." value="{{ $imyposts->title }}">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <input type="hidden" name="id_post" value="{{ $imyposts->id }}">
                                    <h6 class="ms-1">ภาพปกเดิม</h6>
                                    <img src="{{ asset('assets/imgpost/' . $imyposts->image) }}"
                                        alt="รูปภาพโพสต์เดิม" style="width:60px; height:60px;">
                                    <input type="hidden" name="old_img_post" value="{{ $imyposts->image }}">
                                    <input type="file" name="post_image" id="post_image"
                                        class="form-control mt-3" accept="image/gif, image/jpeg, image/png"
                                        value="{{ $imyposts->image }}">
                                    <span class="extension_title_board">รองรับไฟล์ประเภท .jpg ,
                                        .png
                                        (เพื่อความสวยงามของเว็บไซต์ แนะนำภาพขนาด 1920*800)
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <h6 class="ms-1">ข้อความ</h6>
                                    <textarea name="content_post" id="content_post" class="form-control" placeholder="ระบุข้อความ" maxlength="500">{{ $imyposts->content }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <h6 class="ms-1">Tag</h6>
                                    <input type="text" name="hastag" id="hastag" class="form-control"
                                        placeholder="ระบุแท็ก" value="{{ $imyposts->hastag }}">
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <input type="submit" class="btn btn-success form-control" value="บันทึก">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}
@endforeach
{{ $myposts->links() }}

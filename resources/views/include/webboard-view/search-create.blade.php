<div class="row mt-3 d-flex align-items-center">
    <div class="col-12 col-lg-9">
        <form class="input-group" action="{{ route('webboard_view') }}">
            <span class="input-group-text bg-green" id="basic-addon1">
                <i class="fa-solid fa-magnifying-glass text-white"></i>
            </span>
            <input type="text" class="form-control" placeholder="ค้นหากระทู้" aria-label="ค้นหากระทู้"
                aria-describedby="basic-addon1" name="search_post" value="{{ $search }}">
        </form>
    </div>
    <div class="col-12 col-lg-3">
        <div class="create-post">
            <a data-bs-toggle="modal" data-bs-target="#Modal-add-post" class="btn btn-green form-control">
                <i class="fa-solid fa-pen"></i>
                <span>เขียนกระทู้</span>
            </a>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-6">
        <span class="text-20-bolder">หน้าฟีด</span>
    </div>
    <div class="col-6 text-end">
        <span class="text-20-bolder">{{ $posts->count() }} กระทู้จากทั้งหมด {{ $posts->total() }}</span>
    </div>
</div>

{{-- modal --}}
<div class="modal" id="Modal-add-post">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">สร้างกระทู้</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('webborad_post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <h6 class="ms-1">ชื่อหัวเรื่อง</h6>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="ระบุหัวเรื่อง...">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <h6 class="ms-1">ภาพปก</h6>
                                <input type="file" name="post_image" id="post_image" class="form-control"
                                    accept="image/gif, image/jpeg, image/png">
                                <span class="extension_title_board">รองรับไฟล์ประเภท .jpg , .png
                                    (เพื่อความสวยงามของเว็บไซต์
                                    แนะนำภาพขนาด 1920*800)
                                </span>
                                @if ($errors->has('post_image'))
                                    <span class="text-danger">{{ $errors->first('post_image') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <h6 class="ms-1">ข้อความ</h6>
                                <textarea name="content_post" id="content_post" class="form-control" placeholder="ระบุข้อความ" maxlength="500"></textarea>
                            </div>
                            @if ($errors->has('content_post'))
                                <!-- ตรวจสอบข้อผิดพลาดของ 'content_post' ไม่ใช่ 'type' -->
                                <span class="text-danger">{{ $errors->first('content_post') }}</span>
                            @endif
                        </div>
                        <div class="col-12 mt-3">
                            <div class="form-group">
                                <h6 class="ms-1">Tag</h6>
                                <input type="text" name="hastag" id="hastag" class="form-control"
                                    placeholder="ระบุแท็ก">
                            </div>
                            @if ($errors->has('hastag'))
                                <span class="text-danger">{{ $errors->first('hastag') }}</span>
                            @endif
                        </div>

                        <div class="col-12 mt-3">
                            <input type="submit" class="btn btn-success form-control" disabled>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

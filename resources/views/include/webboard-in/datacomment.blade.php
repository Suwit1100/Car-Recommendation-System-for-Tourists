<div class="col-12 mt-3">
    @foreach ($comment as $key => $icomment)
        <div class="box-mycomment my-1">
            <div class="row p-3">
                <div class="col-2 col-lg-1 img-mycomment text-end">
                    <img src="{{ '/assets/imguser/' . $icomment->imgprofile }}" alt="">
                </div>
                <div class="col-10 col-lg-11 input-comment d-flex">
                    <div class="form-control d-flex">
                        <div>
                            {{ $icomment->content }}
                        </div>
                    </div>
                    <div class="dropdown">
                        <span class="btn mx-2" id="clickMoreComment" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis"></i>
                        </span>
                        <ul class="dropdown-menu" aria-labelledby="clickMoreComment">
                            <li {{ $icomment->comment_by != Auth::user()->id ? 'hidden' : '' }}>
                                <a class="dropdown-item" role="button" data-bs-toggle="modal"
                                    data-bs-target="#editComment{{ $key }}">
                                    <i class="fa-solid fa-pen"></i>
                                    <span>แก้ไข</span>
                                </a>
                            </li>
                            <li {{ $icomment->comment_by != Auth::user()->id ? 'hidden' : '' }}>
                                <a class="dropdown-item click-delete-comment" data-id-comment="{{ $icomment->id }}"
                                    data-id-post = "{{ $post->id }}" role="button">
                                    <i class="fa-solid fa-trash"></i>
                                    <span>ลบ</span>
                                </a>
                            </li>
                            <li {{ $icomment->comment_by == Auth::user()->id ? 'hidden' : '' }}>
                                <a class="dropdown-item click-delete-comment" data-id-comment="{{ $icomment->id }}"
                                    data-id-post = "{{ $post->id }}" role="button">
                                    <i class="fa-solid fa-ban" style="color: red"></i>
                                    <span>รายงาน</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 text-end mt-2">
                    <span class="mx-2">
                        {{ \Carbon\Carbon::parse($icomment->updated_at)->diffForhumans() }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editComment{{ $key }}" tabindex="-1" aria-labelledby="editCommentLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCommentLabel">แก้ไขความคิดเห็น</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="form-editcomment" action="{{ route('edit_comment') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="box-mycomment my-1">
                                <div class="row p-3">
                                    <div class="col-2 col-lg-1  img-mycomment text-center ">
                                        <img src="{{ '/assets/imguser/' . $icomment->imgprofile }}" alt="">
                                    </div>
                                    <div class="col-10 col-lg-11 input-comment d-flex">
                                        <input type="text" name="edit_comment_content"
                                            value="{{ $icomment->content }}" class="ms-2 form-control">
                                        <input type="hidden" name="edit_comment_id" value="{{ $icomment->id }}">
                                    </div>
                                    <div class="col-12 text-end mt-2">
                                        <span class="mx-2">
                                            {{ \Carbon\Carbon::parse($icomment->updated_at)->diffForhumans() }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white border" data-bs-dismiss="modal">ปิด</button>
                            <input type="submit" class="btn btn-green" value="บันทึก">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="col-12 mt-2">
    {{ $comment->links() }}
</div>

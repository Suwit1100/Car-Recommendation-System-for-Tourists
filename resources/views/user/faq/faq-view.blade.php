@extends('layout.homeuser')
@section('style')
    <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: var(--bs-nav-pills-link-active-color);
            background-color: #23c686;
        }

        .nav-link {
            color: #000000;
        }

        .nav {
            --bs-nav-link-hover-color: #23c686;
        }

        .dropdown-menu {
            --bs-dropdown-link-active-bg: #23c686;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(35, 198, 134, 0.5);
        }

        .faq-bg-sort-active {
            background: #23c686;
            color: white;
        }
    </style>
@endsection
@section('content')
    @include('include.faquser.faq-tap')
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="letter-main" role="tabpanel" aria-labelledby="letter-main-tab" tabindex="0">
            <div class="row">
                @include('include.faquser.search-main')
                @include('include.faquser.table-main')
            </div>
        </div>
        <div class="tab-pane fade" id="letter-new" role="tabpanel" aria-labelledby="letter-new-tab" tabindex="0">
            <div class="row">
                @include('include.faquser.search-new')
                @include('include.faquser.table-new')
            </div>
        </div>
        <div class="tab-pane fade" id="letter-send" role="tabpanel" aria-labelledby="letter-send-tab" tabindex="0">
            <div class="row">
                @include('include.faquser.search-send')
                @include('include.faquser.table-send')
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">เขียนข้อความ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row" method="post" action="{{ route('faq_post') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 my-1 ">
                            <input type="text" class="form-control" name="title" placeholder="กรุณาระบุเรื่อง"
                                value="">
                        </div>
                        <div class="col-12 my-1 ">
                            <textarea name="content" id="" cols="30" rows="10" class="form-control"
                                placeholder="กรุณาระบุเนื้อหา"></textarea>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <i class="bi bi-images" style="font-size: 24px; cursor: pointer; color:#357266;"
                                id="uploadImg"></i>
                            <div id="selectedFileName" class="ms-2">ยังไม่ได้เลือกไฟล์</div>
                            <input type="file" id="fileImg" name="fileimg" style="display: none" />
                        </div>
                        <div class="col-12">
                            <button type="submit" id="summit_letter_post" class="form-control bg-green text-white"
                                disabled>ส่ง</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let letter_post = @json(session('success-letter-post'));
            if (letter_post) {
                Swal.fire({
                    title: 'สำเร็จ',
                    text: letter_post,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                });
            }

            // เพิ่มไฟล์ภาพ
            $("#uploadImg").click(function() {
                var fileInput = $('#fileImg');
                fileInput.click();
                fileInput.change(function() {
                    var selectedFile = this.files[0];

                    if (selectedFile) {
                        console.log(111111111);
                        $('#selectedFileName').text(selectedFile.name);
                    } else {
                        console.log(2222222222);
                        $('#selectedFileName').text("ไม่มีไฟล์ที่เลือก");
                    }
                });
            });

            // เช็คการกรอก title,content
            $('input[name="title"], textarea[name="content"]').on('input', function() {
                if ($('input[name="title"]').val().trim() !== '' && $('textarea[name="content"]')
                    .val().trim() !== '') {
                    console.log('เปิดให้ส่ง');
                    $('#summit_letter_post').prop('disabled', false);
                } else {
                    console.log('ไม่เปิดให้ส่ง');
                    $('#summit_letter_post').prop('disabled', true);
                }
            });

            // check_tap
            let check_tap = '{{ $check_tap }}';
            console.log(check_tap);
            if (check_tap == 'search_new') {
                $('#letter-new-tab').click();
            } else if (check_tap == 'search_send') {
                $('#letter-send-tab').click();
            } else {
                $('#letter-main-tab').click();
            }

            // คลิก sort
            $('.sort-send').click(function(e) {
                e.preventDefault();
                let val_sort = $(this).data("val-sort");
                console.log(val_sort);
                $('input[name="sort_send"]').val(val_sort);
                $('#form-send').submit();
            });

            $('.sort-main').click(function(e) {
                e.preventDefault();
                let val_sort = $(this).data("val-sort");
                console.log(val_sort);
                $('input[name="sort_main"]').val(val_sort);
                $('#form-main').submit();
            });

            $('.sort-new').click(function(e) {
                e.preventDefault();
                let val_sort = $(this).data("val-sort");
                console.log(val_sort);
                $('input[name="sort_new"]').val(val_sort);
                $('#form-new').submit();
            });
        });

        // เปิดอ่าน letter
        $(document).on('click', '.click-read-letter', function() {
            let idLetter = $(this).data("id-letter");
            console.log(idLetter);

            $.ajax({
                type: "POST",
                url: "{{ route('faq_read') }}",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    idLetter: idLetter
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = "/faquser/faq_in/" + response.id;
                }
            });
        });

        // ลบ letter
        $(document).on('click', '.click-delete-letter', function() {
            let idLetter = $(this).data("id-letter");
            console.log(idLetter);
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: 'การลบข้อความนี้ไม่สามารถกู้คืนได้!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ใช่, ลบ!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('faq_delete') }}",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        data: {
                            idLetter: idLetter
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.status == 200) {
                                Swal.fire({
                                    title: 'สำเร็จ',
                                    text: response.message,
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1000,
                                    timerProgressBar: true,
                                }).then(() => {
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection

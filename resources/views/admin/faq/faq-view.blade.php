@extends('layout.homeadmin')
@section('style')
    {{-- dataTable CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.bootstrap5.min.css">
    {{-- dataTable CSS --}}
    <style>
        .box-faq-title {
            width: 150px;
            /* height: 30px; */
            background: #ffffff;
            text-align: center;
            border-radius: 5px;
        }

        a.active div#box-title-faq {
            background-color: #357266;
            color: white;
        }

        a.active div#box-title-faqreply {
            background-color: #357266;
            color: white;
        }

        a.active div#box-title-announce {
            background-color: #357266;
            color: white;
        }

        .dataTables_length {
            display: none;
        }

        .dataTables_filter {
            display: none;
        }


        th.sorting {
            background: #ffffff;
            color: #000000;
            font-weight: 500;
            border-bottom: 3px solid #357266;
        }

        .btn-add-announce {
            background: #357266;
            color: #ffffff
        }

        .btn-add-announce:hover {
            background: #10231f;
            color: #ffffff
        }

        .swal2-styled.swal2-confirm {
            border: 0;
            border-radius: .25em;
            background: initial;
            background-color: #357266;
            color: #fff;
            font-size: 1em;
        }

        .notify {
            background-color: red;
            font-size: 13px;
            border-radius: 100%;
            width: 16px;
            color: white;
            height: 18px;
        }

        .notify1 {
            background-color: red;
            font-size: 13px;
            border-radius: 100%;
            width: 16px;
            color: white;
            height: 18px;
        }

        .btn-icon-faq {
            width: 17px;
            height: 17px;
        }

        .btn-bg-faq {
            background-color: #357266
        }


        .btn-bg-faq:hover {
            background-color: #10231f;
        }

        .active>.page-link,
        .page-link.active {
            z-index: 3;
            color: white;
            background-color: #357266;
            border-color: #357266;
        }
    </style>
@endsection
@section('content')
    <div class="container bg-light">
        @include('include.faqadmin.tap')

        <div class="tab-content bg-white">
            @include('include.faqadmin.tablemain')
            @include('include.faqadmin.tablenew')
            @include('include.faqadmin.tablesend')
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">เขียนข้อความ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row" method="post" action="{{ route('faq_post_admin') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 my-1">
                            <select name="touserid" id="" class="form-select" required>
                                <option value="">ส่งถึง</option>
                                {{ $user = DB::table('users')->get() }}
                                @foreach ($user as $iuser)
                                    <option value="{{ $iuser->id }}">{{ $iuser->name }} {{ $iuser->lastname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 my-1 ">
                            <input type="text" class="form-control" name="title" placeholder="กรุณาระบุเรื่อง"
                                value="" required>
                        </div>
                        <div class="col-12 my-1 ">
                            <textarea name="content" id="" cols="30" rows="10" class="form-control"
                                placeholder="กรุณาระบุเนื้อหา" required></textarea>
                        </div>
                        <div class="col-12 d-flex align-items-center">
                            <i class="bi bi-images" style="font-size: 24px; cursor: pointer; color:#357266;"
                                id="uploadImg"></i>
                            <div id="selectedFileName" class="ms-2">ยังไม่ได้เลือกไฟล์</div>
                            <input type="file" id="fileImg" name="fileimg" style="display: none" />
                        </div>
                        <div class="col-12">
                            <button type="submit" id="summit_letter_post"
                                class="form-control bg-green text-white">ส่ง</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- JS-Table --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    {{-- JS-Table --}}
    <script>
        new DataTable('#example');
        new DataTable('#example3');
        new DataTable('#example4');
    </script>
    <script>
        var titlesearch = "{{ $titlesearch }}";
        console.log(titlesearch);
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('a[href="#faqmain"]').click();
            if (titlesearch == 'faq') {
                console.log(111111 + 'faq');
                document.querySelector('a[href="#faqmain"]').click();
            } else if (titlesearch == 'faqreply') {
                console.log(22222 + 'faqreply');
                document.querySelector('a[href="#faqsend"]').click();
            } else if (titlesearch == 'announce') {
                console.log(33333 + 'announce');
                document.querySelector('a[href="#faqnew"]').click();
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

            // โพสต์สำเร็จ
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

        });

        // เปิดอ่าน letter
        $(document).on('click', '.click-read-letter', function() {
            let idLetter = $(this).data("id-letter");
            console.log(idLetter);

            $.ajax({
                type: "POST",
                url: "{{ route('faq_read_am') }}",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    idLetter: idLetter
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = "/faqadmin/faq_in_am/" + response.id;
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
                        url: "{{ route('faq_delete_am') }}",
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

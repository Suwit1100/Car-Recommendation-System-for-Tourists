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

    {{-- Modal --}}
    <div class="modal fade" id="Modal-add-annouce">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title">ประกาศใหม่</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    @php
                        $anoucevalueto = session()->pull('valueto');
                        $anoucevaluetitle = session()->pull('valuetitle');
                        $anoucevaluecontent = session()->pull('valuecontent');
                        // dd($anoucevalue);
                        $to = $anoucevalueto ? $anoucevalueto : '';
                        $title = $anoucevaluetitle ? $anoucevaluetitle : '';
                        $description = $anoucevaluecontent ? $anoucevaluecontent : '';
                        // $fileimg = $anoucevalue ? $anoucevalue['fileimg'] : '';
                    @endphp
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-1  mb-1 d-flex align-items-center">
                                <h6>ถึง</h6>
                            </div>
                            <div class="col-11 my-1 ">
                                @php
                                    $touser = DB::table('users')->get();
                                @endphp
                                <select name="to" id="" class="form-select">
                                    <option value="">
                                        โปรดเลือก</option>
                                    @foreach ($touser as $itouser)
                                        <option {{ $itouser->id == Auth::user()->id ? 'hidden' : '' }}
                                            value="{{ $itouser->id }}">{{ $itouser->name }} {{ $itouser->lastname }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('to'))
                                    <span class="text-danger">{{ $errors->first('to') }}</span>
                                @endif
                            </div>
                            <div class="col-1  my-1 d-flex align-items-center">
                                <h6>เรื่อง</h6>
                            </div>
                            <div class="col-11 my-1 ">
                                <input type="text" class="form-control" name="titlefaq" value="{{ $title }}">
                                @if ($errors->has('titlefaq'))
                                    <span class="text-danger">{{ $errors->first('titlefaq') }}</span>
                                @endif
                            </div>

                            <div class="col-1  my-1 d-flex align-items-center">
                            </div>
                            <div class="col-11 my-1 ">
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-1 d-flex justify-content-start">
                            </div>
                            <div class="col-11 d-flex align-items-center">
                                <i class="bi bi-images" style="font-size: 24px; cursor: pointer; color:#357266;"
                                    id="uploadIcon"></i>
                                <div id="selectedFileName" class="ms-2">ยังไม่ได้เลือกไฟล์</div>
                                <input type="file" id="fileImg" name="fileimg" style="display: none" />
                            </div>
                            @if ($errors->has('fileimg'))
                                <div class="col-1"></div>
                                <div class="col-11 mb-3">
                                    <span class="text-danger">{{ $errors->first('fileimg') }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn rounded-2 btn-add-announce px-3 form-control">ส่ง</button>
                        </div>
                </div>
                </form>
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
            var toSelect = document.querySelector('select[name="to"]');
            var titleInput = document.querySelector('input[name="titlefaq"]');
            var descriptionTextarea = document.querySelector('textarea[name="description"]');
            var errorTo = "{{ $errors->first('to') }}";
            var errorTitle = "{{ $errors->first('titlefaq') }}";
            var errorContent = "{{ $errors->first('description') }}";
            var errorImgfaq = "{{ $errors->first('fileimg') }}";

            var success_annouce = "{{ session('success_annouce') }}"

            var succes_deletefaq = "{{ session('success-deletefaq') }}"
            var successdeletefaqreply = "{{ session('success_deletefaq_reply') }}"


            if (errorTo) {
                Swal.fire({
                    title: 'เกิดข้อผิดพลาด',
                    text: errorTo,
                    icon: 'error',
                    timer: 2000, // แสดง alert 2 วินาทีแล้วหายไป
                }).then(function() {
                    console.log('openmodal');
                    document.querySelector('#open-anounce').click();
                });
            } else if (errorTitle) {
                Swal.fire({
                    title: 'เกิดข้อผิดพลาด',
                    text: errorTitle,
                    icon: 'error',
                    timer: 2000, // แสดง alert 2 วินาทีแล้วหายไป
                }).then(function() {
                    console.log('openmodal');
                    document.querySelector('#open-anounce').click();
                });
            } else if (errorContent) {
                Swal.fire({
                    title: 'เกิดข้อผิดพลาด',
                    text: errorContent,
                    icon: 'error',
                    timer: 2000, // แสดง alert 2 วินาทีแล้วหายไป
                }).then(function() {
                    console.log('openmodal');
                    document.querySelector('#open-anounce').click();
                });
            } else if (errorImgfaq) {
                Swal.fire({
                    title: 'เกิดข้อผิดพลาด',
                    text: errorImgfaq,
                    icon: 'error',
                    timer: 2000, // แสดง alert 2 วินาทีแล้วหายไป
                }).then(function() {
                    console.log('openmodal');
                    document.querySelector('#open-anounce').click();

                });

            } else if (success_annouce) {
                Swal.fire({
                    title: 'สำเร็จ',
                    text: success_annouce,
                    icon: 'success',
                    timer: 2000, // แสดง alert 2 วินาทีแล้วหายไป
                }).then(function() {
                    document.querySelector('a[href="#announce"]').click();
                    toSelect.value = ''; // ตั้งค่าค่าว่างให้กับ select
                    titleInput.value = ''; // ตั้งค่าค่าว่างให้กับ input
                    descriptionTextarea.value = ''; // ตั้งค่าค่าว่างให้กับ textarea
                });
            } else if (succes_deletefaq) {
                Swal.fire({
                    title: 'สำเร็จ',
                    text: succes_deletefaq,
                    icon: 'success',
                    timer: 2000, // แสดง alert 2 วินาทีแล้วหายไป
                });
            } else if (successdeletefaqreply) {
                Swal.fire({
                    title: 'สำเร็จ',
                    text: successdeletefaqreply,
                    icon: 'success',
                    timer: 2000, // แสดง alert 2 วินาทีแล้วหายไป
                }).then(function() {
                    document.querySelector('a[href="#faqsend"]').click();
                    toSelect.value = ''; // ตั้งค่าค่าว่างให้กับ select
                    titleInput.value = ''; // ตั้งค่าค่าว่างให้กับ input
                    descriptionTextarea.value = ''; // ตั้งค่าค่าว่างให้กับ textarea
                });
            }

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
    <script>
        $(document).ready(function() {
            $('#Modal-add-annouce').modal({
                backdrop: 'static', // ป้องกันการปิด Modal ด้วยการคลิกข้างนอก
                keyboard: false // ป้องกันการปิด Modal ด้วยการกดปุ่ม Escape
            });
            $("#uploadIcon").click(function() {
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
        });
    </script>
@endsection

@extends('layout.homeadmin')
@section('style')
    <style>
        .i-back {
            font-size: 24px;
        }

        .profile-faq {
            width: 40px;
            height: 40px;
            border-radius: 100%;
            object-fit: cover;
            object-position: center center;
        }

        .box-text {
            padding: 1rem;
            box-shadow: 5px 5px 10px 0px #c8c8c8;
            border-radius: 5px;
        }

        .modal-body img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            object-position: center center;
        }

        .box-reply {
            width: 100%;
            padding: 1rem;
            box-shadow: 5px 5px 10px 0px #c8c8c8;
            border-radius: 5px;
        }

        .profile-reply {
            width: 40px;
            height: 40px;
            border-radius: 100%;
            object-fit: cover;
            object-position: center center;
        }

        .upimg-reply {
            margin-left: 47px;
        }

        .fa-image {
            color: #23c686;
        }

        .form-control:focus {
            color: #212529;
            background-color: #fff;
            border-color: #23c686;
            outline: 0;
            box-shadow: 0px 0px 2px 3px rgba(35, 198, 134, 0.3);
        }

        .btn-viewimg {
            margin-left: 47px;
        }

        .active>.page-link,
        .page-link.active {
            z-index: 3;
            color: white;
            background-color: #23c686;
            border-color: #0A955F;
        }

        .page-link {
            color: #23c686;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 text-end mt-3">
            <a class="text-dark me-2" href="{{ route('faq_view_am') }}">
                <i class="bi bi-arrow-left-circle-fill" style="font-size: 24px;"></i>
            </a>
        </div>
    </div>
    @include('include.faq-in-admin.box-first')
    @include('include.faq-in-admin.box-reply')
    @include('include.faq-in-admin.box-reply-content')
@endsection
@section('script')
    <script>
        // คลิก upimg
        $(document).ready(function() {
            $('.upimg-reply').click(function(e) {
                e.preventDefault();
                $('#img-reply').click();
            });

            $("#img-reply").change(function() {
                // แสดงชื่อไฟล์ที่ถูกเลือก
                var fileName = $(this).val().split("\\").pop();
                $(".status-upimg").text(fileName);
            });

            // ตอบกลับสำเร็จ
            let success_reply = @json(session('success-reply'));
            if (success_reply) {
                Swal.fire({
                    title: 'สำเร็จ',
                    text: success_reply,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                });
            }
        });
    </script>
@endsection

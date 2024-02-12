@extends(Auth::user()->type == 0 ? 'layout.homeuser' : 'layout.homeadmin')
@section('style')
    <style>
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

        .box-my {
            background-color: #23c686;
            color: white;
            border-radius: 15px;
            box-shadow: 5px 5px 10px 0px #c8c8c8;
            font-size: 20px;
        }

        .box-my .content {
            margin-left: 10px;
            padding: 10px;
        }

        .box-my span {
            margin-left: 5px;
            font-weight: 700;
        }

        .box-hot {
            background-color: #23c686;
            color: white;
            border-radius: 15px;
            box-shadow: 5px 5px 10px 0px #c8c8c8;
            font-size: 20px;
        }

        .box-hot .card-header {
            font-weight: 700;
        }

        .box-hot>.card-header>.text-hot {
            font-size: 16px;
        }

        .img-hot img {
            width: 50px;
            height: 50px;
            border-radius: 100%;
            padding: 0;
        }

        .post-in-img {
            border-radius: 10px;
            box-shadow: 5px 5px 10px 0px #c8c8c8;
        }

        .post-in-img img {
            width: 60%;
            object-fit: cover;
            object-position: center center;


        }

        .post-in-title .title {
            font-size: 25px;
            font-weight: 900;
        }

        .post-in-title .hastag {
            font-size: 15px;
            font-weight: 700;
            color: #777777;
        }

        .postby img {
            width: 40px;
            height: 40px;
            object-fit: contain;
            object-position: center;
            border-radius: 100%;
        }

        .post-in-content {
            border-radius: 10px;
            box-shadow: 5px 5px 10px 0px #c8c8c8;
        }

        .box-like {
            font-size: 20px;
            font-weight: 500;
            color: #134bc5;
        }

        .box-mycomment {
            box-shadow: 5px 5px 10px 0px #c8c8c8;
            border-radius: 10px;
        }

        .img-mycomment img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 100%;
        }

        .date-comment {
            width: 10rem;
        }

        @media only screen and (max-width: 599px) {
            .date-comment {
                width: 6rem;
            }
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-lg-4">
            @include('include.webboard-view.box-my')
            @include('include.webboard-view.box-hot')
        </div>
        <div class="col-12 col-lg-8 mt-2">
            @include('include.webboard-in.content')
            @include('include.webboard-in.mycomment')
            @include('include.webboard-in.datacomment')
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // ถ้าค่าว่าง comment ไม่ได้
            $('#form-comment').submit(function(e) {
                if ($('input[name="content"]').val() === '') {
                    e.preventDefault();
                }
            });

            $('#form-editcomment').submit(function(e) {
                if ($('input[name="edit_comment_content"]').val() === '') {
                    e.preventDefault();
                }
            });

            // like post
            $('.click-like').click(function(e) {
                e.preventDefault();
                $('.click-like').css('pointer-events', 'none');
                let id_post = $(this).data("id-post");
                let like_by = $(this).data("like-by");
                let status = $(this).data("status");
                // console.log(id_post, like_by, status);
                $.ajax({
                    type: "POST",
                    url: "{{ route('webboard_like') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_post: id_post,
                        like_by: like_by,
                        status: status,
                    },
                    success: function(response) {
                        console.log(response);
                        $('.click-like').css('pointer-events', 'auto');
                        $('#text-like').text(response.numlike);
                        $('.click-like').attr('data-status', response.newstatus);
                        if (response.newstatus == 'ready') {
                            $('#regular-heart').attr('hidden', true);
                            $('#solid-heart').attr('hidden', false);
                        } else {
                            $('#regular-heart').attr('hidden', false);
                            $('#solid-heart').attr('hidden', true);
                        }
                    }
                });
            });


            var success_comment = "{{ session('success_comment') }}";
            var success_editcomment = "{{ session('success-editcomment') }}";
            if (success_comment) {
                Swal.fire({
                    icon: 'success',
                    title: 'คอมเม้นกระทู้แล้ว',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                });
            }
            if (success_editcomment) {
                Swal.fire({
                    icon: 'success',
                    title: success_editcomment,
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                });
            }
        });

        // ลบ comment
        $(document).on('click', '.click-delete-comment', function() {
            let id_comment = $(this).data("id-comment");
            let id_post = $(this).data("id-post");
            $.ajax({
                type: "POST",
                url: "{{ route('delete_comment') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id_comment: id_comment,
                    id_post: id_post
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                    }).then((result) => {
                        location.reload();
                    });
                }
            });
        });
    </script>
@endsection

@extends('layout.homeuser')
@section('style')
    <style>
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

        .post {
            box-shadow: 5px 5px 10px 0px #c8c8c8;
            border-radius: 10px;
        }

        .post-noimg {
            box-shadow: 5px 5px 10px 0px #c8c8c8;
            border-radius: 10px;
        }

        .text-noimg {
            height: 170px;
        }


        .img-post img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            object-position: center center;
            border: 1px solid #c8c8c8;
            margin: 3px;
            border-radius: 10px;
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

        .click-post {
            text-decoration-line: none;
            color: #000000;
        }

        .dropdown-menu {
            --bs-dropdown-link-active-bg: #23c686;
        }

        @media screen and (max-width: 600px) {
            .create-post {
                margin-top: 5px;
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
        <div class="col-12 col-lg-8">
            @include('include.webboard-my-comment.search')
            @include('include.webboard-my-comment.post')
        </div>
    </div>
@endsection
@section('script')
    <script>
        // เปิดอ่านโพสต์
        $(document).on('click', '.click-post', function() {
            let id_post = $(this).data("id-post");
            console.log(id_post);

            $.ajax({
                type: "post",
                url: "{{ route('increment_post') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    idpost: id_post
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = "/webboard/webborad_in/" + response.idpost;
                }
            });
        });
    </script>
@endsection

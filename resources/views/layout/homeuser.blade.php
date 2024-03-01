<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Car Recommendation</title>

    {{-- bt5 st --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- bt5 ed --}}

    {{-- font st --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    {{-- font ed --}}

    {{-- awesomeicon st --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- awesomeicon ed --}}



    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        body {
            background-color: #fbfcf6;

        }

        .navbar {
            box-shadow: 2px 2px 4px 1px rgb(0, 0, 0, 0.2);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }



        .btn-shadow {
            border-radius: 5px;
            border: 1px rgba(0, 0, 0, 0.3);
            box-shadow: 2px 2px 4px 1px rgb(0, 0, 0, 0.2);
            color: #1d3853;
        }

        .btn-white {
            background-color: white;
            color: #1d3853;
        }

        .btn-white:hover {
            background-color: #1d3853;
            color: white;
        }

        .box-notify {
            background-color: #23c686;
            color: #fbfcf6;
            position: absolute;
            width: 550px;
            top: 67px;
            right: 175px;
            display: none;
            border-radius: 10px;
            height: auto;
            z-index: 2;
        }

        #notify-box {
            color: #fbfcf6;
        }

        .box-content {

            background-color: rgb(255, 255, 255);
            border-radius: 10px;
            box-shadow: 2px 2px 4px 1px rgb(0, 0, 0, 0.2);
        }


        .navbar-brand img {
            border-radius: 100%;
            box-shadow: 2px 2px 4px 1px rgb(0, 0, 0, 0.2);
        }

        .menumobile,
        .btn-toggler-profile {
            display: none;
        }

        .navbar-collapse {
            display: flex;
            justify-content: flex-end;
        }

        section#offcanvasBottom {
            height: 90vh;
            border-radius: 10px;
            background-color: #23c686;
        }

        aside#sideprofile {
            background-color: #23c686;
            border-radius: 10px;
            width: 250px;
        }

        aside#sidebar {
            background-color: #23c686;
            border-radius: 10px;
            width: 250px;
        }

        .offcanvas.offcanvas-start {
            top: 64px;
            left: 0px;
            width: var(--bs-offcanvas-width);
            border-right: var(--bs-offcanvas-border-width) solid var(--bs-offcanvas-border-color);
            transform: translateX(-100%);
        }

        .offcanvas.offcanvas-end {
            top: 64px;
            right: 0;
            width: var(--bs-offcanvas-width);
            border-left: var(--bs-offcanvas-border-width) solid var(--bs-offcanvas-border-color);
            transform: translateX(100%);
        }

        .close-chatbot {
            visibility: hidden;
        }

        .scroll-up {
            position: fixed;
            bottom: 20px;
            color: white;
            z-index: 99;
            width: 51px;
            height: 51px;
            background-color: #23c686;
            border-radius: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0.6;
            font-size: 32px;
            visibility: hidden;
        }

        @media screen and (max-width: 575px) {
            .menupc {
                display: none;
            }

            .menumobile {
                display: block;
            }

            .btn-toggler-profile {
                display: block;
                margin-right: 8px;
            }

            .navbar-collapse {
                display: block;

            }

            .offcanvas.offcanvas-start {
                top: 0px;
                left: 0px;
                width: var(--bs-offcanvas-width);
                border-right: var(--bs-offcanvas-border-width) solid var(--bs-offcanvas-border-color);
                transform: translateX(-100%);
            }

            .offcanvas.offcanvas-end {
                top: 0px;
                right: 0;
                width: var(--bs-offcanvas-width);
                border-left: var(--bs-offcanvas-border-width) solid var(--bs-offcanvas-border-color);
                transform: translateX(100%);
            }

        }

        @media screen and (max-width: 500px) {
            .close-chatbot {
                visibility: hidden;
                background: #42A5F5;
                width: 40px;
                height: 40px;
                position: fixed;
                right: 30px;
                top: 82px;
                z-index: 101;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 100%;
                font-size: 20px;
                color: white;
            }
        }

        /* notifypc st */
        .notiprofile img {
            border-radius: 100%;
            width: 40px;
            height: 40px;
        }

        .notyetread {
            width: 10px;
            height: 10px;
            border-radius: 100%;
            background-color: #9fcdfd;
            box-sizing: border-box;
        }

        .hovernoti:hover {
            background-color: #0A955F;
            color: #fbfcf6;
            border-radius: 10px;
        }

        /* notifypc ed */


        /* sidebar st */
        .offcanvas-body ul {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style-type: none;
        }

        .offcanvas-body ul li a {
            text-decoration: none;
            color: white;
        }

        .offcanvas-body ul li {
            padding: 10px 20px 10px 20px;
            border-radius: 10px;
            font-size: 16px;
            color: white;
            font-weight: 500;
        }

        .offcanvas-body ul li:hover {
            color: white;
            background-color: #0A955F;
        }

        .notimobile-text {
            color: white;
        }

        /* sidevbar ed */

        .box-top {
            margin-bottom: 60px;
        }

        .active-leftside {
            background-color: #0A955F;
        }
    </style>
    <style>
        .shadow {
            box-shadow: 2px 2px 4px 1px rgb(0, 0, 0, 0.2);
        }

        .border-radius {
            border-radius: 10px;
        }

        .text-8-normal {
            font-weight: 500;
            font-size: 8px;
        }

        .text-8-bold {
            font-weight: 700;
            font-size: 8px;
        }

        .text-8-bolder {
            font-weight: 900;
            font-size: 8px;
        }

        .text-10-normal {
            font-weight: 500;
            font-size: 10px;
        }

        .text-10-bold {
            font-weight: 700;
            font-size: 10px;
        }

        .text-10-bolder {
            font-weight: 900;
            font-size: 10px;
        }

        .text-12-normal {
            font-weight: 500;
            font-size: 12px;
        }

        .text-12-bold {
            font-weight: 700;
            font-size: 12px;
        }

        .text-12-bolder {
            font-weight: 900;
            font-size: 12px;
        }

        .text-14-normal {
            font-weight: 500;
            font-size: 14px;
        }

        .text-14-bold {
            font-weight: 700;
            font-size: 14px;
        }

        .text-14-bolder {
            font-weight: 900;
            font-size: 14px;
        }

        .text-16-normal {
            font-weight: 500;
            font-size: 16px;
        }

        .text-16-bold {
            font-weight: 700;
            font-size: 16px;
        }

        .text-16-bolder {
            font-weight: 900;
            font-size: 16px;
        }

        .text-18-normal {
            font-weight: 500;
            font-size: 18px;
        }

        .text-18-bold {
            font-weight: 700;
            font-size: 18px;
        }

        .text-18-bolder {
            font-weight: 900;
            font-size: 18px;
        }

        .text-20-normal {
            font-weight: 500;
            font-size: 20px;
        }

        .text-20-bold {
            font-weight: 700;
            font-size: 20px;
        }

        .text-20-bolder {
            font-weight: 900;
            font-size: 20px;
        }

        .text-22-normal {
            font-weight: 500;
            font-size: 22px;
        }

        .text-22-bold {
            font-weight: 700;
            font-size: 22px;
        }

        .text-22-bolder {
            font-weight: 900;
            font-size: 22px;
        }

        .text-24-normal {
            font-weight: 500;
            font-size: 24px;
        }

        .text-24-bold {
            font-weight: 700;
            font-size: 24px;
        }

        .text-24-bolder {
            font-weight: 900;
            font-size: 24px;
        }

        .text-26-normal {
            font-weight: 500;
            font-size: 26px;
        }

        .text-26-bold {
            font-weight: 700;
            font-size: 26px;
        }

        .text-26-bolder {
            font-weight: 900;
            font-size: 26px;
        }



        .icon-20 {
            font-size: 20px;
            color: #1d3853;
        }

        .icon-20-white {
            font-size: 20px;
            color: #ffffff;
        }

        .bg-green {
            background-color: #23c686;
        }

        .bg-green-hover {
            background-color: #0A955F;
        }

        .bg-blue {
            background-color: #1d3853;
        }

        .text-green {
            color: #23c686;
        }

        .text-green-hover {
            color: #0A955F;
        }

        .text-blue {
            color: #1d3853;
        }

        .btn-green {
            background-color: #23c686;
            color: white;
        }

        .btn-green:disabled {
            background-color: #73bea0;
            color: white;
        }

        .btn-green:hover {
            background-color: #0A955F;
            color: white;
        }

        .btn-white {
            background-color: #ffffff;
            color: #1d3853;
        }

        .btn-white:hover {
            background-color: #1d3853;
            color: #ffffff;
        }

        .shadow-hover:hover {
            box-shadow: 0px 0px 2px 2px #23c686;
        }

        .bg-green:disabled {
            background-color: #569a7f;
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

        .form-check-input:checked {
            background-color: #23c686;
            border-color: #23c686;
        }

        .form-check-input:focus {
            box-shadow: 0px 0px 2px 3px rgba(35, 198, 134, 0.3);
        }

        .form-control:focus {
            box-shadow: 0px 0px 2px 3px rgba(35, 198, 134, 0.3);
        }

        .box-notify {
            max-height: 500px;
            overflow-y: auto;
            overflow-x: none;
        }

        .tooltip-token {
            display: none;
            height: 450px;
            overflow-y: auto;

        }

        .imgtooltip {
            display: flex;
            justify-content: center;
        }

        .imgtooltip img {
            max-width: 100%;
            height: 230px;
            object-fit: cover;
            object-position: center center;
        }
    </style>


    @yield('style')
</head>

<body>
    @include('include.homeuser.nav')
    @include('include.homeuser.leftside')
    @include('include.homeuser.rightside')
    @include('include.homeuser.bottomside')

    <div class="box-top">
        <hr>
    </div>
    <main class="box-content mt-5" id="box-content">
        @yield('slideimg')
        <div class="container-fluid">
            @yield('content')

            <span class="close-chatbot">
                <i class="fa-solid fa-xmark"></i>
            </span>

            <span class="scroll-up" role="button">
                <i class="fa-solid fa-angle-up"></i>
            </span>
        </div>
    </main>

    <df-messenger intent="WELCOME" chat-title="BotNoi" agent-id="223ebc82-6fda-44f2-a46d-cd4b5b87fd9f"
        language-code="th" chat-icon="https://i.ibb.co/txRDYQX/technical-support.png"></df-messenger>



    {{-- jquery st --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- jquery ed --}}

    {{-- bt 5 st --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- bt 5 ed --}}

    {{-- dialogflow --}}
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>

    {{-- sweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            //CHATBOT
            // check การเปิดปิด chatbot st
            // Select the target node
            var target = $('df-messenger')[0];

            // Create a new instance of MutationObserver
            var observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    // Check if the 'expanded' attribute has changed
                    if (mutation.attributeName === 'expand') {
                        // Trigger your custom function when the 'expand' attribute changes
                        yourCustomFunction();
                    }
                });
            });

            // Configuration of the observer
            var config = {
                attributes: true,
                childList: false,
                subtree: false
            };

            // Start observing the target node for configured mutations
            observer.observe(target, config);

            function yourCustomFunction() {
                // Your custom logic goes here
                var isExpanded = $('df-messenger').is('[expand]');
                var newWidth = $(window).width();
                if (isExpanded && newWidth < 500) {
                    // The 'expand' attribute is present, perform your actions here
                    console.log('is expand.');
                    $('.close-chatbot').css('visibility', 'visible');
                } else {
                    console.log('is not expand.');
                    $('.close-chatbot').css('visibility', 'hidden');
                }

            }
            // check การเปิดปิด chatbot ed

            // ปิด chatbot mobile st
            $('.close-chatbot').click(function(e) {
                const dfMessenger = document.querySelector('df-messenger');
                $(dfMessenger).remove();
                $('.close-chatbot').css('visibility', 'hidden');

                setTimeout(function() {
                    $('body').append(
                        '<df-messenger intent="WELCOME" chat-title="BotNoi" agent-id="223ebc82-6fda-44f2-a46d-cd4b5b87fd9f" language-code="th" chat-icon="https://i.ibb.co/txRDYQX/technical-support.png"></df-messenger>'
                    );
                    var target = $('df-messenger')[0];
                    var observer = new MutationObserver(function(mutations) {
                        mutations.forEach(function(mutation) {
                            if (mutation.attributeName === 'expand') {
                                yourCustomFunction();
                            }
                        });
                    });
                    var config = {
                        attributes: true,
                        childList: false,
                        subtree: false
                    };
                    observer.observe(target, config);

                    function yourCustomFunction() {
                        var isExpanded = $('df-messenger').is('[expand]');
                        if (isExpanded) {
                            console.log('is expand.');
                            $('.close-chatbot').css('visibility', 'visible');
                        } else {
                            console.log('is not expand.');
                            $('.close-chatbot').css('visibility', 'hidden');
                        }
                    }
                }, 100);
            });
            // ปิด chatbot mobile ed
            //CHATBOT

            //NOTIFY
            $(".noti-show").click(function() {
                $(".box-notify").fadeToggle(300);
            });

            // โหลด notify
            var ENDPOINT = "{{ route('load_more_notify') }}";
            var page = 1;

            $("#more-notify").click(function() {
                page++;
                LoadMore(page);
            });

            function LoadMore(page) {
                $.ajax({
                        url: "{{ route('load_more_notify') }}",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            page: page
                        },
                    })
                    .done(function(response) {
                        console.log(response);
                        if (response.html == '') {
                            $('#no-noti').html("ไม่มีแจ้งเตือนเพิ่ม");
                            return;
                        }
                        $("#data-wrapper").append(response.html);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log('Server error occurred');
                    });
            };

            // อ่าน notify

            //NOTIFY

            // SCORLL DOWN
            $(window).scroll(function() {
                if ($(this).scrollTop() > 300) {
                    // console.log(70);
                    $('.scroll-up').css('visibility', 'visible');
                } else {
                    // console.log('<70');
                    $('.scroll-up').css('visibility', 'hidden');
                }
            });

            $('.scroll-up').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 'fast');
            });
            // SCORLL DOWN

            // TOKEN
            // เช็คว่ามีการเปลี่ยนค่าที่ฟอร์มป่าว token
            var initialTokenValue = $('#tokenline').val();
            $('#tokenline').on('input', function() {
                if ($(this).val() !== initialTokenValue) {
                    $('#token_submit').prop('disabled', false);
                } else {
                    $('#token_submit').prop('disabled', true);
                }
            });

            // เปิดปิดแจ้งเตือน
            $('#flexSwitchCheckDefault').on('change', function() {
                let val_status;
                if ($(this).prop('checked')) {
                    console.log('Checkbox ถูกติ๊กแล้ว');
                    val_status = 'on';
                } else {
                    console.log('Checkbox ไม่ถูกติ๊ก');
                    val_status = 'off';
                }

                $.ajax({
                    type: "post",
                    url: "{{ route('status_token') }}",
                    data: {
                        _token: '{{ csrf_token() }}',
                        val_status: val_status
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status_success) {
                            Swal.fire({
                                title: 'สำเร็จ',
                                text: response.status_success,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000,
                                timerProgressBar: true,
                            });
                        }
                    }
                });
            });

            let save_token = @json(session('save_token'));
            if (save_token) {
                Swal.fire({
                    title: 'สำเร็จ',
                    text: save_token,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                });
            }

            // เปิดปิด tooltip
            $('.tooltip-token').hide();
            $('#click-tooltip').click(function(e) {
                e.preventDefault();
                $('.tooltip-token').slideDown();
            });

            $('#close-tooltip').click(function(e) {
                e.preventDefault();
                $('.tooltip-token').slideUp();
            });
            // TOKEN

            // STnotimobile
            $(window).on('load resize', function() {
                if (window.innerWidth < 768) {
                    console.log(2222);
                    $('#notify-box').appendTo('#box-noti-mobile');
                } else {
                    $('#notify-box').appendTo('#box-noti-pc');
                }
            });
            // EDnotimobile

        });

        $(document).on('click', '.click-read-notify', function(e) {
            e.preventDefault();
            const web_id = $(this).data("web_id");
            const faq_id = $(this).data("faq_id");
            const noti_id = $(this).data("noti_id");
            console.log(web_id, faq_id);

            $.ajax({
                type: "get",
                url: "{{ route('read_notify_user') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    web_id: web_id,
                    faq_id: faq_id,
                    noti_id: noti_id,
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = response.href;
                }
            });
        });
    </script>

    @yield('script')
</body>

</html>

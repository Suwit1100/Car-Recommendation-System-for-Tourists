<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Car Reccomendation</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    {{-- modal bt5 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- modal bt5 --}}

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    {{-- awesomeicon st --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- awesomeicon ed --}}

    {{-- sweeetalert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    {{-- sweeetalert --}}


    {{-- font notosan --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @yield('style')
</head>

<body>
    <style>
        /*
        DEMO STYLE
        */

        * {
            font-family: 'Noto Sans Thai', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        .content-main {
            max-width: 100%;
            max-height: 100%
        }

        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Kanit', sans-serif;
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar {
            padding: 15px 10px;
            background: #357266;
            border: none;
            border-radius: 0;
            margin-bottom: 1rem;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #ddd;
            margin: 40px 0;
        }

        i,
        span {
            display: inline-block;
        }

        /* ---------------------------------------------------
        SIDEBAR STYLE
        ----------------------------------------------------- */

        .wrapper {
            display: flex;
            align-items: stretch;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #357266;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar.active {
            min-width: 80px;
            max-width: 80px;
            text-align: center;
        }

        #sidebar.active .sidebar-header h3,
        #sidebar.active .CTAs {
            display: none;
        }

        #sidebar.active .sidebar-header strong {
            display: block;
        }

        #sidebar ul li a {
            text-align: left;
        }

        #sidebar.active ul li a {
            padding: 20px 10px;
            text-align: center;
            font-size: 0.85em;
        }

        #sidebar.active ul li a i {
            margin-right: 0;
            display: block;
            font-size: 1.8em;
            margin-bottom: 5px;
        }


        #sidebar.active ul ul a {
            padding: 10px !important;
        }

        #sidebar.active .dropdown-toggle::after {
            top: auto;
            bottom: 10px;
            right: 50%;
            -webkit-transform: translateX(50%);
            -ms-transform: translateX(50%);
            transform: translateX(50%);
        }

        #sidebar .sidebar-header {
            padding: 13px;
            /* background: #257366; */
        }

        #sidebar .sidebar-header2 {
            padding: 14px;
            /* background: #257366; */
        }

        #sidebar .sidebar-header strong {
            display: none;
            font-size: 1.8em;
        }

        #sidebar ul.components {
            padding: 0;
            /* border-bottom: 1px solid #10231f; */
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #357266;
            background: #fff;
        }

        #sidebar ul li a i img {
            margin-right: 10px;
        }

        #sidebar ul li.active>a {
            color: #fff;
            background: #10231f;
        }

        a[aria-expanded="true"] {
            color: #fff;
            background: #357266;
        }


        a[data-toggle="collapse"] {
            position: relative;

        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #357266;
        }

        ul.CTAs {
            padding: 20px;
        }

        ul.CTAs a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        a.download {
            background: #fff;
            color: #7386D5;
        }

        a.article,
        a.article:hover {
            background: #10231f !important;
            color: #fff !important;
        }

        /* ---------------------------------------------------
        CONTENT STYLE
        ----------------------------------------------------- */

        #content {
            width: 100%;
            /* padding: 20px; */
            min-height: 100vh;
            transition: all 0.3s;
        }

        .toggle-sidebar {
            color: #357266;
        }

        .icon-remove-margin {
            margin-left: 0;
            margin-right: 5px;
        }

        .size-menu-a {
            width: 24px !important;
            height: 24px !important;
        }

        .size-menu-n {
            width: 17.6px !important;
            height: 17.6px !important;
        }

        .btn-toggle {
            color: white;
            background-color: #10231f !important;
        }

        .btn-toggle:hover {
            color: #357266;
            background-color: white !important;
        }

        .img_profile {
            width: 40px;
            height: 40px;
            border-radius: 100%;
            cursor: pointer;
        }

        /* สไตล์ของเมนูดรอปดาวน์ */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 70px;
            right: 21px;
            background-color: #f9f9f9;
            min-width: 250px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* .dropdown:hover .dropdown-content {
            display: block;
        } */

        /* สไตล์ของรายการในเมนูดรอปดาวน์ */
        .dropdown-content a {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: #333;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }





        /* ---------------------------------------------------
        MEDIAQUERIES
        ----------------------------------------------------- */

        @media (max-width: 768px) {
            #sidebar {
                min-width: 80px;
                max-width: 80px;
                text-align: center;
                margin-left: -80px !important;
            }

            .dropdown-toggle::after {
                top: auto;
                bottom: 10px;
                right: 50%;
                -webkit-transform: translateX(50%);
                -ms-transform: translateX(50%);
                transform: translateX(50%);
            }

            #sidebar.active {
                margin-left: 0 !important;
            }

            #sidebar .sidebar-header h3,
            #sidebar .CTAs {
                display: none;
            }

            #sidebar .sidebar-header strong {
                display: block;
            }

            #sidebar ul li a {
                padding: 20px 10px;
            }

            #sidebar ul li a span {
                font-size: 0.85em;
            }

            #sidebar ul li a i {
                margin-right: 0;
                display: block;
            }

            #sidebar ul ul a {
                padding: 10px !important;
            }

            #sidebar ul li a i {
                font-size: 1.3em;
            }

            #sidebar {
                margin-left: 0;
            }

            #sidebarCollapse span {
                display: none;
            }
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

        .bg-green {
            background-color: #23c686;
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
    </style>

    <div class="wrapper">
        <!-- Sidebar  -->
        @include('include.homeadmin.sidebar')

        <!-- Page Content  -->
        <div id="content">
            <!-- navbar -->
            @include('include.homeadmin.nav')
            <!-- เนื้อหา -->
            @yield('content')


        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>



    {{-- chatbot --}}
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    {{-- chatbot --}}

    {{-- ajax --}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    {{-- ajax --}}

    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
    {{-- sweetalert2 --}}

    @yield('script')

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');

                if ($('#sidebar').hasClass('active')) {
                    console.log('active');
                    $('#logo-header').removeClass('sidebar-header2');
                    $('#iconmenu').removeClass('size-menu-n');
                    $('#iconmenu').addClass('size-menu-a');

                } else {
                    console.log('notactive');
                    $('#logo-header').addClass('sidebar-header2');
                    $('#iconmenu').removeClass('size-menu-a');
                    $('#iconmenu').addClass('size-menu-n');

                }
            });

            $('#dashborad').hover(
                function() {
                    if ($('#dashborad').hasClass('active')) {
                        $('#dashborad-white').show();
                    } else {
                        $('#dashborad-white').hide();
                        $('#dashborad-green').show();
                    }
                    // console.log('เข้า');

                },
                function() {
                    // console.log('ออก');
                    $('#dashborad-green').hide();
                    $('#dashborad-white').show();
                }
            );
        });

        if (!$('#sidebar').hasClass('active')) {
            console.log('notactive');
            $('#logo-header').addClass('sidebar-header2');
            $('#iconmenu').removeClass('size-menu-a');
            $('#iconmenu').addClass('size-menu-n');
        }

        //token
        // เช็คว่ามีการเปลี่ยนค่าที่ฟอร์มป่าว token
        var initialTokenValue = $('#tokenline').val();
        $('#tokenline').on('input', function() {
            if ($(this).val() !== initialTokenValue) {
                $('#token_submit').prop('disabled', false);
            } else {
                $('#token_submit').prop('disabled', true);
            }
        });

        // เปิดปิด token
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
        //token

        $(document).ready(function() {
            //LODE MORE NOTI
            var page = 1;
            $("#more-notify-admin").click(function() {
                page++;
                LoadMore(page);
            });

            function LoadMore(page) {
                $.ajax({
                        url: "{{ route('load_more_noti_admin') }}",
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
                            $('#more-notify-admin').hide();
                            return;
                        }
                        $("#data-wrapper").append("<div class='row'>" + response.html + "</div>");
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log('Server error occurred');
                    });
            };
            //LODE MORE NOTI
        });

        $(document).on('click', '.click_read_noti_admin', function(e) {
            e.preventDefault();
            const web_id = $(this).data("web_id");
            const faq_id = $(this).data("faq_id");
            const noti_id = $(this).data("noti_id");
            console.log(web_id, faq_id);

            $.ajax({
                type: "get",
                url: "{{ route('read_notify_admin') }}",
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



</body>

</html>

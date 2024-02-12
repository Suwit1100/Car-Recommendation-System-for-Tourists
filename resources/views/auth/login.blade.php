<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

</head>

<body>
    <style>
        * {
            font-family: 'Noto Sans Thai', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        .logo img {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .text-welcome {
            font-weight: 900;
            font-size: 30px;
            text-align: center;
        }

        .text-welcome p {
            font-weight: 500;
            font-size: 15px;
            text-align: center;
        }

        .boxinput {
            font-size: 15px;
            color: black;
            font-weight: 500;
        }

        .boxinput button {
            font-size: 1.25rem;
            background-color: #23c686;
            color: white;
        }

        .boxinput button:hover {
            background-color: #0A955F;
            color: white;
        }

        .boxinput .form-control:focus {
            box-shadow: 0px 0px 2px 3px rgba(35, 198, 134, 0.3);
        }

        .boxinput .form-check-input:focus {
            box-shadow: 0px 0px 2px 3px rgba(35, 198, 134, 0.3);
            border: none;
        }

        .boxinput .form-check-input:checked {
            background-color: #23C686;
            border: none;
        }

        .applogin a {
            text-decoration: none;
            font-weight: 700;
        }

        .applogin img {
            width: 25px;
            height: 25px;
        }

        .applogin a:hover {
            box-shadow: 0px 0px 2px 3px #23c686;
            color: black;
        }
    </style>
    <div class="container">
        <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="row">
                {{-- logo st --}}
                <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="logo">
                        <img src="{{ asset('/assets/imglogin/logo.png') }}">
                    </div>
                </div>
                {{-- logo ed --}}

                {{-- content st --}}
                <div class="col-12 col-lg-6 ">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="text-welcome">
                                <span>CAR RECOMMENTDATION</span>
                                <p>ยินดีต้อนรับ! กรุณากรอกข้อมูลเพื่อเข้าสู่ระบบของคุณ</p>
                            </div>
                        </div>
                        {{-- form st --}}
                        <div class="col-12 mt-3">
                            <div class="boxinput">
                                <form action="{{ route('login_post') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <input type="text" class="form-control form-control-lg"
                                                placeholder="ชื่อผู้ใช้" id="username" name="email">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="password" class="form-control form-control-lg"
                                                placeholder="รหัสผ่าน" id="password" name="password">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <button type="submit"
                                                class="btn form-control  shadow-sm">เข้าสู่ระบบ</button>
                                        </div>
                                        {{-- <div class="col-6 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                จดจำฉัน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end mb-3">
                                        <a href="">ลืมรหัสผ่าน</a>
                                    </div> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{-- form st --}}

                        {{-- or st --}}
                        <div class="col-5">
                            <hr class="border border-3 border-secondary">
                        </div>
                        <div class="col-2 text-or text-center" style="font-size: 15px; font-weight:500; color:black;">
                            หรือ
                        </div>
                        <div class="col-5">
                            <hr class="border border-3 border-secondary">
                        </div>
                        {{-- or ed --}}

                        {{-- appsingin st --}}
                        {{-- <div class="col-12 mt-3 mb-3">
                        <div class="applogin">
                            <a href="#" id="google" class="form-control  mb-3 text-center">
                                <img src="{{ asset('/assets/imgloginpage/google.png') }}" alt="">
                                <span>GOOGLE</span></a>
                            <a href="#" id ="line" class="form-control  mb-3 text-center">
                                <img src="{{ asset('/assets/imgloginpage/line.png') }}" alt="">
                                <span>LINE</span></a></a>
                        </div>
                    </div> --}}
                        {{-- appsingin st --}}

                        <div class="col-12 mb-5">
                            <div class="toregis text-center" style="font-size: 15px; font-weight:500; color:black;">
                                <span>หากคุณยังไม่มีบัญชีสมัครได้ที่นี้</span>
                                <span class="ms-2"><a href="{{ route('register_view') }}">ลงทะเบียน</a></span>
                            </div>
                        </div>


                    </div>
                </div>
                {{-- content ed --}}


            </div>
        </div>
    </div>
    {{-- bt 5 st --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- bt 5 ed --}}

    {{-- sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>

    {{-- jquey --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            var error_login = "{{ session('error') }}";
            console.log(error_login);
            if (error_login) {
                Swal.fire({
                    icon: "error",
                    title: "ข้อผิดพลาด",
                    text: error_login,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000
                });

            }
        });
    </script>
</body>

</html>

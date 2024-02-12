<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

        .btn-back i {
            color: black;
            font-size: 25px;
        }

        .text-welcome span {
            font-weight: 900;
            font-size: 30px;
            text-align: center;
        }

        .text-welcome p {
            font-weight: 500;
            font-size: 15px;
            text-align: center;
        }


        /* step css st */
        .stepper {
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stepper ul {
            padding: 0;
        }

        .stepper li {
            list-style-type: none;
            text-align: center;
            display: block;
        }

        .stepper .areastep {
            box-sizing: border-box;
            padding: 2px 10px 2px 10px;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 2px 2px 3px 2px rgb(213, 213, 213, 0.3);
        }

        .activestep {
            box-sizing: border-box;
            padding: 2px 10px 2px 10px;
            border-radius: 5px;
            background-color: #23C686;
            color: #ffffff;
            box-shadow: 2px 2px 3px 2px rgb(213, 213, 213, 0.3);
        }

        .stepper li::after {
            content: " ";
            line-height: 30px;
            width: 5px;
            height: 60px;
            border: 1px solid #ddd;
            border-left: none;
            display: block;
            text-align: center;
            margin: 0 auto 0px;
            background-color: #eee;
        }

        .stepper li:last-child:after {
            content: none;
        }

        @media screen and (max-width: 991px) {
            .stepper {
                padding: 10;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .stepper ul {
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .stepper li {
                list-style-type: none;
                text-align: center;
                display: flex;
                align-items: center;
                justify-content: center;

            }

            .stepper li::after {
                content: " ";
                line-height: 30px;
                width: 50px;
                height: 5px;
                border: 1px solid #ddd;
                border-left: none;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                margin: 0 auto 0px;
                background-color: #eee;
            }
        }

        .step2 {
            display: none;
        }

        .step3 {
            display: none;
        }

        /* step ed */
    </style>
    <div class="container ">
        <div class="row">
            <div class="col-12 mt-1">
                <div class="btn-back">
                    <a href="{{ route('login') }}"><i class="bi bi-arrow-left-circle"></i></a>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="row">
                <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="logo">
                        <img src="{{ asset('assets/imgregister/logo.png') }}" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex flex-wrap-reverse mt-1 align-items-center">
                    <div class="col-12 col-lg-2 ">
                        <div class="stepper ">
                            <ul>
                                <li>
                                    <div class="activestep " id="boxst1">1</div>
                                </li>
                                <li><span class="areastep" id="boxst2">2</span></li>
                                <li><span class="areastep" id="boxst3">3</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10">
                        <div class="text-welcome text-center">
                            <span>
                                สมัครสมาชิก
                            </span>
                            <p class="title-regis">
                                ข้อมูลเบื้องต้น
                            </p>
                        </div>
                        <form action="register_post" method="post" id="regis-form">
                            @csrf
                            <div class="form-register mt-2 step1">
                                <div class="row">
                                    <div class="col-6 mt-3">
                                        <input type="text" name="name" id="name"
                                            class="form-control form-control-lg" placeholder="ชื่อ">
                                    </div>
                                    <div class="col-6 mt-3">
                                        <input type="text" name="lastname" id="lastname"
                                            class="form-control form-control-lg" placeholder="นามสกุล">
                                    </div>
                                    <div class="col-8 mt-3">
                                        <input type="date" name="birthday" id="birthday"
                                            class="form-control form-control-lg" placeholder="วันเกิดห">
                                    </div>
                                    <div class="col-2 mt-3">
                                        <input type="radio" class="btn-check" name="sex" id="male"
                                            autocomplete="off" value="male" checked>
                                        <label class="btn form-control form-control-lg" for="male"><i
                                                class="bi bi-gender-male"></i></label>
                                    </div>
                                    <div class="col-2 mt-3">
                                        <input type="radio" class="btn-check" name="sex" id="female"
                                            autocomplete="off" value="female">
                                        <label class="btn form-control form-control-lg" for="female"><i
                                                class="bi bi-gender-female"></i></label>
                                    </div>
                                    <div class="col-12 mt-3 d-flex justify-content-end">
                                        <a href="#" style="color: black" class="nextstep2"><i
                                                class="bi bi-arrow-right-square" style="font-size: 25px;"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-register mt-2 step2">
                                <div class="row align-items-center">
                                    <div class="col-4 mt-3 ">ภาค</div>
                                    <div class="col-8 mt-3">
                                        <select name="region" id="region" class="form-select">
                                            <option value="">โปรดเลือกภาค</option>
                                            @foreach ($region as $liregion)
                                                <option value="{{ $liregion->name }}"
                                                    data-region-id="{{ $liregion->id }}">
                                                    {{ $liregion->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4 mt-3">จังหวัด</div>
                                    <div class="col-8 mt-3">
                                        <select name="povinces" id="povinces" class="form-select" disabled>
                                            <option value="">โปรดเลือกจังหวัด</option>
                                        </select>
                                    </div>
                                    <div class="col-4 mt-3">อำเภอ</div>
                                    <div class="col-8 mt-3">
                                        <select name="district" id="district" class="form-select" disabled>
                                            <option value="">โปรดเลือกอำเภอ</option>
                                        </select>
                                    </div>
                                    <div class="col-4 mt-3">ตำบล</div>
                                    <div class="col-8 mt-3">
                                        <select name="sub_district" id="sub_district" class="form-select" disabled>
                                            <option value="">โปรดเลือกตำบล</option>
                                        </select>
                                    </div>
                                    <div class="col-4 mt-3">รหัสไปรษณีย์</div>
                                    <div class="col-8 mt-3">
                                        <select name="zipcode" id="zipcode" class="form-select" disabled>
                                            <option value="">โปรดเลือกรหัสไปรษณีย์</option>
                                        </select>
                                    </div>
                                    <div class=" col-12 d-flex  row w-100 p-0 mt-2">
                                        <div class="col-6">
                                            <a href="#" style="color: black" class="backst1"><i
                                                    class="bi bi-arrow-left-square" style="font-size: 25px;"></i></a>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end p-0">
                                            <a href="#" style="color: black" class=" nextstep3"><i
                                                    class="bi bi-arrow-right-square" style="font-size: 25px;"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-register mt-2 step3">
                                <div class="row align-items-center">
                                    <div class="col-12 mt-3">
                                        <input type="email" name="email" id="email"
                                            class="form-control form-control-lg" placeholder="อีลเมล">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-lg" placeholder="รหัสผ่าน">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <input type="password" name="password_confirmation"
                                            id="password_confirmation" class="form-control form-control-lg"
                                            placeholder="ยืนยันรหัสผ่าน">
                                    </div>
                                    <div class=" col-12 d-flex  row w-100 p-0 mt-2">
                                        <div class="col-6">
                                            <a href="#" style="color: black" class="backst2"><i
                                                    class="bi bi-arrow-left-square" style="font-size: 25px;"></i></a>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end p-0">
                                            <a href="#" style="color: black" class="submit-form-regis"><i
                                                    class="bi bi-arrow-right-square" style="font-size: 25px;"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- bt 5 st --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- bt 5 ed --}}

    {{-- sweetalert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // เลื่อนหน้า st
            $('.nextstep2').on('click', function() {
                console.log(11111111);
                $('.step1').hide();
                $('.step2').show();
                $('.title-regis').text('ที่อยู่');
                $('#boxst2').removeClass('areastep');
                $('#boxst2').addClass('activestep');
            });
            $('.nextstep3').on('click', function() {
                console.log(11111111);
                $('.step2').hide();
                $('.step3').show();
                $('.title-regis').text('ยืนยันรหัสผ่าน');
                $('#boxst3').removeClass('areastep');
                $('#boxst3').addClass('activestep');
            });
            $('.backst1').on('click', function() {
                console.log(11111111);
                $('.step1').show();
                $('.step2').hide();
                $('.title-regis').text('ข้อมูลเบื้องต้น');
                $('#boxst2').removeClass('activestep');
                $('#boxst2').addClass('areastep');

            });
            $('.backst2').on('click', function() {
                console.log(11111111);
                $('.step2').show();
                $('.step3').hide();
                $('.title-regis').text('ที่อยู่');
                $('#boxst3').removeClass('activestep');
                $('#boxst3').addClass('areastep');

            });
            // เลื่อนหน้า ed

            // ดึง address st
            var povinces = $('#povinces');
            var district = $('#district');
            var sub_district = $('#sub_district');
            var zipcode = $('#zipcode');

            $('#region').change(function() {
                var selectedRegionOption = $(this).find(':selected');
                var selectedRegion = selectedRegionOption.data('region-id');
                var regionValue = $(this).val();
                console.log(selectedRegion, regionValue);


                if (regionValue != '') {
                    console.log(1111111111);
                    povinces.prop('disabled', false);
                    district.prop('disabled', true);
                    sub_district.prop('disabled', true);
                    zipcode.prop('disabled', true);
                } else {
                    console.log(22222222222);
                    povinces.prop('disabled', true);
                    district.prop('disabled', true);
                    sub_district.prop('disabled', true);
                    zipcode.prop('disabled', true);
                }

                $.ajax({
                    type: 'post',
                    url: "{{ route('register_pull_address') }}",
                    data: {
                        _token: "{{ CSRF_TOKEN() }}",
                        selectedRegion: selectedRegion
                    },
                    success: function(response) {
                        console.log(response.povice);
                        var provinces = response.povice;

                        povinces.empty();
                        district.empty();
                        sub_district.empty();
                        zipcode.empty();
                        povinces.append($('<option>', {
                            value: '',
                            text: 'โปรดเลือกจังหวัด'
                        }));
                        district.append($('<option>', {
                            value: '',
                            text: 'โปรดเลือกอำเภอ'
                        }));
                        sub_district.append($('<option>', {
                            value: '',
                            text: 'โปรดเลือกตำบล'
                        }));
                        zipcode.append($('<option>', {
                            value: '',
                            text: 'โปรดเลือกรหัสไปรษณีย์'
                        }));

                        $.each(provinces, function(index, province) {
                            povinces.append($('<option>', {
                                value: province.name_th,
                                text: province.name_th,
                                'data-province-id': province.id
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        // จัดการข้อผิดพลาด (ถ้ามี)
                    }
                });
            });

            $('#povinces').change(function() {
                var selectedPovincesOption = $(this).find(':selected'); // เลือก Option ที่ถูกเลือก
                var selectedPovinces = selectedPovincesOption.data('province-id');
                var povincesValue = $(this).val();
                console.log(selectedPovinces);

                if (povincesValue != '') {
                    console.log(1111111111);
                    district.prop('disabled', false);
                    sub_district.prop('disabled', true);
                    zipcode.prop('disabled', true);
                } else {
                    console.log(22222222222);
                    district.prop('disabled', true);
                    sub_district.prop('disabled', true);
                    zipcode.prop('disabled', true);
                }


                $.ajax({
                    type: 'post',
                    url: "{{ route('register_pull_address') }}",
                    data: {
                        _token: "{{ CSRF_TOKEN() }}",
                        selectedPovinces: selectedPovinces
                    },
                    success: function(response) {
                        console.log(response);
                        var districts = response.district;

                        district.empty();
                        sub_district.empty();
                        zipcode.empty();

                        district.append($('<option>', {
                            value: '',
                            text: 'โปรดเลือกอำเภอ'
                        }));
                        sub_district.append($('<option>', {
                            value: '',
                            text: 'โปรดเลือกตำบล'
                        }));
                        zipcode.append($('<option>', {
                            value: '',
                            text: 'โปรดเลือกรหัสไปรษณีย์'
                        }));

                        $.each(districts, function(index, lidistricts) {
                            district.append($('<option>', {
                                value: lidistricts.name_th,
                                text: lidistricts.name_th,
                                'data-district-id': lidistricts.id
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        // จัดการข้อผิดพลาด (ถ้ามี)
                    }
                });
            });

            $('#district').change(function() {
                var selectedDistrictOption = $(this).find(':selected'); // เลือก Option ที่ถูกเลือก
                var selectedDistrict = selectedDistrictOption.data('district-id');
                var districtValue = $(this).val();
                console.log(selectedDistrict);

                if (districtValue != '') {
                    console.log(1111111111);
                    sub_district.prop('disabled', false);
                    zipcode.prop('disabled', true);
                } else {
                    console.log(22222222222);
                    sub_district.prop('disabled', true);
                    zipcode.prop('disabled', true);
                }

                $.ajax({
                    type: 'post',
                    url: "{{ route('register_pull_address') }}",
                    data: {
                        _token: "{{ CSRF_TOKEN() }}",
                        selectedDistrict: selectedDistrict
                    },
                    success: function(response) {
                        console.log(response);
                        var sub_districts = response.sub_district;

                        sub_district.empty();
                        zipcode.empty();

                        sub_district.append($('<option>', {
                            value: '',
                            text: 'โปรดเลือกตำบล'
                        }));
                        zipcode.append($('<option>', {
                            value: '',
                            text: 'โปรดเลือกรหัสไปรษณีย์'
                        }));

                        $.each(sub_districts, function(index, lisub_districts) {
                            sub_district.append($('<option>', {
                                value: lisub_districts.name_th,
                                text: lisub_districts.name_th,
                                'data-sub_district-id': lisub_districts.id
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        // จัดการข้อผิดพลาด (ถ้ามี)
                    }
                });
            });

            $('#sub_district').change(function() {
                var selectedSub_DistrictOption = $(this).find(':selected'); // เลือก Option ที่ถูกเลือก
                var selectedSub_District = selectedSub_DistrictOption.data('sub_district-id');
                var Sub_DistrictValue = $(this).val();
                console.log(selectedSub_District);

                if (Sub_DistrictValue != '') {
                    console.log(1111111111);
                    zipcode.prop('disabled', false);
                } else {
                    console.log(22222222222);
                    zipcode.prop('disabled', true);
                }



                $.ajax({
                    type: 'post',
                    url: "{{ route('register_pull_address') }}",
                    data: {
                        _token: "{{ CSRF_TOKEN() }}",
                        selectedSub_District: selectedSub_District
                    },
                    success: function(response) {
                        var zipcode = response.zipcode;
                        console.log(zipcode);
                        var selectzipcode = $('#zipcode');

                        selectzipcode.empty();

                        $.each(zipcode, function(index, lizipcode) {
                            selectzipcode.append($('<option>', {
                                value: lizipcode.zip_code,
                                text: lizipcode.zip_code
                            }));
                        });

                    },
                    error: function(xhr, status, error) {
                        // จัดการข้อผิดพลาด (ถ้ามี)
                    }
                });
            });
            // ดึง address ed

            // submitform st
            $(".submit-form-regis").on("click", function() {
                if ($("#regis-form")[0].checkValidity()) {
                    $("#regis-form").submit();
                    console.log("Form submitted or other actions performed.");
                } else {
                    console.log("Form validation failed.");
                }
            });
            // submitform ed

            // alertsuccess st
            var success_register = "{{ session('success-register') }}"
            if (success_register) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: success_register,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 3000,
                }).then(() => {
                    window.location.href = "{{ route('login') }}";
                });
            }
            // alertsuccess ed


            // alerterror st
            var emailEmail = @json($errors->first('email'));
            var emailPassword = @json($errors->first('password'));
            var emailBirthday = @json($errors->first('birthday'));

            if (emailEmail) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: emailEmail,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000,
                });
            } else if (emailPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: emailPassword,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000,
                });
            } else if (emailBirthday) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: emailBirthday,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000,
                });
            }
            // alerterror ed
        });
    </script>
</body>

</html>

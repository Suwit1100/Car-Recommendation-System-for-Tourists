@extends(Auth::user()->type == 0 ? 'layout.homeuser' : 'layout.homeadmin')
@section('style')
    <style>
        .user-sericon {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-size: contain;

        }

        .Box {
            width: 70%;
            flex-shrink: 0;
            border-radius: 40px;
            background: var(--, #FFF);
            background-color: #fbfcf6;
            color: black;
            font-weight: bold;
            border-radius: 20px;
            /* width: 40%; */
            padding: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="m-auto Box my-2">
        <div class="p-2 m-auto shadow-box">
            <form id="profile-form" action="{{ route('edit_profile_post', $user->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <input type="file" id="file-upload" style="display: none;" name="file-upload">
                        <input type="hidden" name="old_img_profile" value="{{ $user->imgprofile }}">
                        <label for="file-upload">
                            <img src="{{ asset('assets/imguser/' . $user->imgprofile) }}" alt="รูปโปรไฟล์"
                                class="user-sericon" style="cursor: pointer;">
                        </label>

                    </div>
                    <div class="col-12 d-flex justify-content-center">แก้ไขข้อมูลส่วนตัว</div>
                </div>



                <div class="form-group row m-2">
                    <label for="email" class="col-sm-3 col-form-label font_lable">อีเมล</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email" placeholder="อีเมล"
                            value="{{ $user->email }}" required>
                    </div>
                </div>
                <div class="form-group row m-2">
                    <label for="name" class="col-sm-3 col-form-label font_lable">ชื่อ</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ"
                            value="{{ $user->name }}" required>
                    </div>
                </div>
                <div class="form-group row m-2">
                    <label for="lastname" class="col-sm-3 col-form-label font_lable">นามสกุล</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="นามสกุล"
                            value="{{ $user->lastname }}" required>
                    </div>
                </div>
                <div class="form-group row m-2">
                    <label for="birthday" class="col-sm-3 col-form-label font_lable">วันเกิด</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="วันเกิด"
                            value="{{ $user->birthday }}" required>
                    </div>
                </div>
                <div class="form-group row m-2">
                    <label for="sex" class="col-sm-3 col-form-label font_lable">เพศ</label>
                    <div class="col-sm-9 pt-1">
                        <input class="form-check-input" type="radio" name="sex" id="sex_male" value="male"
                            {{ $user->sex == 'male' ? 'checked' : '' }} >
                        <label class="form-check-label font_lable" for="sex_male">ชาย</label>
                        <input class="form-check-input" type="radio" name="sex" id="sex_female" value="female"
                            {{ $user->sex == 'female' ? 'checked' : '' }}>
                        <label class="form-check-label font_lable" for="sex_female">หญิง</label>
                    </div>

                </div>
                <div class="form-group row m-2">
                    <label for="region" class="col-sm-3 col-form-label font_lable">ภาค</label>
                    <div class="col-sm-9">
                        <select name="region" id="region" class="form-select" required>

                            <option value="">โปรดเลือกภาค</option>
                            @foreach ($region as $liregion)
                                @php
                                    $selected = $liregion->name == $user->region ? 'selected' : '';
                                @endphp
                                <option value="{{ $liregion->name }}" data-region-id="{{ $liregion->id }}"
                                    {{ $selected }}>
                                    {{ $liregion->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row m-2">
                    <label for="povinces" class="col-sm-3 col-form-label font_lable">จังหวัด</label>
                    <div class="col-sm-9">
                        <select name="povinces" id="povinces" class="form-select" disabled required>
                            <option value="">โปรดเลือกจังหวัด</option>
                            @foreach ($thai_provinces as $lithai_provinces)
                                @php
                                    $selected = $lithai_provinces->name_th == $user->province ? 'selected' : '';
                                @endphp
                                <option value="{{ $lithai_provinces->name_th }}"
                                    data-thai_provinces-id="{{ $lithai_provinces->id }}" {{ $selected }}>
                                    {{ $lithai_provinces->name_th }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row m-2">
                    <label for="district" class="col-sm-3 col-form-label font_lable">อำเภอ</label>
                    <div class="col-sm-9">
                        <select name="district" id="district" class="form-select" disabled required>
                            <option value="">โปรดเลือกอำเภอ</option>
                            @foreach ($thai_amphures as $lithai_amphures)
                                @php
                                    $selected = $lithai_amphures->name_th == $user->district ? 'selected' : '';
                                @endphp
                                <option value="{{ $lithai_amphures->name_th }}"
                                    data-thai_amphures-id="{{ $lithai_amphures->id }}" {{ $selected }}>
                                    {{ $lithai_amphures->name_th }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row m-2">
                    <label for="sub_district" class="col-sm-3 col-form-label font_lable">ตำบล</label>
                    <div class="col-sm-9">
                        <select name="sub_district" id="sub_district" class="form-select" disabled required>
                            <option value="">โปรดเลือกตำบล</option>
                            @foreach ($thai_tambons as $lithai_tambons)
                                @php
                                    $selected = $lithai_tambons->name_th == $user->sub_district ? 'selected' : '';
                                @endphp
                                <option value="{{ $lithai_tambons->name_th }}"
                                    data-thai_tambons-id="{{ $lithai_tambons->id }}" {{ $selected }}>
                                    {{ $lithai_tambons->name_th }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row m-2">
                    <label for="zipcode" class="col-sm-3 col-form-label font_lable">รหัสไปรษณีย์</label>
                    <div class="col-sm-9">
                        <select name="zipcode" id="zipcode" class="form-select" disabled required>
                            <option value="">โปรดเลือกรหัสไปรษณีย์</option>
                            @foreach ($zipcode as $lizipcode)
                                @php
                                    $selected = $lizipcode->zip_code == $user->zipcode ? 'selected' : '';
                                @endphp
                                <option value="{{ $lizipcode->zip_code }}" data-zipcode-id="{{ $lizipcode->id }}"
                                    {{ $selected }}>
                                    {{ $lizipcode->zip_code }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-green form-control" disabled>
                    บันทึก
                </button>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // เมื่อคลิกที่ input type="file"
            $("#file-upload").change(function() {
                // เช็คว่ามีไฟล์ถูกเลือกหรือไม่
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    // อ่านไฟล์ที่เลือกและแสดงในรูปภาพ
                    reader.onload = function(e) {
                        $('.user-sericon').attr('src', e.target.result);
                    };

                    // อ่านไฟล์ที่เลือก
                    reader.readAsDataURL(this.files[0]);
                }
            });



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
                                value: lizipcode.id,
                                text: lizipcode.zip_code
                            }));
                        });

                    },
                    error: function(xhr, status, error) {
                        // จัดการข้อผิดพลาด (ถ้ามี)
                    }
                });
            });

            var formOriginalData = $('#profile-form').serialize();

            $('#profile-form :input').on('input change', function() {
                if ($('#profile-form').serialize() !== formOriginalData) {
                    console.log(1111);
                    $('button[type="submit"]').prop('disabled', false);
                } else {
                    console.log(222);
                    $('button[type="submit"]').prop('disabled', true);
                }
            });

            $('#file-upload').on('change', function() {
                if (this.files.length > 0) {
                    $('button[type="submit"]').prop('disabled', false);
                } else {
                    $('button[type="submit"]').prop('disabled', true);
                }
            });


            // alert อัปเดตสำเร็จสำเร็จ
            var successpost = @json(session('success-updateprofile'));
            if (successpost) {
                Swal.fire({
                    title: 'สำเร็จ',
                    text: successpost,
                    icon: 'success',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000
                });
            }

            // เช็คเลือกที่อยู่
            let regionError = {!! json_encode($errors->first('region')) !!};
            let povincesError = {!! json_encode($errors->first('povinces')) !!};
            let districtError = {!! json_encode($errors->first('district')) !!};
            let subDistrictError = {!! json_encode($errors->first('sub_district')) !!};
            let zipcodeError = {!! json_encode($errors->first('zipcode')) !!};

            if (regionError) {
                Swal.fire({
                    title: 'ผิดพลาด',
                    text: regionError,
                    icon: 'error',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000
                });
            } else if (povincesError) {
                Swal.fire({
                    title: 'ผิดพลาด',
                    text: povincesError,
                    icon: 'error',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000
                });
            } else if (districtError) {
                Swal.fire({
                    title: 'ผิดพลาด',
                    text: districtError,
                    icon: 'error',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000
                });
            } else if (subDistrictError) {
                Swal.fire({
                    title: 'ผิดพลาด',
                    text: subDistrictError,
                    icon: 'error',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000
                });
            } else if (zipcodeError) {
                Swal.fire({
                    title: 'ผิดพลาด',
                    text: zipcodeError,
                    icon: 'error',
                    showConfirmButton: false,
                    timerProgressBar: true,
                    timer: 2000
                });
            }

        });
    </script>
@endsection

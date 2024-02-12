@extends('layout.homeadmin')
@section('style')
    <style>
        /* datatable */
        .dataTables_filter,
        .dataTables_paginate {
            display: flex;
            justify-content: end;
        }

        /* datatable */
        .btn-add {
            background-color: #357266;
            color: white;
            font-weight: normal;
        }

        .btn-add:hover {
            background-color: #10231f;
            color: white;
        }

        .table-green {
            --bs-table-color: #000000;
            --bs-table-bg: #ffffff;
            --bs-table-border-color: #373b3e;
            --bs-table-striped-bg: #2c3034;
            --bs-table-striped-color: #fff;
            --bs-table-active-bg: #373b3e;
            --bs-table-active-color: #fff;
            --bs-table-hover-bg: #323539;
            --bs-table-hover-color: #fff;
            color: var(--bs-table-color);
            border-color: var(--bs-table-border-color);
        }

        td.sorting {
            background: #ffffff;
            color: #000000;
            font-weight: 500;
            border-bottom: 3px solid #357266;
        }

        .active>.page-link,
        .page-link.active {
            z-index: 3;
            color: var(--bs-pagination-active-color);
            background-color: #357266;
            border-color: #357266;
        }

        .page-link {
            position: relative;
            display: block;
            padding: var(--bs-pagination-padding-y) var(--bs-pagination-padding-x);
            font-size: var(--bs-pagination-font-size);
            color: #357266;
            text-decoration: none;
            background-color: var(--bs-pagination-bg);
            border: var(--bs-pagination-border-width) solid var(--bs-pagination-border-color);
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
    </style>
@endsection
@section('content')
    <div class="container">'
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#Modal-add-user">
                    <i class="fa-solid fa-plus" style="font-size: 24px;"></i>
                </button>
            </div>
            <div class="col-12 mt-3">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                ตารางข้อมูลสมาชิก
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>ชื่อ</td>
                                <td>นามสกุล</td>
                                <td>อีเมล</td>
                                <td>สถานะ</td>
                                <td>สร้างเมื่อ</td>
                                <td>แก้ไข</td>
                                <td>ลบข้อมูล</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->lastname }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->type }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td class="text-center"><a class="btn btn-warning"
                                            href="{{ route('edit_user', $row->id) }}">
                                            <i class="bi bi-pen"></i></a>
                                    <td class="text-center"><a class="btn btn-danger delete-button"
                                            data-id="{{ $row->id }}" id="delete_user{{ $key }}"><i
                                                class="bi bi-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal" id="Modal-add-user">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">เพิ่มข้อมูลสมาชิก</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('add_user') }}" method="post">
                        @csrf
                        <div class="form-group row m-2">
                            <label for="zipcode" class="col-sm-3 col-form-label font_lable">สถานะ</label>
                            <div class="col-sm-9">
                                <select name="type" id="type" class="form-select">
                                    <option value=0>User</option>
                                    <option value=1>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="email" class="col-sm-3 col-form-label font_lable">อีเมล</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="อีเมล">
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="name" class="col-sm-3 col-form-label font_lable">ชื่อ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ">
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="lastname" class="col-sm-3 col-form-label font_lable">นามสกุล</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                    placeholder="นามสกุล">
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="birthday" class="col-sm-3 col-form-label font_lable">วันเกิด</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="birthday" name="birthday"
                                    placeholder="วันเกิด">
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="sex" class="col-sm-3 col-form-label font_lable">เพศ</label>
                            <div class="col-sm-9 pt-1">
                                <input class="form-check-input" type="radio" name="sex" id="sex_male" value="ชาย">
                                <label class="form-check-label font_lable" for="sex_male">ชาย</label>
                                <input class="form-check-input" type="radio" name="sex" id="sex_female"
                                    value="หญิง">
                                <label class="form-check-label font_lable" for="sex_female">หญิง</label>
                            </div>

                        </div>
                        <div class="form-group row m-2">
                            <label for="region" class="col-sm-3 col-form-label font_lable">ภาค</label>
                            <div class="col-sm-9">
                                <select name="region" id="region" class="form-select">
                                    <option value="">โปรดเลือกภาค</option>
                                    @foreach ($region as $liregion)
                                        <option value="{{ $liregion->name }}" data-region-id="{{ $liregion->id }}">
                                            {{ $liregion->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="povinces" class="col-sm-3 col-form-label font_lable">จังหวัด</label>
                            <div class="col-sm-9">
                                <select name="povinces" id="povinces" class="form-select" disabled>
                                    <option value="">โปรดเลือกจังหวัด</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="district" class="col-sm-3 col-form-label font_lable">อำเภอ</label>
                            <div class="col-sm-9">
                                <select name="district" id="district" class="form-select" disabled>
                                    <option value="">โปรดเลือกอำเภอ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="sub_district" class="col-sm-3 col-form-label font_lable">ตำบล</label>
                            <div class="col-sm-9">
                                <select name="sub_district" id="sub_district" class="form-select" disabled>
                                    <option value="">โปรดเลือกตำบล</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="zipcode" class="col-sm-3 col-form-label font_lable">รหัสไปรษณีย์</label>
                            <div class="col-sm-9">
                                <select name="zipcode" id="zipcode" class="form-select" disabled>
                                    <option value="">โปรดเลือกรหัสไปรษณีย์</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="zipcode" class="col-sm-3 col-form-label font_lable">รหัสผ่าน</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="รหัสผ่าน">
                            </div>
                        </div>
                        <div class="form-group row m-2">
                            <label for="zipcode" class="col-sm-3 col-form-label font_lable">ยืนยันรหัสผ่าน</label>
                            <div class="col-sm-9">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="ยืนยันรหัสผ่าน">
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <input type="submit" class="btn btn-success form-control btn-adduser" disabled>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    {{-- modal --}}
@endsection
@section('script')
    {{-- JS-Table --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    {{-- JS-Table --}}
    <script>
        new DataTable('#example');
        new DataTable('#example2');
    </script>

    <script>
        // / รอให้เอกสาร HTML โหลดเสร็จ
        document.addEventListener("DOMContentLoaded", function() {
            // ค้นหา Element ที่มี id เป็น "success-message"
            var successMessage = document.getElementById("success-message");

            // ถ้า Element ถูกค้นพบ
            if (successMessage) {
                // แสดง Element
                successMessage.style.display = "block";

                // รอเวลา 3 วินาทีแล้วซ่อน Element
                setTimeout(function() {
                    successMessage.style.display = "none";
                }, 3000);
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var success_force_user = "{{ session('success-force-user') }}"
            if (success_force_user) {
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: success_force_user,
                    confirmButtonColor: '#335726',
                }).then((result) => {});
            }
        });

        $(document).on('click', '.delete-button', function(event) {
            event.preventDefault();
            const id = $(this).data('id');
            console.log(id);

            Swal.fire({
                title: 'คุณต้องการลบข้อมูลหรือไม่ ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ใช่, ลบข้อมูล',
                cancelButtonText: 'ยกเลิก',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#357266',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/force_delete_user/" + id;
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
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
                    url: "{{ route('queryaddress') }}",
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
                    url: "{{ route('queryaddress') }}",
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
                    url: "{{ route('queryaddress') }}",
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
                    url: "{{ route('queryaddress') }}",
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

            //ถ้ากรอกฟอร์มไม่ครบ
            $('form input, form select').on('input', function() {
                // ตรวจสอบว่าข้อมูลที่จำเป็นถูกกรอกหรือไม่
                var email = $('#email').val();
                var name = $('#name').val();
                var lastname = $('#lastname').val();
                var birthday = $('#birthday').val();
                var region = $('#region').val();
                var povinces = $('#povinces').val();
                var district = $('#district').val();
                var sub_district = $('#sub_district').val();
                var zipcode = $('#zipcode').val();
                var password = $('#password').val();
                var password_confirmation = $('#password_confirmation').val();
                var sex = $('input[name="sex"]:checked').val();

                var isFormValid = email && name && lastname && birthday && region && povinces && district &&
                    sub_district && zipcode && password && password_confirmation && sex;

                // ปรับสถานะของปุ่ม "สมัครสมาชิก" ตามความเหมาะสม
                if (isFormValid) {
                    // กรณีข้อมูลถูกกรอกครบทั้งหมด
                    $('.btn-adduser').prop('disabled', false); // เปิดการใช้งานปุ่ม
                } else {
                    // กรณีข้อมูลไม่ถูกกรอกครบหรือถูกกรอกไม่ถูกต้อง
                    $('.btn-adduser').prop('disabled', true); // ปิดการใช้งานปุ่ม
                }
            });
            //ถ้ากรอกฟอร์มไม่ครบ
            var erroremail = "{{ $errors->first('email') }}";
            var errorpassword = "{{ $errors->first('password') }}";
            var errorbirthday = "{{ $errors->first('birthday') }}";
            var success_add_user = "{{ session('success-add-user') }}";
            if (erroremail) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: erroremail,
                    timer: 2500,
                });
            }
            if (errorpassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: errorpassword,
                    confirmButtonColor: '#357266',
                    timer: 2500,
                });
            }
            if (errorbirthday) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: errorbirthday,
                    confirmButtonColor: '#357266',
                    timer: 2500,
                });
            }
            if (success_add_user) {
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ',
                    text: success_add_user,
                    confirmButtonColor: '#357266',
                    timer: 2500,
                });
            }



        });
    </script>
@endsection

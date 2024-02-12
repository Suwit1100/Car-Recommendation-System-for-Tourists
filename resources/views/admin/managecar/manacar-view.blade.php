@extends('layout.homeadmin')
@section('style')
@endsection
@section('content')
    <style>
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


    {{-- dataTable CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.bootstrap5.min.css">
    {{-- dataTable CSS --}}



    <div class="container">
        <div class="row mb-3">
            <div class="col-6  d-flex align-items-center">
                {{-- <h5 class="m-0">รายการรถยนต์</h5 class="m-0"> --}}
            </div>
            <div class="col-6 d-flex justify-content-end">
                <button type="button" class="btn btn-add" data-bs-toggle="modal" id="addcar-button"
                    data-bs-target="#Modal-add-car">
                    <i class="fa-solid fa-plus" style="font-size: 24px;"></i>
                </button>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        จัดการข้อมูลรถยนต์
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped mt-5" style="width:100%">
                                <thead class="table-green">
                                    <tr>
                                        <td scope="col">Id</td>
                                        <td scope="col">ภาพ</td>
                                        <td scope="col">ผู้ผลิต</td>
                                        <td scope="col">โมเดล</td>
                                        <td scope="col">ปี</td>
                                        <td scope="col">ประเภทรถ</td>
                                        <td scope="col">เพิ่มโดย</td>
                                        <td scope="col">เพิ่มเมื่อ</td>
                                        <td scope="col">แก้ไขข้อมูล</td>
                                        <td scope="col">ลบข้อมูล</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($car_dataset as $licar_dataset)
                                        <tr>
                                            <td scope="col">{{ $licar_dataset->id_cardataset }}</td>
                                            <td scope="col"><img
                                                    src="{{ asset('/assets/imgcar/' . $licar_dataset->imgcar) }}"alt=""
                                                    style="width: 70px; height: 70px;"></td>
                                            <td scope="col">{{ $licar_dataset->make }}</td>
                                            <td scope="col">{{ $licar_dataset->model }}</td>
                                            <td scope="col">{{ $licar_dataset->year }}</td>
                                            <td scope="col">{{ $licar_dataset->vehicle_style }}</td>
                                            <td scope="col">{{ $licar_dataset->name }}</td>
                                            <td scope="col">{{ $licar_dataset->created_at }}</td>
                                            <td class="text-center"><a
                                                    href="{{ route('edit_car', $licar_dataset->id_cardataset) }}"
                                                    class="btn btn-warning "><i class="bi bi-pen"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('force_delete_car', $licar_dataset->id_cardataset) }}"
                                                    class="btn btn-danger delete-button"
                                                    data-id="{{ $licar_dataset->id_cardataset }}">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>


        {{-- Modal --}}
        <div class="modal" id="Modal-add-car">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">เพิ่มข้อมูลรถยนต์</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{ route('add_car') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="make">ผู้ผลิต</label>
                                    <input type="text" class="form-control" name="make" placeholder="กรุณากรอกผู้ผลิต"
                                        required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="model">โมเดล</label>
                                    <input type="text" class="form-control" name="model" placeholder="กรุณากรอกโมเดล"
                                        required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="year">ปี</label>
                                    <input type="number" class="form-control" name="year" placeholder="กรุณากรอกปี"
                                        required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="engine_hp">แรงม้า</label>
                                    <input type="number" class="form-control" name="engine_hp"
                                        placeholder="กรุณากรอกแรงม้า" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="engine_cylinders">จำนวนกระบอกสูบ</label>
                                    <input type="number" class="form-control" name="engine_cylinders"
                                        placeholder="กรุณากรอกจำนวนกระบอกสูบ" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="number_doors">จำนวนประตู</label>
                                    <input type="number" class="form-control" name="number_doors"
                                        placeholder="กรุณากรอกจำนวนประตู" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="msrp">ราคา</label>
                                    <input type="number" class="form-control" name="msrp"
                                        placeholder="กรุณากรอกราคา" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="city_mpg">MPG CITY</label>
                                    <input type="number" class="form-control" name="city_mpg"
                                        placeholder="กรุณากรอก MPG CITY" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="highway_mpg">MPG HWY</label>
                                    <input type="number" class="form-control" name="highway_mpg"
                                        placeholder="กรุณากรอก MPG HWY" required>
                                </div>
                                <div class="form-group col-6 my-3">
                                    <select name="engine_fuel_type" class="form-select" required>
                                        @foreach ($engine_fuel_type as $liengine_fuel_type)
                                            <option value="{{ $liengine_fuel_type->engine_fuel_type }}">
                                                {{ $liengine_fuel_type->engine_fuel_type == '' ? 'ปรเภทเชื้อเพลิง' : $liengine_fuel_type->engine_fuel_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 my-3">
                                    <select name="transmission_type" class="form-select" required>
                                        <option value="">ประเภทเกียร์</option>
                                        @foreach ($transmission_type as $litransmission_type)
                                            <option value="{{ $litransmission_type->transmission_type }}">
                                                {{ $litransmission_type->transmission_type == '' ? 'ปรเภทเกียร์' : $litransmission_type->transmission_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <select name="driven_wheels" class="form-select" required>
                                        <option value="">การขับเคลื่อน</option>
                                        @foreach ($driven_wheels as $lidriven_wheels)
                                            <option value="{{ $lidriven_wheels->driven_wheels }}">
                                                {{ $lidriven_wheels->driven_wheels == '' ? 'การขับเคลื่อน' : $lidriven_wheels->driven_wheels }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <select name="vehicle_size" class="form-select" required>
                                        <option value="">ขนาดรถ</option>
                                        @foreach ($vehicle_size as $livehicle_size)
                                            <option value="{{ $livehicle_size->vehicle_size }}">
                                                {{ $livehicle_size->vehicle_size == '' ? 'ขนาดรถ' : $livehicle_size->vehicle_size }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <select name="market_category" class="form-select">
                                        <option value="">ประเภทตามตลาด</option required>
                                        @foreach ($market_category as $limarket_category)
                                            <option value="{{ $limarket_category->market_category }}">
                                                {{ $limarket_category->market_category == '' ? 'ประเภทตามตลาด' : $limarket_category->market_category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <select name="vehicle_style" class="form-select" required>
                                        <option value="">ประเภทรถยนต์</option>
                                        @foreach ($vehicle_style as $livehicle_style)
                                            <option value="{{ $livehicle_style->vehicle_style }}">
                                                {{ $livehicle_style->vehicle_style == '' ? 'ประเภทรถยนต์' : $livehicle_style->vehicle_style }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description_car">รายละเอียด</label>
                                    <textarea name="description_car" id="" cols="27" rows="3" class="form-control"
                                        placeholder="กรุณากรอก"></textarea>
                                </div>
                                <div class="form-group mb-5">
                                    <label>รูปภาพ</label>
                                    <input type="file" class="form-control" name="car_img">
                                </div>
                                <input type="submit" value="บันทึก" class="btn btn-add w-100">
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        {{-- Modal --}}



    </div>
@endsection
@section('script')
    {{-- JS-Table --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    {{-- JS-Table --}}
    {{-- sweet --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        new DataTable('#example');
        new DataTable('#example2');
    </script>
    <script>
        // รอให้เอกสาร HTML โหลดเสร็จ
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
            var errormake = "{{ $errors->first('make') }}"
            var success_add = "{{ session('success') }}"
            var success_delete = "{{ session('success-forcedeletecar') }}"
            var success_updatecar = "{{ session('success-updatecar') }}"

            if (errormake) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด!',
                    text: errormake,
                    confirmButtonColor: '#335726',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#addcar-button').click();
                    }
                });
            }
            if (success_add) {
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: success_add,
                    confirmButtonColor: '#335726',
                }).then((result) => {});
            }
            if (success_delete) {
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: success_delete,
                    confirmButtonColor: '#335726',
                }).then((result) => {});
            }

            if (success_updatecar) {
                Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: success_updatecar,
                    confirmButtonColor: '#335726',
                }).then((result) => {});
            }
        });
    </script>

    <script>
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
                    window.location.href = "/force_delete_car/" + id;
                }
            });
        });
    </script>
@endsection

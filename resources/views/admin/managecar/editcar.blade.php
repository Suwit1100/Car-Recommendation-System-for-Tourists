@extends('layout.homeadmin')
@section('style')
    <style>
        .contentmain {
            margin-left: 1rem !important;
            margin-right: 1rem !important;
            border-radius: 5px;
            background-color: #EFEFEF;
            height: auto !important;
        }
    </style>
@endsection
@section('content')
    <div class="contentmain">
        <div class="row">
            <div class="col-12 px-4 py-3">
                <div class="card">
                    <div class="card-header">แบบฟอร์มแก้ไขข้อมูล</div>
                    <div class="card-body">
                        {{-- @if (session('success'))
                <div class="alert alert-success" id="success-message">
                    {{ session('success')}}
                </div>
                @endif --}}
                        <form id="carForm" action="{{ route('update_car', $car_dataset->id_cardataset) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="make">ผู้ผลิต</label>
                                    <input type="text" class="form-control" name="make" placeholder="กรุณากรอกผู้ผลิต"
                                        value="{{ $car_dataset->make }}" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="model">โมเดล</label>
                                    <input type="text" class="form-control" name="model" placeholder="กรุณากรอกโมเดล"
                                        value="{{ $car_dataset->model }}" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="year">ปี</label>
                                    <input type="number" class="form-control" name="year" placeholder="กรุณากรอกปี"
                                        value="{{ $car_dataset->year }}" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="engine_hp">แรงม้า</label>
                                    <input type="number" class="form-control" name="engine_hp"
                                        placeholder="กรุณากรอกแรงม้า" value="{{ $car_dataset->engine_hp }}" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="engine_cylinders">จำนวนกระบอกสูบ</label>
                                    <input type="number" class="form-control" name="engine_cylinders"
                                        placeholder="กรุณากรอกจำนวนกระบอกสูบ" value="{{ $car_dataset->engine_cylinders }}"
                                        required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="number_doors">จำนวนประตู</label>
                                    <input type="number" class="form-control" name="number_doors"
                                        placeholder="กรุณากรอกจำนวนประตู" value="{{ $car_dataset->number_doors }}" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="price_rent">ราคา</label>
                                    <input type="number" class="form-control" name="price_rent" placeholder="กรุณากรอกราคา"
                                        value="{{ $car_dataset->price_rent }}" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="city_mpg">MPG CITY</label>
                                    <input type="number" class="form-control" name="city_mpg"
                                        placeholder="กรุณากรอก MPG CITY" value="{{ $car_dataset->city_mpg }}" required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="highway_mpg">MPG HWY</label>
                                    <input type="number" class="form-control" name="highway_mpg"
                                        placeholder="กรุณากรอก MPG HWY" value="{{ $car_dataset->highway_mpg }}" required>
                                </div>
                                <div class="col-6"></div>
                                <div class="form-group col-6 my-3">
                                    <select name="engine_fuel_type" class="form-select" required>
                                        @foreach ($engine_fuel_type as $liengine_fuel_type)
                                            @php
                                                $selected = $liengine_fuel_type->engine_fuel_type == $car_dataset->engine_fuel_type ? 'selected' : '';
                                                $text = $liengine_fuel_type->engine_fuel_type == '' ? 'ปรเภทเชื้อเพลิง' : $liengine_fuel_type->engine_fuel_type;
                                            @endphp

                                            <option value="{{ $liengine_fuel_type->engine_fuel_type }}"
                                                {{ $selected }}>
                                                {{ $text }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 my-3">
                                    <select name="transmission_type" class="form-select" required>
                                        <option value="">ประเภทเกียร์</option>
                                        @foreach ($transmission_type as $litransmission_type)
                                            @php
                                                $selected = $litransmission_type->transmission_type == $car_dataset->transmission_type ? 'selected' : '';
                                                $text = $litransmission_type->transmission_type == '' ? 'ประเภทเกียร์' : $litransmission_type->transmission_type;
                                            @endphp

                                            <option value="{{ $litransmission_type->transmission_type }}"
                                                {{ $selected }}>
                                                {{ $text }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <select name="driven_wheels" class="form-select" required>
                                        <option value="">การขับเคลื่อน</option>
                                        @foreach ($driven_wheels as $lidriven_wheels)
                                            @php
                                                $selected = $lidriven_wheels->driven_wheels == $car_dataset->driven_wheels ? 'selected' : '';
                                                $text = $lidriven_wheels->driven_wheels == '' ? 'การขับเคลื่อน' : $lidriven_wheels->driven_wheels;
                                            @endphp

                                            <option value="{{ $lidriven_wheels->driven_wheels }}" {{ $selected }}>
                                                {{ $text }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <select name="vehicle_size" class="form-select" required>
                                        <option value="">ขนาดรถ</option>
                                        @foreach ($vehicle_size as $livehicle_size)
                                            @php
                                                $selected = $livehicle_size->vehicle_size == $car_dataset->vehicle_size ? 'selected' : '';
                                                $text = $livehicle_size->vehicle_size == '' ? 'การขับเคลื่อน' : $livehicle_size->vehicle_size;
                                            @endphp

                                            <option value="{{ $livehicle_size->vehicle_size }}" {{ $selected }}>
                                                {{ $text }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <select name="market_category" class="form-select" required>
                                        <option value="">ประเภทตามตลาด</option>
                                        @foreach ($market_category as $limarket_category)
                                            @php
                                                $selected = $limarket_category->market_category == $car_dataset->market_category ? 'selected' : '';
                                                $text = $limarket_category->market_category == '' ? 'ประเภทตามตลาด' : $limarket_category->market_category;
                                            @endphp

                                            <option value="{{ $limarket_category->market_category }}" {{ $selected }}>
                                                {{ $text }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <select name="vehicle_style" class="form-select" required>
                                        <option value="">ประเภทรถยนต์</option>
                                        @foreach ($vehicle_style as $livehicle_style)
                                            @php
                                                $selected = $livehicle_style->vehicle_style == $car_dataset->vehicle_style ? 'selected' : '';
                                                $text = $livehicle_style->vehicle_style == '' ? 'ประเภทรถยนต์' : $livehicle_style->vehicle_style;
                                            @endphp

                                            <option value="{{ $livehicle_style->vehicle_style }}" {{ $selected }}>
                                                {{ $text }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description_car">รายละเอียด</label>
                                    <textarea name="description_car" id="" cols="27" rows="3" class="form-control"
                                        placeholder="กรุณากรอก">{{ $car_dataset->description_car }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="car_img">รูปภาพ</label>
                                    <input type="file" class="form-control" name="car_img" id="new_img"
                                        value="{{ $car_dataset->imgcar }}">
                                </div>
                                <div>
                                    <input type="hidden" name="car_img_old" value="{{ $car_dataset->imgcar }}">

                                </div>
                                <div class="d-flex justify-content-center my-2">
                                    <img src="{{ asset('/assets/imgcar/' . $car_dataset->imgcar) }}" alt="รูปรถแก้ไข"
                                        style="width: 150px; height:150px;">
                                </div>
                            </div>
                            <br>
                            <input type="submit" value="อัพเดต" class="btn btn-primary" disabled>
                            <a href="{{ route('view_managecar') }}" class="btn btn-white">กลับ</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var formOriginalData = $('#carForm').serialize();

            $('#carForm :input').on('input change', function() {
                if ($('#carForm').serialize() !== formOriginalData) {
                    console.log(1111);
                    $('input[type="submit"]').prop('disabled', false);
                } else {
                    console.log(222);
                    $('input[type="submit"]').prop('disabled', true);
                }
            });

            $('#new_img').on('change', function() {
                if (this.files.length > 0) {
                    $('input[type="submit"]').prop('disabled', false);
                } else {
                    $('input[type="submit"]').prop('disabled', true);
                }
            });

            //ข้อผิดผลาด
            var erroredit = "{{ $errors->first('make') }}"
            // console.log(erroredit);
            if (erroredit) {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด!',
                    text: erroredit,
                    confirmButtonColor: '#357266',
                    timer: 2500,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#addcar-button').click();
                    }
                });
            }
        });
    </script>
@endsection

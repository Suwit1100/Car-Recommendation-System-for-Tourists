@extends('layout.homeadmin')
@section('style')
    <style>
        .btn-bg-apply {
            background-color: #357266;
            color: white;
            width: 15%;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 5px;
            /* height: 7%; */
        }

        .btn-bg-apply:hover {
            background-color: #10231f;
            color: white;
            width: 15%;
            padding-top: 5px;
            padding-bottom: 5px;
            border-radius: 5px;
            /* height: 7%; */
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('export_get') }}" method="GET">
            @csrf
            <div class="row mb-2">
                <div class="col-2">
                    ช่วงเวลา
                </div>
                <div class="col-2">เลือกปี</div>
                <div class="col-5">
                    <select name="year" class="form-select" id="selectyear">
                        <option value="">เลือกปี</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-2">เลือกเดือน</div>
                <div class="col-5">
                    <select name="month" id="month" class="form-select">
                        <option value="">เลือกเดือน</option>
                        @for ($i = 1; $i < 13; $i++)
                            <option value="{{ $i }}">
                                @if ($i == 1)
                                    มกราคม
                                @elseif ($i == 2)
                                    กุมภาพันธ์
                                @elseif ($i == 3)
                                    มีนาคม
                                @elseif ($i == 4)
                                    เมษายน
                                @elseif ($i == 5)
                                    พฤษภาคม
                                @elseif ($i == 6)
                                    มิถุนายน
                                @elseif ($i == 7)
                                    กรกฎาคม
                                @elseif ($i == 8)
                                    สิงหาคม
                                @elseif ($i == 9)
                                    กันยายน
                                @elseif ($i == 10)
                                    ตุลาคม
                                @elseif ($i == 11)
                                    พฤศจิกายน
                                @elseif ($i == 12)
                                    ธันวาคม
                                @else
                                @endif
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-3"></div>
            </div>
            <hr>
            <div class="row mb-2">
                <div class="col-2">
                    กำหนดเอง
                </div>
                <div class="col-2">วันเริ่มต้น</div>
                <div class="col-5">
                    <input type="date" name="datestart" id="datestart" class="form-control">
                </div>
                <div class="col-3"></div>
            </div>
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-2">วันสิ้นสุด</div>
                <div class="col-5">
                    <input type="date" name="dateend" id="dateend" class="form-control">
                </div>
                <div class="col-3"></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-2">
                    เพศ
                </div>
                <div class="col-2"></div>
                <div class="col-5">
                    <select name="sex" id="" class="form-select">
                        <option value="">เลือกเพศ</option>
                    </select>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="row mt-2">
                <div class="col-2">
                    เลือกโมเดลรถ
                </div>
                <div class="col-2"></div>
                <div class="col-5">
                    <select name="car_model" id="" class="form-select">
                        <option value="">เลือกโมเดล</option>
                    </select>
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row mt-2">
                <div class="col-2 mb-3">
                    เลือกความชอบ
                </div>
                <div class="col-2 mb-3"></div>
                <div class="col-5 mb-3">
                    <select name="like_not" id="" class="form-select">
                        <option value="">เลือกความชอบ</option>
                    </select>
                </div>
                <div class="col-3 mb-3"></div>
                <hr>
                <div class="col-12 mb-3 d-flex justify-content-end mt-2">
                    <button type="submit" class="btn-bg-apply">ยืนยัน</button>

                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            console.log(11111111);

            var selectedValue1 = $("#selectyear").val();
            if (selectedValue1 == "") {
                $("#month").prop('disabled', true);
            }

            $("#selectyear").change(function() {
                var selectedValue = $(this).val();
                if (selectedValue !== "") {
                    $("#datestart").prop('disabled', true);
                    $("#dateend").prop('disabled', true);
                    $("#month").prop('disabled', false);
                } else {
                    $("#datestart").prop('disabled', false);
                    $("#dateend").prop('disabled', false);
                    $("#month").prop('disabled', true);

                }
            });

            $("#datestart").change(function() {
                var selectedDate = $(this).val();
                if (selectedDate !== "") {
                    $("#selectyear").prop('disabled', true);
                    $("#month").prop('disabled', true);
                } else {
                    $("#selectyear").prop('disabled', false);
                    $("#month").prop('disabled', false);
                }
            });

            $("#dateend").change(function() {
                var selected = $(this).val();
                if (selected !== "") {
                    $("#selectyear").prop('disabled', true);
                    $("#month").prop('disabled', true);
                } else {
                    $("#selectyear").prop('disabled', false);
                    $("#month").prop('disabled', false);
                }
            });
        });
    </script>
@endsection

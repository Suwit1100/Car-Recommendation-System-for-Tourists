@extends('layout.homeadmin')
@section('style')
    {{-- dataTable CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.bootstrap5.min.css">
    {{-- dataTable CSS --}}

    <style>
        .dataTables_length {
            display: none;
        }

        .dataTables_filter {
            display: none;
        }


        th.sorting {
            background: #ffffff;
            color: #000000;
            font-weight: 500;
            border-bottom: 3px solid #357266;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        @php
            $year_ses = session()->pull('year');
            $month_ses = session()->pull('month');
            $datestart_ses = session()->pull('datestart');
            $dateend_ses = session()->pull('dateend');
        @endphp
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal-filter-table">filter</button>
                <form action="{{ route('export_toexcel') }}" method="post">
                    @csrf
                    <button class="ms-3 btn btn-info" id="Export_excel_review" type="submit">Export</button>
                    <input type="hidden" name="yearvalue" value="{{ $year_ses }}">
                    <input type="hidden" name="monthvalue" value="{{ $month_ses }}">
                    <input type="hidden" name="datestartvalue" value="{{ $datestart_ses }}">
                    <input type="hidden" name="dateendvalue" value="{{ $dateend_ses }}">
                </form>
            </div>
            <div class="col-12 table-responsive">
                <table id="example" class="table table-striped" style="max-width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Review By</th>
                            <th>Answer 1</th>
                            <th>Answer 2</th>
                            <th>Answer 3</th>
                            <th>Answer 4</th>
                            <th>Answer 5</th>
                            <th>Answer 6</th>
                            <th>Answer 7</th>
                            <th>Answer 8</th>
                            <th>Answer 9</th>
                            <th>Answer 10</th>
                            <th>Answer 11</th>
                            <th>Answer 12</th>
                            <th>Answer 13</th>
                            <th>Answer 14</th>
                            <th>Answer 15</th>
                            <th>Answer 16</th>
                            <th>Answer 17</th>
                            <th>Answer 18</th>
                            <th>Result</th>
                            <th>Score</th>
                            <th>Comment</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($table_export as $ltable_export)
                            <tr>
                                <td>{{ $ltable_export->id }}</td>
                                <td>{{ $ltable_export->review_by }}</td>
                                <td>{{ $ltable_export->answer1 }}</td>
                                <td>{{ $ltable_export->answer2 }}</td>
                                <td>{{ $ltable_export->answer3 }}</td>
                                <td>{{ $ltable_export->answer4 }}</td>
                                <td>{{ $ltable_export->answer5 }}</td>
                                <td>{{ $ltable_export->answer6 }}</td>
                                <td>{{ $ltable_export->answer7 }}</td>
                                <td>{{ $ltable_export->answer8 }}</td>
                                <td>{{ $ltable_export->answer9 }}</td>
                                <td>{{ $ltable_export->answer10 }}</td>
                                <td>{{ $ltable_export->answer11 }}</td>
                                <td>{{ $ltable_export->answer12 }}</td>
                                <td>{{ $ltable_export->answer13 }}</td>
                                <td>{{ $ltable_export->answer14 }}</td>
                                <td>{{ $ltable_export->answer15 }}</td>
                                <td>{{ $ltable_export->answer16 }}</td>
                                <td>{{ $ltable_export->answer17 }}</td>
                                <td>{{ $ltable_export->answer18 }}</td>
                                <td>{{ $ltable_export->result }}</td>
                                <td>{{ $ltable_export->score }}</td>
                                <td>{{ $ltable_export->comment }}</td>
                                <td>{{ $ltable_export->created_at }}</td>
                                <td>{{ $ltable_export->updated_at }}</td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Modal-filter-table">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title">ตัวกรองรีวิว</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('export_get') }}" method="GET">
                        @csrf

                        <div class="row mb-2">
                            <div class="col-2">
                                ช่วงเวลา
                            </div>
                            <div class="col-2">เลือกปี</div>
                            <div class="col-5">
                                <select name="year" class="form-select" id="selectyear">
                                    <option value="" {{ $year_ses == '' ? 'selected' : '' }}>เลือกปี</option>
                                    <option value="2024" {{ $year_ses == '2024' ? 'selected' : '' }}>2024</option>
                                    <option value="2025" {{ $year_ses == '2025' ? 'selected' : '' }}>2025</option>
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
                                        <option value="{{ $i }}" {{ $month_ses == $i ? 'selected' : '' }}>
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
                                <input type="date" name="datestart" id="datestart" class="form-control"
                                    value="{{ $datestart_ses }}">
                            </div>
                            <div class="col-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-2">วันสิ้นสุด</div>
                            <div class="col-5">
                                <input type="date" name="dateend" id="dateend" class="form-control"
                                    value="{{ $dateend_ses }}">
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
                                <select name="sex" id="sex" class="form-select">
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
                                <select name="car_model" id="car_model" class="form-select">
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
                                <select name="like_not" id="like_not" class="form-select">
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
            </div>
        </div>
    @endsection
    @section('script')
        {{-- JS-Table --}}
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        {{-- JS-Table --}}
        {{-- Modal --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        {{-- Modal --}}

        <script>
            new DataTable('#example');
        </script>
        <script>
            $(document).ready(function() {
                console.log(11111111);

                var selectedYear = $("#selectyear").val();
                if (selectedYear == "") {
                    $("#month").prop('disabled', true);
                    $("#datestart").prop('disabled', false);
                    $("#dateend").prop('disabled', false);
                } else {
                    $("#datestart").prop('disabled', true);
                    $("#dateend").prop('disabled', true);
                    $("#month").prop('disabled', false);
                }

                $("#selectyear").change(function() {
                    var selectedYearon = $(this).val();
                    if (selectedYearon !== "") {
                        $("#datestart").prop('disabled', true);
                        $("#dateend").prop('disabled', true);
                        $("#month").prop('disabled', false);
                    } else {
                        $("#datestart").prop('disabled', false);
                        $("#dateend").prop('disabled', false);
                        $("#month").prop('disabled', true);

                    }
                });

                var selectedDatestart = $("#datestart").val();
                if (selectedDatestart != "") {
                    $("#selectyear").prop('disabled', true);
                    $("#month").prop('disabled', true);
                } else {
                    $("#selectyear").prop('disabled', false);
                    $("#month").prop('disabled', false);
                }

                var selectedDateend = $("#dateend").val();
                if (selectedDateend != "") {
                    $("#selectyear").prop('disabled', true);
                    $("#month").prop('disabled', true);
                } else {
                    $("#selectyear").prop('disabled', false);
                    $("#month").prop('disabled', false);
                }

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

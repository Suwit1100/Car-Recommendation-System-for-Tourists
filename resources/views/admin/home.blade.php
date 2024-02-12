@extends('layout.homeadmin')
@section('style')
    <style>
        .box-dashboard {
            width: 100%;
            height: 100px;
            overflow: hidden;
        }

        .box-dashboard-in {
            width: 100%;
            height: 100px;
            background-color: white;
        }

        .dataTables_length {
            display: none !important;
        }

        .dataTables_filter {
            display: none !important;
        }

        .col-sm-12 {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        .table-striped {
            border-radius: 30px !important;
        }

        .box-log {
            overflow: hidden;
            width: 100%;
            border-radius: 20px;
        }

        .row-table {
            margin-left: 1px;
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


        @media screen and (min-width: 900px) {}
    </style>
@endsection
@section('content')
    {{-- dataTable CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.bootstrap5.min.css">
    {{-- dataTable CSS --}}

    <div class="container pb-5" style="max-width: 100%">
        <div class="row">
            <div class="col-3 px-1">
                <div class="box-dashboard rounded-3" style="background-color: chocolate">
                    <div class="box-dashboard-in ms-2 rounded-3">
                        <div class="row" style="height: 100px;">
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <div class="d-grid">
                                    <span class="" style="color: chocolate">จำนวนผู้ใช้</span>
                                    <span class="">{{ count($user_dashboard) }}</span>
                                </div>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <i class="bi bi-person " style="font-size: 30px; color:chocolate;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 px-1">
                <div class="box-dashboard rounded-3" style="background-color: steelblue">
                    <div class="box-dashboard-in ms-2 rounded-3">
                        <div class="row" style="height: 100px;">
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <div class="d-grid">
                                    <span class="" style="color: steelblue">กำลังใช้งาน</span>
                                    <span class="">{{ count($num_user) }}</span>
                                </div>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <i class="bi bi-person " style="font-size: 30px; color:steelblue;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 px-1">
                <div class="box-dashboard rounded-3" style="background-color: blueviolet">
                    <div class="box-dashboard-in ms-2 rounded-3">
                        <div class="row" style="height: 100px;">
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <div class="d-grid">
                                    <span class="" style="color: blueviolet">คำขอช่วยเหลือ</span>
                                    <span class="">{{ $total_faq->count() }}</span>
                                </div>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <i class="bi bi-chat" style="font-size: 30px; color:blueviolet;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 px-1">
                <div class="box-dashboard rounded-3" style="background-color: cadetblue">
                    <div class="box-dashboard-in ms-2 rounded-3">
                        <div class="row" style="height: 100px;">
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <div class="d-grid">
                                    <span class="" style="color: cadetblue">จำนวนการแนะนำ</span>
                                    <span class="">{{ $num_reccomment->count() }}</span>
                                </div>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <i class="fas fa-car" style="font-size: 30px; color:cadetblue;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6 ps-1 ">
                <div class="">
                    <canvas id="num_view_website" class="w-100 h-100"></canvas>
                </div>
            </div>

            <div class="col-6 ps-1">
                <div class="">
                    <canvas id="num_view_recomment" class="w-100 h-100"></canvas>
                </div>
            </div>
        </div>

        <div class="row mt-3 mx-1">
            <div class="box-log">
                <table id="example" class="table table-striped px-1" style="width: 100%">
                    <thead class="table-green">
                        <tr>
                            <td scope="col">Id</td>
                            <td scope="col">ชื่อ</td>
                            <td scope="col">นามสกุล</td>
                            <td scope="col">email</td>
                            <td scope="col">สถานะผู้ใช้</td>
                            <td scope="col">สถานะการใช้งาน</td>
                            <td scope="col" id="time">เวลา</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($log_user as $item)
                            <tr>
                                <td scope="col">{{ $item->user_id }}</td>
                                <td scope="col">{{ $item->name }}</td>
                                <td scope="col">{{ $item->lastname }}</td>
                                <td scope="col">{{ $item->email }}</td>
                                <td scope="col">{{ $item->type == 0 ? 'สมาชิก' : 'แอดมิน' }}</td>
                                <td scope="col">{{ $item->text_detail }}</td>
                                <td scope="col">{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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

    {{-- CHART.JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- CHART.JS --}}

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- jquery --}}

    {{-- plugins --}}
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    {{-- plugins --}}


    <script>
        new DataTable('#example');
    </script>

    <script>
        $(document).ready(function() {
            // MOCK DATA
            let testmouth = @json($testdata);
            // console.log(testmouth);
            let testdata_mock = [];

            testmouth.forEach(function(item) {
                testdata_mock.push(item.count);
            });
            // console.log(testdata_mock);

            const test_mock_chart = $('#num_view_recomment')
            new Chart(test_mock_chart, {
                type: 'line',
                data: {
                    labels: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม',
                        'สิงหาคม',
                        'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
                    ],
                    datasets: [{
                        label: 'จำนวนการใช้ระบบแนะนำ',
                        data: testdata_mock,
                        borderWidth: 3,
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    family: 'Kanit, sans-serif',
                                    size: 14
                                }
                            }
                        }
                    },
                    maintainAspectRatio: false,
                    responsive: true,
                    scales: {
                        x: {
                            grid: {
                                display: false // ซ่อนเส้นตารางของแนวแกน X
                            },
                            ticks: {
                                font: {
                                    size: 12, // เปลี่ยนขนาดฟอนต์
                                    family: 'Kanit, sans-serif'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: false // ซ่อนเส้นตารางของแนวแกน X
                            },
                            ticks: {
                                font: {
                                    size: 12, // เปลี่ยนขนาดฟอนต์
                                    family: 'Kanit, sans-serif'
                                }
                            }
                        },
                    }
                }
            });
            // MOCK DATA


            let visit_web_total = @json($num_visit_web);

            let data_count_visit_web = [];
            visit_web_total.forEach(function(item) {
                data_count_visit_web.push(item.count);
            });
            // console.log(data_count_visit_web);
            const num_view_reccomment = $('#num_view_website')

            new Chart(num_view_reccomment, {
                type: 'line',
                data: {
                    labels: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม',
                        'สิงหาคม',
                        'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
                    ],
                    datasets: [{
                        label: 'จำนวนการเข้าใช้งานเว็บ',
                        data: data_count_visit_web,
                        borderWidth: 3,
                        borderColor: 'rgba(255, 0, 0, 1)',
                        backgroundColor: 'rgba(255, 0, 0, 1)'
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            labels: {
                                font: {
                                    family: 'Kanit, sans-serif',
                                    size: 14
                                }
                            }
                        }
                    },
                    maintainAspectRatio: false,
                    responsive: true,
                    scales: {
                        x: {
                            grid: {
                                display: false // ซ่อนเส้นตารางของแนวแกน X
                            },
                            ticks: {
                                font: {
                                    size: 12, // เปลี่ยนขนาดฟอนต์
                                    family: 'Kanit, sans-serif'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: false // ซ่อนเส้นตารางของแนวแกน X
                            },
                            ticks: {
                                font: {
                                    size: 12, // เปลี่ยนขนาดฟอนต์
                                    family: 'Kanit, sans-serif'
                                }
                            }
                        },
                    }
                }
            });


        });
    </script>

    <script>
        $(document).ready(function() {
            $("#time").trigger("click"); // First click
            $("#time").trigger("click"); // First click
        });
    </script>
@endsection

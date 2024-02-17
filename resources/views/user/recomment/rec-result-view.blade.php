@extends('layout.homeuser')
@section('style')
    <style>
        .box-filter {
            border: 2px solid #23c686;
            border-radius: 10px;
            width: 100%;
            height: auto;
        }

        .according {
            --bs-accordion-btn-icon: url('path/to/your/new/image.jpg') !important;
        }

        .form-control:focus {
            box-shadow: 0px 0px 2px 3px rgba(35, 198, 134, 0.3);
            border-color: #23c686;
        }

        .form-select:focus {
            box-shadow: 0px 0px 2px 3px rgba(35, 198, 134, 0.3);
            border-color: #23c686;
        }


        .box-sort {
            position: static;
        }

        #searchcar {
            border: none;
            border-top: 1px solid #ced4da;
            border-bottom: 1px solid #ced4da;
            border-right: 1px solid #ced4da;
        }

        option:focus {
            background-color: red;
        }

        .btn-check:checked,
        {
        background-color: #007bff;
        color: #fff;
        }

        .btn-filter {
            display: none;
        }



        @media only screen and (max-width: 768px) {
            .btn-filter {
                display: flex;
                align-items: center;
                margin-right: 3px;
            }

            #box-filter-pc {
                display: none;
            }
        }
    </style>

    {{-- ฺฺbootstap customs --}}
    <style>
        .accordion-button::after {
            flex-shrink: 0;
            width: var(--bs-accordion-btn-icon-width);
            height: var(--bs-accordion-btn-icon-width);
            margin-left: auto;
            content: "";
            background-image: url("/assets/imgiconbootstrap/down-arrow.png");
            background-repeat: no-repeat;
            background-size: var(--bs-accordion-btn-icon-width);
            transition: var(--bs-accordion-btn-icon-transition);
        }

        .accordion-button:not(.collapsed)::after {
            background-image: url("/assets/imgiconbootstrap/down-arrow.png");
            transform: var(--bs-accordion-btn-icon-transform);
        }

        .accordion-button:focus {
            z-index: 3;
            border-color: rgba(35, 198, 134, 0.3);
            outline: 0;
            box-shadow: 0px 0px 2px 3px rgba(35, 198, 134, 0.3);
        }

        .accordion-button:not(.collapsed) {
            color: #0A955F;
            background-color: #23c6860d;
        }

        .offcanvas.offcanvas-bottom {
            right: 0;
            left: 0;
            height: max-content !important;
            max-height: 100%;
            border-top: var(--bs-offcanvas-border-width) solid var(--bs-offcanvas-border-color);
            transform: translateY(100%);
        }
    </style>
    {{-- ฺฺbootstap customs --}}

    {{-- jquery ui custom --}}
    <style>
        .ui-widget-header {
            border: 1px solid #dddddd;
            background: #23c68666 !important;
            color: #333333;
            font-weight: bold;
        }

        .ui-state-default,
        .ui-widget-content .ui-state-default,
        .ui-widget-header .ui-state-default,
        .ui-button,
        html .ui-button.ui-state-disabled:hover,
        html .ui-button.ui-state-disabled:active {
            border: 1px solid #c5c5c5;
            background: #0A955F !important;
            font-weight: normal;
            color: #454545;
        }
    </style>
    {{-- jquery ui custom --}}
@endsection
@section('content')
    <div class="testvalue btn green">
        กดสิ
    </div>
    {{-- ปุ่มกลับ --}}
    <div class="row">
        <div class="col-1 my-2">
            <a href="{{ route('home_user') }}" class="icon-20">
                <i class="fa-solid fa-circle-left"></i>
            </a>
        </div>
    </div>
    {{-- เนื้อหา --}}
    <div class="row">
        {{-- ตัวกรอง st --}}
        @include('include.rec-result-view.recfilter')
        {{-- ตัวกรอง ed --}}
        <div class="col-12 col-md-8">
            @include('include.rec-result-view.recheader')
            @include('include.rec-result-view.recvalselect')
            {{-- carlist --}}
            <div class="row" id="cardata">
                @include('include.rec-result-view.recdatacar')
            </div>
            <div class="loader text-center mt-5" style="display: none;">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('include.carlist.filtermobile') --}}
    </div>

    {{-- filter-mobile --}}
@endsection
@section('script')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
        integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            // ค่า category         
            // move เมื่อปรับขนาด st
            $(window).on('load resize', function() {
                if (window.innerWidth < 768) {
                    $('#filter').appendTo('#box-filter-mobile');
                } else {
                    $('#filter').appendTo('#box-filter-pc');
                }
            });
            // move เมื่อปรับขนาด ed

            var valPricemin = $('input[name="minPrice"]').val();
            var valPricemax = $('input[name="maxPrice"]').val();
            var valYearmin = 1990;
            var valYearmax = 2017;
            var valMake = $('#selectmake').val();
            var valModel = $('#selectmodel').val();
            var valVachicle = $('input[name="vachicle_style"]:checked').val();
            var valFuel = '';
            var valTransmission = '';
            var valSearch = $('input[name="searchcar"]').val();
            var sortPrice = '';
            var sortYear = '';
            var Datafilter;
            var timeout;
            var page = 1;

            // change search st
            $('input[name="searchcar"]').on('input', function() {
                valSearch = $(this).val();
                page = 1;
                console.log(valSearch);
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    Datafilter = {
                        valPricemin: valPricemin,
                        valPricemax: valPricemax,
                        valYearmin: valYearmin,
                        valYearmax: valYearmax,
                        valMake: valMake,
                        valModel: valModel,
                        valVachicle: valVachicle,
                        valFuel: valFuel,
                        valTransmission: valTransmission,
                        valSearch: valSearch,
                        ValSortPrice: sortPrice,
                        ValSortYear: sortYear,
                        page: page
                    };
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('filter_car') }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            Datafilter: Datafilter
                        },
                        success: function(response) {
                            console.log(response);
                            var ressearch = response.data.valSearch;
                            $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response
                                .total);
                            $("#cardata").empty();
                            $("#cardata").append(response.html);
                            if (valSearch) {
                                $('#search_select').show();
                                $('#text_search').text(ressearch);

                            } else {
                                $('#search_select').hide();
                            }

                        },
                        error: function(error) {

                            console.error('Error:', error);
                        }
                    });
                }, 2000);
            });
            // change search ed

            // change minprice st
            $('input[name="minPrice"]').on('input', function() {
                valPricemin = $(this).val();
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    page = 1;
                    Datafilter = {
                        valPricemin: valPricemin,
                        valPricemax: valPricemax,
                        valYearmin: valYearmin,
                        valYearmax: valYearmax,
                        valMake: valMake,
                        valModel: valModel,
                        valVachicle: valVachicle,
                        valFuel: valFuel,
                        valTransmission: valTransmission,
                        valSearch: valSearch,
                        ValSortPrice: sortPrice,
                        ValSortYear: sortYear,
                        page: page
                    };
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('filter_car') }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            Datafilter: Datafilter
                        },
                        success: function(response) {
                            console.log(response);
                            $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response
                                .total);
                            $("#cardata").empty();
                            $("#cardata").append(response.html);
                            var resminpirce = response.data.valPricemin;
                            var resmaxpirce = response.data.valPricemax;
                            if (resminpirce && resmaxpirce) {
                                $('#price_select').show();
                                $('#text_price').text(resminpirce + "-" + resmaxpirce);
                            } else if (resminpirce) {
                                $('#price_select').show();
                                $('#text_price').text(resminpirce +
                                    " ขึ้นไป");
                            } else if (resmaxpirce) {
                                $('#price_select').show();
                                $('#text_price').text("ต่ำกว่า " + resmaxpirce);
                            } else {
                                $('#price_select').hide();
                            }

                        },
                        error: function(error) {

                            console.error('Error:', error);
                        }
                    });
                }, 2000);
            });
            // change minprice ed

            // change maxprice st
            $('input[name="maxPrice"]').on('input', function() {
                valPricemax = $(this).val();
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    page = 1;
                    Datafilter = {
                        valPricemin: valPricemin,
                        valPricemax: valPricemax,
                        valYearmin: valYearmin,
                        valYearmax: valYearmax,
                        valMake: valMake,
                        valModel: valModel,
                        valVachicle: valVachicle,
                        valFuel: valFuel,
                        valTransmission: valTransmission,
                        valSearch: valSearch,
                        ValSortPrice: sortPrice,
                        ValSortYear: sortYear,
                        page: page
                    };
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('filter_car') }}",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            Datafilter: Datafilter
                        },
                        success: function(response) {

                            console.log(response);
                            $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response
                                .total);
                            $("#cardata").empty();
                            $("#cardata").append(response.html);

                            var resminpirce = response.data.valPricemin;
                            var resmaxpirce = response.data.valPricemax;
                            if (resminpirce && resmaxpirce) {
                                $('#price_select').show();
                                $('#text_price').text(resminpirce + "-" + resmaxpirce);
                            } else if (resminpirce) {
                                $('#price_select').show();
                                $('#text_price').text(resminpirce +
                                    " ขึ้นไป");
                            } else if (resmaxpirce) {
                                $('#price_select').show();
                                $('#text_price').text("ต่ำกว่า " + resmaxpirce);
                            } else {
                                $('#price_select').hide();
                            }
                        },
                        error: function(error) {

                            console.error('Error:', error);
                        }
                    });
                }, 2000);
            });
            // change maxprice ed

            // change year st
            var slider = $("#slider-range").slider({
                range: true,
                min: 1990,
                max: 2017,
                values: [1990, 2017],
                slide: function(event, ui) {
                    $("#yearmin").text(ui.values[0]);
                    $("#yearmax").text(ui.values[1]);
                    valYearmin = ui.values[0];
                    valYearmax = ui.values[1];

                    clearTimeout(timeout);
                    timeout = setTimeout(function() {
                        page = 1;
                        Datafilter = {
                            valPricemin: valPricemin,
                            valPricemax: valPricemax,
                            valYearmin: valYearmin,
                            valYearmax: valYearmax,
                            valMake: valMake,
                            valModel: valModel,
                            valVachicle: valVachicle,
                            valFuel: valFuel,
                            valTransmission: valTransmission,
                            valSearch: valSearch,
                            ValSortPrice: sortPrice,
                            ValSortYear: sortYear,
                            page: page
                        };
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('filter_car') }}",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            data: {
                                Datafilter: Datafilter
                            },
                            success: function(response) {
                                console.log(response);
                                $('#totalcar').text('รายการรถยนต์ทั้งหมด ' +
                                    response
                                    .total);
                                $("#cardata").empty();
                                $("#cardata").append(response.html);
                                var resyearmin = response.data.valYearmin;
                                var resyearmax = response.data.valYearmax;
                                if (resyearmin && resyearmax) {
                                    $('#text_year').text(resyearmin + '-' +
                                        resyearmax);
                                }

                            },
                            error: function(error) {

                                console.error('Error:', error);
                            }
                        });
                    }, 2000);
                },
                change: function(event, ui) {
                    console.log("ค่าปี", ui.values);
                }
            });
            // change year st

            // vachicle_style st
            $('input[name="vachicle_style"]').change(function() {
                valVachicle = $('input[name="vachicle_style"]:checked').val();
                console.log("Selected vachicle style: " + valVachicle);
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: 'POST',
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter
                    },
                    success: function(response) {
                        console.log(response);
                        var rescategory = response.data.valVachicle;
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                        if (rescategory) {
                            $('#category_select').show();
                            $('#text_category').text(rescategory);
                        }

                    },
                    error: function(error) {

                        console.error('Error:', error);
                    }
                });
            });
            // vachicle_style ed

            // change make st
            $('#selectmake').change(function(e) {
                e.preventDefault();
                valMake = $('#selectmake').val();
                console.log(valMake);
                if (valMake == '') {
                    $('#selectmodel').val('')
                    valModel = '';
                    $('#dropmodel').text('โมเดล');
                    $('#model_select').hide();
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('model_query') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        valMake: valMake,
                    },
                    success: function(response) {
                        console.log(response);
                        var model = response.model;
                        $('#selectmodel').empty();
                        $('#selectmodel').append($('<option>', {
                            value: '',
                            text: 'ไม่เลือกโมเดล'
                        }));

                        $.each(model, function(index, value) {
                            $('#selectmodel').append($('<option>', {
                                value: value.model,
                                text: value.model
                            }));
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed: " + textStatus, errorThrown);
                    }
                });
                if (valMake == '') {
                    $('#dropmake').text('ยี่ห้อ');
                    $('#dropmodel').prop('disabled', true);
                } else {
                    $('#dropmake').text(valMake);
                    $('#dropmodel').prop('disabled', false);
                }
                $('#dropmake').click();

                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: 'POST',
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                        var resmake = response.data.valMake;
                        if (resmake) {
                            $('#make_select').show();
                            $('#text_make').text(resmake);
                        } else {
                            $('#make_select').hide();
                        }

                    },
                    error: function(error) {

                        console.error('Error:', error);
                    }
                });

            });
            // change make ed

            // change model st
            $('#selectmodel').change(function(e) {
                e.preventDefault();
                valModel = $('#selectmodel').val();
                console.log(valModel);

                if (valModel == '') {
                    $('#dropmodel').text('โมเดล');
                } else {
                    $('#dropmodel').text(valModel);
                }
                $('#dropmodel').click();

                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: 'POST',
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                        var resmodel = response.data.valModel;
                        if (resmodel) {
                            $('#model_select').show();
                            $('#text_model').text(resmodel);
                        } else {
                            $('#model_select').hide();
                        }

                    },
                    error: function(error) {

                        console.error('Error:', error);
                    }
                });

            });
            // change model ed

            // fuel st
            $('input[name="fuel"]').change(function() {
                valFuel = $('input[name="fuel"]:checked').val();
                console.log("Selected vachicle style: " + valFuel);
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: 'POST',
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                        var resfuel = response.data.valFuel;
                        if (resfuel) {
                            $('#fuel_select').show();
                            $('#text_fuel').text(resfuel);

                        } else {
                            $('#fuel_select').hide();
                        }

                    },
                    error: function(error) {

                        console.error('Error:', error);
                    }
                });
            });
            // fuel ed

            // transmission st
            $('input[name="transmission"]').change(function() {
                valTransmission = $('input[name="transmission"]:checked').val();
                console.log("Selected vachicle style: " + valTransmission);
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: 'POST',
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                        var restransmission = response.data.valTransmission;
                        if (restransmission) {
                            $('#transmission_select').show();
                            $('#text_transmission').text(restransmission);

                        } else {
                            $('#transmission_select').hide();
                        }

                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            });
            // transmission ed

            // sort st
            $('.sort_price').on('click', function(e) {
                e.preventDefault();
                sortPrice = $(this).data('val-sort');
                console.log('Sort Value:', sortPrice);
                if (sortPrice != '') {
                    $('#sortprice_select').show();
                    if (sortPrice == 'DESC') {
                        $('#text_sortprice').text('ราคา:มากไปน้อย');
                    }
                    if (sortPrice == 'ASC') {
                        $('#text_sortprice').text('ราคา:น้อยไปมาก');
                    }
                } else {
                    $('#sortprice_select').hide();
                }
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: 'POST',
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(error) {

                        console.error('Error:', error);
                    }
                });
            });

            $('.sort_year').on('click', function(e) {
                e.preventDefault();
                sortYear = $(this).data('val-sort');
                console.log('Sort Value:', sortYear);

                if (sortYear != '') {
                    $('#sortyear_select').show();
                    if (sortYear == 'DESC') {
                        $('#text_sortyear').text('ปี:มากไปน้อย');
                    }
                    if (sortYear == 'ASC') {
                        $('#text_sortyear').text('ปี:น้อยไปมาก');
                    }
                } else {
                    $('#sortyear_select').hide();
                }

                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: 'POST',
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(error) {

                        console.error('Error:', error);
                    }
                });
            });
            // sort ed

            // resetall st
            $('#reset').click(function(e) {
                e.preventDefault();
                // search reset
                $('#searchcar').val('');
                valSearch = '';
                $('#search_select').hide();

                // price reset
                $('input[name="minPrice"]').val('');
                $('input[name="maxPrice"]').val('');
                valPricemin = '';
                valPricemax = '';
                $('#price_select').hide();

                // year reset
                slider.slider("values", [1990, 2017]);
                $('#yearmax').text(2017);
                $('#yearmin').text(1990);
                $('#text_year').text('1990-2017');
                valYearmin = 1990;
                valYearmax = 2017;

                // category reset
                $('input[name="vachicle_style"]').prop('checked', false);
                valVachicle = '';
                $('#category_select').hide();

                // make reset
                $('#selectmake').val('');
                valMake = '';
                $('#dropmake').text('ยี่ห้อ');
                $('#make_select').hide();

                // model reset
                $('#selectmodel').val('');
                valModel = '';
                $('#dropmodel').text('โมเดล');
                $('#model_select').hide();

                // fuel reset
                $('input[name="fuel"]').prop('checked', false);
                valFuel = '';
                $('#fuel_select').hide();

                // transmission reset 
                $('input[name="transmission"]').prop('checked', false);
                valTransmission = '';
                $('#transmission_select').hide();

                // sortprice reset
                sortPrice = '';
                $('#sortprice_select').hide();

                // sortyear reset
                sortYear = '';
                $('#sortyear_select').hide();

                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed: " + textStatus, errorThrown);
                    }
                });

            });
            // resetall ed

            // click reset st
            $('#close_search').click(function(e) {
                e.preventDefault();
                $('#searchcar').val('');
                valSearch = '';
                $('#search_select').hide();
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed: " + textStatus, errorThrown);
                    }
                });
            });

            $('#price_close').click(function(e) {
                e.preventDefault();
                $('input[name="minPrice"]').val('');
                $('input[name="maxPrice"]').val('');
                valPricemin = '';
                valPricemax = '';
                $('#price_select').hide();
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed: " + textStatus, errorThrown);
                    }
                });
            });

            $('#year_close').click(function(e) {
                e.preventDefault();
                slider.slider("values", [1990, 2017]);
                $('#yearmax').text(2017);
                $('#yearmin').text(1990);
                $('#text_year').text('1990-2017');
                valYearmin = 1990;
                valYearmax = 2017;

                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed: " + textStatus, errorThrown);
                    }
                });
            });

            $('#category_close').click(function(e) {
                e.preventDefault();
                $('input[name="vachicle_style"]').prop('checked', false);
                valVachicle = '';
                $('#category_select').hide();
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed: " + textStatus, errorThrown);
                    }
                });
            });

            $('#make_close').click(function(e) {
                e.preventDefault();
                $('#selectmake').val('');
                valMake = '';
                $('#dropmake').text('ยี่ห้อ');
                $('#make_select').hide();
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed: " + textStatus, errorThrown);
                    }
                });
            });

            $('#model_close').click(function(e) {
                e.preventDefault();
                $('#selectmodel').val('');
                valModel = '';
                $('#dropmodel').text('โมเดล');
                $('#model_select').hide();
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed: " + textStatus, errorThrown);
                    }
                });
            });

            $('#fuel_close').click(function(e) {
                e.preventDefault();
                $('input[name="fuel"]').prop('checked', false);
                valFuel = '';
                $('#fuel_select').hide();
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed: " + textStatus, errorThrown);
                    }
                });

            });

            $('#transmission_close').click(function(e) {
                e.preventDefault();
                $('input[name="transmission"]').prop('checked', false);
                valTransmission = '';
                $('#transmission_select').hide();
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed: " + textStatus, errorThrown);
                    }
                });

            });

            $('#sortprice_close').click(function(e) {
                e.preventDefault();
                sortPrice = '';
                $('#sortprice_select').hide();
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed: " + textStatus, errorThrown);
                    }
                });

            });

            $('#sortyear_close').click(function(e) {
                e.preventDefault();
                sortYear = '';
                $('#sortyear_select').hide();
                page = 1;
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                    type: "POST",
                    url: "{{ route('filter_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        Datafilter: Datafilter,
                    },
                    success: function(response) {
                        console.log(response);
                        $('#totalcar').text('รายการรถยนต์ทั้งหมด ' + response.total);
                        $("#cardata").empty();
                        $("#cardata").append(response.html);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX request failed: " + textStatus, errorThrown);
                    }
                });

            });


            // click reset ed

            // scorll lode st
            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 10)) {
                    page++;
                    LoadMore(page);
                }
            });

            function LoadMore(page) {
                // alert(page);
                Datafilter = {
                    valPricemin: valPricemin,
                    valPricemax: valPricemax,
                    valYearmin: valYearmin,
                    valYearmax: valYearmax,
                    valMake: valMake,
                    valModel: valModel,
                    valVachicle: valVachicle,
                    valFuel: valFuel,
                    valTransmission: valTransmission,
                    valSearch: valSearch,
                    ValSortPrice: sortPrice,
                    ValSortYear: sortYear,
                    page: page
                };
                $.ajax({
                        url: "{{ route('filter_car') }}",
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            Datafilter: Datafilter
                        },
                        beforeSend: function() {
                            $('.loader').show();
                        },
                    })
                    .done(function(response) {
                        console.log(response);
                        if (response.html == '') {
                            $('.loader').html("End");
                            return;
                        }
                        $('.loader').hide();
                        $("#cardata").append(response.html);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log('Server error occurred');
                    });
            };
            // scorll lode ed

            $(".testvalue").click(function(e) {
                e.preventDefault();
                alert("Search: " + valSearch +
                    "\nMake: " + valMake +
                    "\nModel: " + valModel +
                    "\nYear Range: " + valYearmin + " - " + valYearmax +
                    "\nVehicle Style: " + valVachicle +
                    "\nPrice Range: " + valPricemin + " - " + valPricemax +
                    "\nFuel Type: " + valFuel +
                    "\nTransmission: " + valTransmission
                );

            });
        });

        $(document).on('click', '.click_idcar', function() {
            let idcar = $(this).data("car-id");
            // console.log(idcar);

            $.ajax({
                type: "POST",
                url: "{{ route('increment_view_car') }}",
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    idcar: idcar
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = "/car_view/" + response.idcar;
                }
            });
        });
    </script>
@endsection

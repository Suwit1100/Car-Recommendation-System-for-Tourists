@extends('layout.homeuser')
@section('style')
    <style>
        .imgcar {
            width: 100%;
            overflow: hidden;
            border-radius: 10px;
            filter: drop-shadow(4px 4px 4px rgba(0, 0, 0, 0.5));
        }

        .imgcar img {
            width: 100%;
            object-fit: cover;
            object-position: center center;
        }

        .box-detail {
            background-color: #23c686;
            border-radius: 10px;
            color: white;
            filter: drop-shadow(4px 4px 4px rgba(0, 0, 0, 0.5));
        }

        .box-detail i {
            font-size: 24px;
            margin-right: 5px;
        }

        .box-detail span {
            font-size: 14px;
            font-weight: 500;
        }

        .line {
            border-top: 4px solid white !important;
            opacity: 1;
            margin: 1px;
        }
    </style>
@endsection
@section('content')
    {{-- ปุ่มกลับ --}}
    <div class="row">
        <div class="col-12 my-2">
            <a href="{{ route('car-list') }}" class="icon-20">
                <i class="fa-solid fa-circle-left"></i>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-7 my-2">
            <div class="imgcar">
                <img src="https://images.unsplash.com/photo-1553440569-bcc63803a83d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGNhcnN8ZW58MHx8MHx8fDA%3D"
                    alt="">
            </div>
        </div>
        <div class="col-12 col-lg-5 my-2 ">
            <div class="row">
                <div class="col-6">
                    <h4 style="color: #134bc5; font-weight: 900;">{{ $car->make }} {{ $car->model }}</h4>
                </div>
                <div class="col-6 d-flex" style="color: #ac5b4d;">
                    <i class="fa-solid fa-money-bill-wave me-2" style="line-height: 24px"></i>
                    <h5 style="font-weight: 700;">{{ $car->price_rent }}</h5>
                </div>
                <div class="col-12">
                    <div class="row">
                        @php
                            $check_like = DB::table('like_car')
                                ->where('likeby_userid', Auth::user()->id)
                                ->where('carpost_id', $car->id_cardataset)
                                ->first();
                            $status = '';
                            if ($check_like == null) {
                                $status = 'notready';
                            } else {
                                $status = $check_like->status;
                            }

                        @endphp
                        <div class="col-6">
                            <i class="fa-solid fa-eye"></i>
                            จำนวนคนเข้าชม {{ $car->total_view }}
                        </div>
                        <div class="col-6">
                            <i class="fa-regular fa-heart click_like" {{ $status == 'notready' ? '' : 'hidden' }}
                                data-status-like="{{ $status }}" data-car-id ="{{ $car->id_cardataset }}"
                                role="button" id="regular-heart"></i>
                            <i class="fa-solid fa-heart click_like" {{ $status == 'ready' ? '' : 'hidden' }}
                                data-status-like="{{ $status }}" data-car-id ="{{ $car->id_cardataset }}"
                                role="button" id="solid-heart"></i>
                            <span id="total_like">
                                จำนวนคนถูกใจ {{ $car->total_like }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="box-detail">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="m-0 mt-1">คุณสมบัติรถ</h5>
                            <hr class="line">
                        </div>
                        <div class="col-6 d-flex align-items-center my-2">
                            <i class="fa-solid fa-calendar"></i>
                            <span>{{ $car->year }}</span>
                        </div>
                        <div class="col-6 d-flex align-items-center my-2 ">
                            <i class="fa-solid fa-car"></i>
                            <span>{{ $car->vehicle_style }}</span>
                        </div>
                        <div class="col-6 d-flex align-items-center my-2 text-truncate">
                            <i class="fa-solid fa-gas-pump"></i>
                            <span>{{ $car->engine_fuel_type }}</span>
                        </div>
                        <div class="col-6 d-flex align-items-center my-2 text-truncate">
                            <i class="fa-solid fa-gears"></i>
                            <span>{{ $car->transmission_type }}</span>
                        </div>
                        <div class="col-6 d-flex align-items-center my-2 text-truncate">
                            <i class="fa-solid fa-drum-steelpan"></i>
                            <span>{{ $car->engine_cylinders }}</span>
                        </div>
                        <div class="col-6 d-flex align-items-center my-2 text-truncate">
                            <i class="fa-solid fa-door-open"></i>
                            <span>{{ $car->number_doors }}</span>
                        </div>
                        <div class="col-6 d-flex align-items-center my-2 text-truncate">
                            <i class="fa-solid fa-city"></i>
                            <span>{{ $car->city_mpg }}</span>
                        </div>
                        <div class="col-6 d-flex align-items-center my-2 text-truncate">
                            <i class="fa-solid fa-road"></i>
                            <span>{{ $car->highway_mpg }}</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.click_like').click(function(e) {
                e.preventDefault();
                $('.click_like').css('pointer-events', 'none');
                let statuslike = $(this).data("status-like")
                let idcars = $(this).data("car-id")
                console.log(statuslike, idcars);
                $.ajax({
                    type: "POST",
                    url: "{{ route('like_car') }}",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        statuslike: statuslike,
                        idcars: idcars
                    },
                    success: function(response) {
                        console.log(response);
                        $('.click_like').css('pointer-events', 'auto');
                        if (response.newstatus == 'ready') {
                            $('#regular-heart').attr('hidden', true);
                            $('#solid-heart').attr('hidden', false);
                        } else {
                            $('#regular-heart').attr('hidden', false);
                            $('#solid-heart').attr('hidden', true);
                        }
                        $('.click_like').attr('data-status-like', response.newstatus);
                        $('#total_like').text('จำนวนคนถูกใจ' + response.total)
                    }
                });
            });
        });
    </script>
@endsection

@extends('layout.homeuser')
@section('style')
    <style>
        .img-car {
            height: 270px;
        }

        .img-car img {
            object-fit: cover;
            object-position: center center;
            min-width: 100%;
            min-height: 100%
        }
    </style>
@endsection
@section('content')
    <div class="row pt-3">
        <div class="col-12">
            <span class="text-24-bolder">
                <i class="fa-solid fa-heart"></i>
                รายการรถยนต์ที่ถูกใจ
            </span>
        </div>
    </div>
    <div class="row mt-3">
        @foreach ($car_like as $icar_like)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2">
                <div class="card">
                    <div class="img-car">
                        <img src="{{ asset('assets/imgcar/' . $icar_like->imgcar) }}" class="card-img-top" alt="">
                    </div>
                    <div class="card-body">
                        <p class="card-title  text-truncate text-20-bolder m-0" style="color: #134bc5">
                            {{ $icar_like->make }}
                            {{ $icar_like->model }}</p>
                        <div class="row">
                            <div class="col-6">
                                <p class="text-16-bold m-0 text-truncate">
                                    {{ $icar_like->vehicle_style }}
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="text-16-bold m-0" style="color: #ac5b4d">
                                    {{ $icar_like->price_rent }}
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="text-14-normal m-0">
                                    City MPG
                                </p>
                            </div>
                            <div class="col-6">
                                <p class="text-14-normal m-0">
                                    แรงม้า
                                </p>
                            </div>
                            <div class="col-6">
                                <p class=" text-14-normal">
                                    {{ $icar_like->city_mpg }}
                                </p>
                            </div>
                            <div class="col-6">
                                <p class=" text-14-normal">
                                    {{ $icar_like->engine_hp }}
                                </p>
                            </div>
                        </div>
                        <a href="#" class="btn btn-green form-control click_idcar"
                            data-car-id = "{{ $icar_like->id_cardataset }}">{{ $icar_like->id_cardataset }}
                            ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{ $car_like->links() }}
    </div>
@endsection
@section('script')
@endsection

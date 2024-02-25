@foreach ($cars as $icars)
    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mt-2">
        <div class="card">
            <div class="box-car-img">
                <img src="{{ asset('assets/imgcar/' . $icars->imgcar) }}" class="card-img-top" alt="">
            </div>
            <div class="card-body">
                <p class="card-title  text-truncate text-20-bolder m-0" style="color: #134bc5">{{ $icars->make }}
                    {{ $icars->model }}</p>
                <div class="row">
                    <div class="col-6">
                        <p class="text-16-bold m-0 text-truncate">
                            {{ $icars->vehicle_style }}
                        </p>
                    </div>
                    <div class="col-6">
                        <p class="text-16-bold m-0" style="color: #ac5b4d">
                            {{ $icars->price_rent }}
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
                            {{ $icars->city_mpg }}
                        </p>
                    </div>
                    <div class="col-6">
                        <p class=" text-14-normal">
                            {{ $icars->engine_hp }}
                        </p>
                    </div>
                </div>
                <a href="#" class="btn btn-green form-control click_idcar"
                    data-car-id = "{{ $icars->id_cardataset }}">{{ $icars->id_cardataset }}
                    ดูรายละเอียด</a>
            </div>
        </div>
    </div>
@endforeach

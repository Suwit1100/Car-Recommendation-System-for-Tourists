@php
    $total = DB::table('car_dataset')
        ->where('vehicle_style', 'Pickup')
        ->count();
    $city = DB::table('car_dataset')
        ->where('vehicle_style', 'Pickup')
        ->sum('city_mpg');
    $hy = DB::table('car_dataset')
        ->where('vehicle_style', 'Pickup')
        ->sum('highway_mpg');
    $hp = DB::table('car_dataset')
        ->where('vehicle_style', 'Pickup')
        ->sum('engine_hp');
    $price = DB::table('car_dataset')
        ->where('vehicle_style', 'Pickup')
        ->sum('price_rent');
    $averagecity = intval($city / $total);
    $averagehy = intval($hy / $total);
    $averagehp = intval($hp / $total);
    $averageprice = intval($price / $total);
@endphp
<div class="result-pickup">
    <div class="row">
        <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <div class="text-result">
                <p class="title">Pickup</p>
                <span class="details">
                    การขับขี่ Pickup มีความเสถียรและทนทาน,
                    ทำให้เป็นทางเลือกที่ดีสำหรับการเดินทางที่ระหว่างเมืองและภายในพื้นที่ชนบท.
                    ความสามารถในการบรรจุของมาก, ทำให้ Pickup
                    เป็นเลือกที่ทันสมัยสำหรับการใช้งานทางธุรกิจหรือการท่องเที่ยวที่ต้องการพื้นที่บรรจุของมาก.
                </span>
            </div>
        </div>
        <div class="col-lg-6 ">
            <div class="img-result">
                <img src="https://www.autocar.co.uk/sites/autocar.co.uk/files/styles/gallery_slide/public/images/car-reviews/first-drives/legacy/1-ford-ranger-top-10.jpg?itok=cKa9YE-j"
                    alt="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-4">
                    <div class="box-feture">
                        <div class="imgfeture text-center">
                            <i class="fa-solid fa-horse"></i>
                        </div>
                        <div class="detailfeture text-center">
                            <div>
                                แรงม้าเฉลี่ย
                            </div>
                            <span>
                                {{ $averagehp }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="box-feture">
                        <div class="imgfeture text-center">
                            <i class="fa-solid fa-fire-flame-simple"></i>
                        </div>
                        <div class="detailfeture text-center ">
                            <div class="text-truncate">
                                City/Highway MPG เฉลี่ย
                            </div>
                            <span>
                                {{ $averagecity }}/{{ $averagehy }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="box-feture">
                        <div class="imgfeture text-center">
                            <i class="fa-solid fa-sack-dollar"></i>
                        </div>
                        <div class="detailfeture text-center">
                            <span>
                                ราคาเฉลี่ย {{ $averageprice }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex justify-content-end align-items-center">
            <button class="btn btn-next-pre" data-bs-toggle="modal" data-bs-target="#myModal">
                <i class="fa-solid fa-circle-right"></i>
            </button>
        </div>
    </div>
</div>

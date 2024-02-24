@php
    $total = DB::table('car_dataset')->where('vehicle_style', 'Hatchback')->count();
    $city = DB::table('car_dataset')->where('vehicle_style', 'Hatchback')->sum('city_mpg');
    $hy = DB::table('car_dataset')->where('vehicle_style', 'Hatchback')->sum('highway_mpg');
    $hp = DB::table('car_dataset')->where('vehicle_style', 'Hatchback')->sum('engine_hp');
    $price = DB::table('car_dataset')->where('vehicle_style', 'Hatchback')->sum('price_rent');
    $averagecity = intval($city / $total);
    $averagehy = intval($hy / $total);
    $averagehp = intval($hp / $total);
    $averageprice = intval($price / $total);
@endphp
<div class="result-hatchback">
    <div class="row">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <div class="text-result">
                <p class="title">รถยนต์ที่แนะนำ Hatchback</p>
                <span class="details">
                    รถ Hatchback เป็นรถยนต์ที่มีลักษณะทรงคารอบที่มีหลังคาที่สามารถเปิดขึ้นได้ด้วยตัว,
                    ทำให้มีพื้นที่สำหรับบรรจุของมากมาย. ลักษณะทรงคารอบที่สั้นและสะดุดตา, ทำให้ Hatchback
                    เป็นทางเลือกที่สนุกสนานและทันสมัย.
                </span>
            </div>
        </div>
        <div class="col-6 ">
            <div class="img-result">
                <img src="https://assets.autobuzz.my/wp-content/uploads/2021/11/17132715/2021-Honda-City-Hatchback-Malaysia-17.jpg"
                    alt="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
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
                        <div class="detailfeture text-center text-truncate">
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
                            <div>
                                ราคาเฉลี่ย
                            </div>
                            <span>
                                {{ $averageprice }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 d-flex justify-content-end align-items-center">
            <button class="btn btn-next-pre" data-bs-toggle="modal" data-bs-target="#myModal">
                <i class="fa-solid fa-circle-right"></i>
            </button>
        </div>
    </div>
</div>

@php
    $total = DB::table('car_dataset')->where('vehicle_style', 'Minivan')->count();
    $city = DB::table('car_dataset')->where('vehicle_style', 'Minivan')->sum('city_mpg');
    $hy = DB::table('car_dataset')->where('vehicle_style', 'Minivan')->sum('highway_mpg');
    $hp = DB::table('car_dataset')->where('vehicle_style', 'Minivan')->sum('engine_hp');
    $price = DB::table('car_dataset')->where('vehicle_style', 'Minivan')->sum('price_rent');
    $averagecity = intval($city / $total);
    $averagehy = intval($hy / $total);
    $averagehp = intval($hp / $total);
    $averageprice = intval($price / $total);
@endphp
<div class="result-van">
    <div class="row">
        <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="text-result">
                <p class="title">รถยนต์ที่แนะนำ Mini Van</p>
                <span class="details">
                    การขับขี่ Mini Van มีความสบายและสง่างาม, ทำให้เป็นทางเลือกที่ดีสำหรับการเดินทางที่มีผู้โดยสารมาก.
                    นอกจากนี้, Mini Van มักมีความหลากหลายในรุ่นและรายละเอียด,
                    ทำให้ผู้ใช้สามารถเลือกรถที่เหมาะกับความต้องการและงบประมาณของตน.
                </span>
            </div>
        </div>
        <div class="col-12 col-lg-6 ">
            <div class="img-result">
                <img src="https://cdn.jdpower.com/Most%20Reliable%20Minivans.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
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
                        <div class="detailfeture text-center">
                            <div class="text-truncate">
                                <span> City/Highway MPG เฉลี่ย</span>
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
        <div class="col-12 col-lg-6 d-flex justify-content-end align-items-center">
            <button class="btn btn-next-pre" data-bs-toggle="modal" data-bs-target="#myModal">
                <i class="fa-solid fa-circle-right"></i>
            </button>
        </div>
    </div>
</div>

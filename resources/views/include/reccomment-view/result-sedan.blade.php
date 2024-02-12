@php
    $total = DB::table('car_dataset')
        ->where('vehicle_style', 'Sedan')
        ->count();
    $city = DB::table('car_dataset')
        ->where('vehicle_style', 'Sedan')
        ->sum('city_mpg');
    $hy = DB::table('car_dataset')
        ->where('vehicle_style', 'Sedan')
        ->sum('highway_mpg');
    $hp = DB::table('car_dataset')
        ->where('vehicle_style', 'Sedan')
        ->sum('engine_hp');
    $price = DB::table('car_dataset')
        ->where('vehicle_style', 'Sedan')
        ->sum('msrp');
    $averagecity = intval($city / $total);
    $averagehy = intval($hy / $total);
    $averagehp = intval($hp / $total);
    $averageprice = intval($price / $total);
@endphp
<div class="result-sedan">
    <div class="row">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <div class="text-result">
                <p class="title">รถยนต์ที่แนะนำ Sedan</p>
                <span class="details">
                    รถ Sedan
                    เป็นทางเลือกที่ดีสำหรับการท่องเที่ยวด้วยลักษณะทรงคารอบที่สวยงามและทำให้การขับขี่เป็นไปอย่างสบายสบาย
                    มีความสะดวกสบายในการเดินทางที่ไกลโพ้นและมีประสิทธิภาพในการใช้น้ำมันที่ดี
                    รวมถึงมีระบบความปลอดภัยที่ครอบคลุม เหมาะสำหรับการท่องเที่ยวทั่วไปและการเดินทางกลางท้องที่สนุกสนาน.
                </span>
            </div>
        </div>
        <div class="col-6 ">
            <div class="img-result">
                <img src="https://www.audi.co.th/content/dam/nemo/sea/th/models/a4/a4-sedan/my-2023/stage/1920x1080-1.jpg?imwidth=768"
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

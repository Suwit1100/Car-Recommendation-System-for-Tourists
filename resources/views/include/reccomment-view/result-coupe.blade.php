@php
    $total = DB::table('car_dataset')
        ->where('vehicle_style', 'Coupe')
        ->count();
    $city = DB::table('car_dataset')
        ->where('vehicle_style', 'Coupe')
        ->sum('city_mpg');
    $hy = DB::table('car_dataset')
        ->where('vehicle_style', 'Coupe')
        ->sum('highway_mpg');
    $hp = DB::table('car_dataset')
        ->where('vehicle_style', 'Coupe')
        ->sum('engine_hp');
    $price = DB::table('car_dataset')
        ->where('vehicle_style', 'Coupe')
        ->sum('msrp');
    $averagecity = intval($city / $total);
    $averagehy = intval($hy / $total);
    $averagehp = intval($hp / $total);
    $averageprice = intval($price / $total);
@endphp
<div class="result-coupe">
    <div class="row">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <div class="text-result">
                <p class="title">รถยนต์ที่แนะนำ Coupe</p>
                <span class="details">
                    การขับขี่ Coupe มักเน้นไปที่ประสบการณ์ขับขี่ที่น่าตื่นเต้น,
                    ด้วยเครื่องยนต์ที่มีประสิทธิภาพสูงและลักษณะทางดีไซน์ที่ช่วยเพิ่มความเร้าใจในการท่องเที่ยว.
                    นอกจากนี้, มีความสวยงามในรายละเอียดของภายนอกและภายในที่ทำให้ Coupe
                    น่าประทับใจและเป็นที่ชื่นชอบของผู้คนที่รักความหลงใหลในรถยนต์.
                </span>
            </div>
        </div>
        <div class="col-6 ">
            <div class="img-result">
                <img src="https://autoinfo.co.th/uploads/2023/07/358054082_6299950766790210_614459798166193120_n.jpg"
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
                                {{ $averagehp }} </span>
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

@php
    $total = DB::table('car_dataset')
        ->where('vehicle_style', 'Convertible')
        ->count();
    $city = DB::table('car_dataset')
        ->where('vehicle_style', 'Convertible')
        ->sum('city_mpg');
    $hy = DB::table('car_dataset')
        ->where('vehicle_style', 'Convertible')
        ->sum('highway_mpg');
    $hp = DB::table('car_dataset')
        ->where('vehicle_style', 'Convertible')
        ->sum('engine_hp');
    $price = DB::table('car_dataset')
        ->where('vehicle_style', 'Convertible')
        ->sum('msrp');
    $averagecity = intval($city / $total);
    $averagehy = intval($hy / $total);
    $averagehp = intval($hp / $total);
    $averageprice = intval($price / $total);
@endphp
<div class="result-convertible">
    <div class="row">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <div class="text-result">
                <p class="title">รถยนต์ที่แนะนำ Convertible</p>
                <span class="details">
                    การขับขี่รถ Convertible ให้ความรู้สึกเป็นพิเศษมาก,
                    โดยเฉพาะเมื่อหลังคาถูกยกขึ้นและคุณสามารถรับลมหลายรสชาติที่มีกลิ่นอากาศสดชื่นขณะท่องเที่ยว.
                    ลักษณะทรงคารอบที่โปร่งใสเมื่อเปิดหลังคาทำให้คุณสามารถสัมผัสกับธรรมชาติได้อย่างใกล้ชิด,
                    ทำให้ทริปท่องเที่ยวกลางท้องหรือไปยังที่ท่องเที่ยวที่สวยงามเป็นประสบการณ์ที่ดีขึ้น.
                    รถ Convertible มักมีลักษณะทางดีไซน์ที่โดดเด่น, ด้วยรายละเอียดที่ดีเยี่ยมทั้งภายนอกและภายใน.
                    การออกแบบที่เฉพาะตัวทำให้รถนี้เป็นที่ประทับใจและเป็นที่นิยมของคนที่คำนึงถึงสไตล์.
                </span>
            </div>
        </div>
        <div class="col-6 ">
            <div class="img-result">
                <img src="https://cfx-wp-images.imgix.net/2022/05/2020-Audi-A5-edited.jpg?auto=compress%2Cformat&ixlib=php-3.3.0&s=853ac17d3d90fa4a3a68b3fe8e13cd41"
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

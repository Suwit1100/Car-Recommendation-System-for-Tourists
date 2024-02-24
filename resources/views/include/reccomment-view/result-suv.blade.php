@php
    $total = DB::table('car_dataset')
        ->where('vehicle_style', 'SUV')
        ->count();
    $city = DB::table('car_dataset')
        ->where('vehicle_style', 'SUV')
        ->sum('city_mpg');
    $hy = DB::table('car_dataset')
        ->where('vehicle_style', 'SUV')
        ->sum('highway_mpg');
    $hp = DB::table('car_dataset')
        ->where('vehicle_style', 'SUV')
        ->sum('engine_hp');
    $price = DB::table('car_dataset')
        ->where('vehicle_style', 'SUV')
        ->sum('price_rent');
    $averagecity = intval($city / $total);
    $averagehy = intval($hy / $total);
    $averagehp = intval($hp / $total);
    $averageprice = intval($price / $total);
@endphp
<div class="result-suv">
    <div class="row">
        <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="text-result">
                <p class="title">รถยนต์ที่แนะนำ SUV</p>
                <span class="details">
                    รถ SUV มีความสามารถในการเดินทางทั้งในเมืองและในสภาพถนนที่รุนแรงด้วยความสูงของรถที่สูงขึ้น
                    ซึ่งช่วยให้ผู้โดยสารมีมองเห็นไกลและมีความควบคุมที่ดี นอกจากนี้ รถ SUV
                    ยังมีพื้นที่ภายในกว้างขวางที่สามารถรับผู้โดยสารและของขวัญได้มาก
                    ทำให้เป็นเลือกที่สมบูรณ์สำหรับครอบครัวและการเดินทางไกลในความสบายความรวดเร็วและความสบายใจ.
                </span>
            </div>
        </div>
        <div class="col-12 col-lg-6 ">
            <div class="img-result">
                <img src="https://www.grandprix.co.th/wp-content/uploads/2020/09/mercedes_benz_suv_driving_events_007.jpg"
                    alt="">
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
                        <div class="detailfeture text-center text-truncate mt-2">
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
                        <div class="detailfeture text-center text-truncate mt-2">
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
                        <div class="detailfeture text-center text-truncate mt-2">
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
        <div class="col-12 col-lg-6 d-flex justify-content-end align-items-center " id="btn-next-review">
            <button class="btn btn-next-pre" data-bs-toggle="modal" data-bs-target="#myModal">
                <i class="fa-solid fa-circle-right"></i>
            </button>
        </div>
    </div>
</div>

@php
    $total = DB::table('car_dataset')
        ->where('vehicle_style', 'Wagon')
        ->count();
    $city = DB::table('car_dataset')
        ->where('vehicle_style', 'Wagon')
        ->sum('city_mpg');
    $hy = DB::table('car_dataset')
        ->where('vehicle_style', 'Wagon')
        ->sum('highway_mpg');
    $hp = DB::table('car_dataset')
        ->where('vehicle_style', 'Wagon')
        ->sum('engine_hp');
    $price = DB::table('car_dataset')
        ->where('vehicle_style', 'Wagon')
        ->sum('msrp');
    $averagecity = intval($city / $total);
    $averagehy = intval($hy / $total);
    $averagehp = intval($hp / $total);
    $averageprice = intval($price / $total);
@endphp
<div class="result-wagon">
    <div class="row">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <div class="text-result">
                <p class="title">รถยนต์ที่แนะนำWagon</p>
                <span class="details">
                    รถ Station Wagon เป็นรถยนต์ที่มีลักษณะทรงคารอบที่ยาวและมีพื้นที่ภายในที่กว้างขวาง,
                    ทำให้เป็นทางเลือกที่เหมาะสำหรับครอบครัวหรือผู้ที่ต้องการพื้นที่บรรจุของมากๆ. ลักษณะทรงคารอบที่ยาวของ
                    Station Wagon ทำให้มีความสามารถในการบรรจุของมากพอสมควร, ไม่ว่าจะเป็นกระเป๋าเดินทางหรือสินค้าต่างๆ.
                </span>
            </div>
        </div>
        <div class="col-6 ">
            <div class="img-result">
                <img src="https://www.ebaymotorsblog.com/motors/blog/wp-content/uploads/2022/10/Ford_Taurus_Station_Wagon_right_front_profile.jpg"
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

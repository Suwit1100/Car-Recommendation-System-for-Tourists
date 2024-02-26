@extends('layout.homeuser')
@section('style')
    <style>
        .carousel-item img {
            object-fit: cover;
            height: 250px;
            object-position: center center;
        }

        .btn-greentheam {
            background-color: #23c686;
        }

        .btn-greentheam:hover {
            background-color: #0A955F;

        }

        .item:hover {
            border: 1px solid #23c686 !important;
        }

        .wrapper {
            max-height: 120px;
            display: flex;
            line-height: 50px;
            overflow-x: auto;
        }

        .wrapper::-webkit-scrollbar {
            width: 0;
            display: none;
        }

        .wrapper .item {
            margin-right: 5px;
            border-radius: 10px;
        }

        .wrapper .item img {
            width: 60px;
            height: 60px;
        }

        .wrapper .item p {
            width: 60px;
            height: 60px;
            margin: 0;
        }

        /* แสดงปุ่มเลื่อน */
        .sidescroll {
            display: none;
        }

        .imgtooltip img {
            max-width: 100%;
            height: 230px;
            object-fit: cover;
            object-position: center center;
        }

        @media only screen and (max-width: 865px) {
            .sidescroll {
                display: flex;
            }
        }

        /* แสดงปุ่มเลื่อน */
    </style>
@endsection
@section('slideimg')
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.hollywoodreporter.com/wp-content/uploads/2021/08/AdobeStock_92392668-maximus19-H-MAIN-2021.jpg?w=1200"
                    class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/NM_124_and_US_66_WB_near_Budville_NM.jpg/1200px-NM_124_and_US_66_WB_near_Budville_NM.jpg"
                    class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="https://media.cntraveler.com/photos/59397037b5eac72bc4068888/16:9/w_2560%2Cc_limit/rentingacarunder25.jpg"
                    class="d-block w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@endsection
@section('content')
    <div class="mt-3">
        <a href="{{ route('car-list') }}" class="btn form-control form-control-lg btn-greentheam title20 text-white">
            ดูรถยนต์ทั้งหมด
        </a>
    </div>

    {{-- ยี่ห้อ st --}}
    <div class="mt-3">
        <span class="title20">
            ยี่ห้อรถยนต์
        </span>
    </div>
    <div class="row">
        <div class="col-1 d-flex align-items-center justify-content-center">
            <button id="makeleft" class="btn icon-20 sidescroll2">
                <i class="fa-solid fa-circle-left"></i>
            </button>
        </div>
        <div class="col-10">
            <div class="wrapper p-0 wrapmake">
                @php
                    $makedata = DB::table('namemake')->get();
                    $makecheck = DB::table('car_dataset')->select('make')->distinct()->get();
                    $makeValues = $makecheck->pluck('make')->toArray();
                    $filteredData = DB::table('namemake')->whereIn('namemake', $makeValues)->get();
                @endphp
                @foreach ($filteredData as $ifilteredData)
                    <a href="{{ route('car_list_make', $ifilteredData->namemake) }}" class="item px-3 p-1 btn border">
                        <img src="{{ asset('assets/imghomeuser/logomake/' . $ifilteredData->img) }}" alt="">
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-1 d-flex align-items-center justify-content-center">
            <button id="makeright" class="btn icon-20 sidescroll2">
                <i class="fa-solid fa-circle-right"></i>
            </button>
        </div>
    </div>
    {{-- ยี่ห้อ ed --}}

    {{-- ประเภท st --}}
    <div class="mt-3">
        <span class="title20">
            ประเภทรถยนต์
        </span>
    </div>
    <div class="row">
        <div class="col-1 d-flex align-items-center justify-content-center">
            <button id="category_left" class="btn icon-20 sidescroll">
                <i class="fa-solid fa-circle-left"></i>
            </button>
        </div>
        <div class="col-10">
            <div class="wrapper p-0 wrapcategory">

                <a href="{{ route('car_list_category', 'convertible') }}" class="item px-3 p-1 btn border">
                    <img src="{{ asset('assets/imghomeuser/category/convertible.png') }}" alt="">
                </a>
                <a href="{{ route('car_list_category', 'coupe') }}" class="item px-3 p-1 btn border">
                    <img src="{{ asset('assets/imghomeuser/category/coupe.png') }}" alt="">
                </a>
                <a href="{{ route('car_list_category', 'hatchback') }}" class="item px-3 p-1 btn border">
                    <img src="{{ asset('assets/imghomeuser/category/hatchback.png') }}" alt="">
                </a>
                <a href="{{ route('car_list_category', 'pickup') }}" class="item px-3 p-1 btn border">
                    <img src="{{ asset('assets/imghomeuser/category/pickup.png') }}" alt="">
                </a>
                <a href="{{ route('car_list_category', 'sedan') }}" class="item px-3 p-1 btn border">
                    <img src="{{ asset('assets/imghomeuser/category/sedan.png') }}" alt="">
                </a>
                <a href="{{ route('car_list_category', 'suv') }}" class="item px-3 p-1 btn border">
                    <img src="{{ asset('assets/imghomeuser/category/suv.png') }}" alt="">
                </a>
                <a href="{{ route('car_list_category', 'minivan') }}" class="item px-3 p-1 btn border">
                    <img src="{{ asset('assets/imghomeuser/category/van.png') }}" alt="">
                </a>
                <a href="{{ route('car_list_category', 'wagon') }}" class="item px-3 p-1 btn border">
                    <img src="{{ asset('assets/imghomeuser/category/wagon.png') }}" alt="">
                </a>


            </div>
        </div>
        <div class="col-1 d-flex align-items-center justify-content-center">
            <button id="category_right" class="btn icon-20 sidescroll">
                <i class="fa-solid fa-circle-right"></i>
            </button>
        </div>
    </div>
    {{-- ประเภท ed --}}

    {{-- ราคารถยนต์ st --}}
    <div class="mt-3">
        <span class="title20">
            ราคารถยนต์
        </span>
    </div>
    <div class="row">
        <div class="col-1 d-flex align-items-center justify-content-center">
            <button id="price_left" class="btn icon-20 sidescroll">
                <i class="fa-solid fa-circle-left"></i>
            </button>
        </div>
        <div class="col-10">
            <div class="wrapper p-0 wrapprice">

                <a href="test/" class="item px-3 p-1 btn border">
                    <p>ต่ำกว่า 10K</p>
                </a>
                <a href="test/coupe" class="item px-3 p-1 btn border">
                    <p>10K-40K</p>
                </a>
                <a href="test/hatchback" class="item px-3 p-1 btn border">
                    <p>40K-80K</p>
                </a>
                <a href="test/pickup" class="item px-3 p-1 btn border">
                    <p>80K-120K</p>
                </a>
                <a href="test/sedan" class="item px-3 p-1 btn border">
                    <p>120K-160K</p>
                </a>
                <a href="test/suv" class="item px-3 p-1 btn border">
                    <p>160K-200K</p>
                </a>
                <a href="test/van" class="item px-3 p-1 btn border">
                    <p>200K-300K</p>
                </a>
                <a href="test/wagon" class="item px-3 p-1 btn border">
                    <p>มากกว่า 300K</p>
                </a>


            </div>
        </div>
        <div class="col-1 d-flex align-items-center justify-content-center">
            <button id="price_right" class="btn icon-20 sidescroll">
                <i class="fa-solid fa-circle-right"></i>
            </button>
        </div>
    </div>
    {{-- ราคารถยนต์ ed --}}
    <br>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var wrapper = $('.wrapmake');
            var scrollDistance = 200;

            $('#makeleft').on('click', function() {
                wrapper.animate({
                    scrollLeft: '-=' + scrollDistance
                }, 350);
            });

            $('#makeright').on('click', function() {
                wrapper.animate({
                    scrollLeft: '+=' + scrollDistance
                }, 350);
            });
            // ยี่ห้อ

            var wrapcategory = $('.wrapcategory');
            $('#category_left').on('click', function() {
                wrapcategory.animate({
                    scrollLeft: '-=' + scrollDistance
                }, 350);
            });

            $('#category_right').on('click', function() {
                wrapcategory.animate({
                    scrollLeft: '+=' + scrollDistance
                }, 350);
            });
            // ประเภท

            var wrapprice = $('.wrapprice');
            $('#price_left').on('click', function() {
                wrapprice.animate({
                    scrollLeft: '-=' + scrollDistance
                }, 350);
            });

            $('#price_right').on('click', function() {
                wrapprice.animate({
                    scrollLeft: '+=' + scrollDistance
                }, 350);
            });
            // ราคา
        });
    </script>
@endsection

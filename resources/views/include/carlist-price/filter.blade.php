<div class="col-12 col-md-4 mb-3">
    <div class="border border-radius" id="box-filter-pc">
        <div class="accordion accordion-flush p-2" id="filter">
            {{-- ราคา st --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="filter_price">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne">
                        <span class="pe-2">
                            ราคา
                        </span>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="filter_price"
                    data-bs-parent="#filter">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-6">ราคาต่ำสุด</div>
                            <div class="col-6">ราคาสูงสุด</div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="number" class="form-control" name="minPrice" placeholder="2,000"
                                    value="">
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control" name="maxPrice" placeholder="150,000"
                                    value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ราคา ed --}}

            {{-- ปี st --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="filter_year">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo">
                        <span class="pe-2">ปีรถ</span>
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="filter_year"
                    data-bs-parent="#filter">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-12">
                                <div id="slider-range" class="my-2"></div>
                            </div>
                            <div class="col-6">
                                <span>
                                    ปีต่ำสุด
                                </span>
                            </div>
                            <div class="col-6">
                                <span>
                                    ปีสูงสุด
                                </span>
                            </div>
                            <div class="col-6">
                                <span id="yearmin" class="border border-radius form-control text-secondary">
                                    1990
                                </span>
                            </div>
                            <div class="col-6">
                                <span id="yearmax" class="border border-radius form-control text-secondary">
                                    2017
                                </span>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            {{-- ปี ed --}}

            {{-- ประเภท st --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="filter_category">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree">
                        <span class="pe-2">
                            ประเภท
                        </span>
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="filter_category"
                    data-bs-parent="#filter">
                    <div class="accordion-body" id="category-box">
                        <div class="row" id="category-content">
                            <div class="col-6 mt-1 d-flex justify-content-center align-items-center icategory">
                                <input type="radio" class="btn-check" name="vachicle_style" id="convertible"
                                    autocomplete="off" value="convertible">
                                <label class="btn border btn-outline-success p-1 shadow-hover" for="convertible"
                                    style="width: 100%">
                                    <img src="{{ asset('assets/imghomeuser/category/convertible.png') }}" alt=""
                                        style="width:40px; height:40px;">
                                    <br>
                                    <span>
                                        Convertible
                                    </span>
                                </label>
                            </div>
                            <div class="col-6 mt-1 d-flex justify-content-center align-items-center icategory">
                                <input type="radio" class="btn-check" name="vachicle_style" id="coupe"
                                    autocomplete="off" value="coupe">
                                <label class="btn border btn-outline-success p-1 shadow-hover" for="coupe"
                                    style="width: 100%">
                                    <img src="{{ asset('assets/imghomeuser/category/coupe.png') }}" alt=""
                                        style="width:40px; height:40px;">
                                    <br>
                                    <span>
                                        Coupe
                                    </span>
                                </label>
                            </div>
                            <div class="col-6 mt-1 d-flex justify-content-center align-items-center icategory">
                                <input type="radio" class="btn-check" name="vachicle_style" id="hatchback"
                                    autocomplete="off" value="hatchback">
                                <label class="btn border btn-outline-success p-1 shadow-hover" for="hatchback"
                                    style="width: 100%">
                                    <img src="{{ asset('assets/imghomeuser/category/hatchback.png') }}" alt=""
                                        style="width:40px; height:40px;">
                                    <br>
                                    <span>
                                        Hatchback
                                    </span>
                                </label>
                            </div>
                            <div class="col-6 mt-1 d-flex justify-content-center align-items-center icategory">
                                <input type="radio" class="btn-check" name="vachicle_style" id="pickup"
                                    autocomplete="off" value="pickup">
                                <label class="btn border btn-outline-success p-1 shadow-hover" for="pickup"
                                    style="width: 100%">
                                    <img src="{{ asset('assets/imghomeuser/category/pickup.png') }}" alt=""
                                        style="width:40px; height:40px;">
                                    <br>
                                    <span>
                                        Pickup
                                    </span>
                                </label>
                            </div>
                            <div class="col-6 mt-1 d-flex justify-content-center align-items-center icategory">
                                <input type="radio" class="btn-check" name="vachicle_style" id="sedan"
                                    autocomplete="off" value="sedan">
                                <label class="btn border btn-outline-success p-1 shadow-hover" for="sedan"
                                    style="width: 100%">
                                    <img src="{{ asset('assets/imghomeuser/category/sedan.png') }}" alt=""
                                        style="width:40px; height:40px;">
                                    <br>
                                    <span>
                                        Sedan
                                    </span>
                                </label>
                            </div>
                            <div class="col-6 mt-1 d-flex justify-content-center align-items-center icategory">
                                <input type="radio" class="btn-check" name="vachicle_style" id="suv"
                                    autocomplete="off" value="suv">
                                <label class="btn border btn-outline-success p-1 shadow-hover" for="suv"
                                    style="width: 100%">
                                    <img src="{{ asset('assets/imghomeuser/category/suv.png') }}" alt=""
                                        style="width:40px; height:40px;">
                                    <br>
                                    <span>
                                        Suv
                                    </span>
                                </label>
                            </div>
                            <div class="col-6 mt-1 d-flex justify-content-center align-items-center icategory">
                                <input type="radio" class="btn-check" name="vachicle_style" id="van"
                                    autocomplete="off" value="minivan">
                                <label class="btn border btn-outline-success p-1 shadow-hover" for="van"
                                    style="width: 100%">
                                    <img src="{{ asset('assets/imghomeuser/category/van.png') }}" alt=""
                                        style="width:40px; height:40px;">
                                    <br>
                                    <span>
                                        Minivan
                                    </span>
                                </label>
                            </div>
                            <div class="col-6 mt-1 d-flex justify-content-center align-items-center icategory">
                                <input type="radio" class="btn-check" name="vachicle_style" id="wagon"
                                    autocomplete="off" value="wagon">
                                <label class="btn border btn-outline-success p-1 shadow-hover" for="wagon"
                                    style="width: 100%">
                                    <img src="{{ asset('assets/imghomeuser/category/wagon.png') }}" alt=""
                                        style="width:40px; height:40px;">
                                    <br>
                                    <span>
                                        Wagon
                                    </span>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- ประเภท ed --}}

            {{-- ยี่ห้อ st --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="filter_make">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFour">
                        <span class="pe-2">
                            ยี่ห้อ
                        </span>
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="filter_make"
                    data-bs-parent="#filter">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-6">
                                @php
                                    $makeVal = DB::table('car_dataset')->select('car_dataset.make')->distinct()->get();
                                @endphp
                                <div class="dropdown">
                                    <button
                                        class="btn dropdown-toggle form-control d-flex justify-content-between align-items-center"
                                        type="button" id="dropmake" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        ยี่ห้อ
                                    </button>
                                    <select class="dropdown-menu" aria-labelledby="dropmake" size="3"
                                        name="make" id="selectmake">
                                        <option selected value="">ยังไม่เลือก</option>
                                        @foreach ($makeVal as $imakeVal)
                                            <option value="{{ $imakeVal->make }}">{{ $imakeVal->make }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="dropdown">
                                    <button
                                        class="btn dropdown-toggle form-control d-flex justify-content-between align-items-center text-truncate"
                                        type="button" id="dropmodel" data-bs-toggle="dropdown"
                                        aria-expanded="false" disabled>
                                        โมเดล
                                    </button>
                                    <select class="dropdown-menu" aria-labelledby="dropmodel" size="3"
                                        name="model" id="selectmodel">
                                        <option selected value="">ยังไม่เลือก</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ยี่ห้อ ed --}}

            {{-- เชื้อเพลิง st --}}
            @php
                $fuel = DB::table('car_dataset')->select('engine_fuel_type')->distinct('engine_fuel_type')->get();
            @endphp
            <div class="accordion-item">
                <h2 class="accordion-header" id="filter_fuel">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFive">
                        <span class="pe-2">
                            เชื้อเพลิง
                        </span>
                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="filter_fuel"
                    data-bs-parent="#filter">
                    <div class="accordion-body">
                        <div class="row">
                            @foreach ($fuel as $key => $ifuel)
                                <div class="col-6 mt-1 d-flex justify-content-center align-items-center icategory"
                                    style="visibility: {{ $ifuel->engine_fuel_type == '' ? 'hidden' : 'unset' }};">
                                    <input type="radio" class="btn-check" name="fuel"
                                        id="fuel{{ $key }}" autocomplete="off"
                                        value="{{ $ifuel->engine_fuel_type }}">
                                    <label class="btn border btn-outline-success p-1 shadow-hover text-truncate"
                                        for="fuel{{ $key }}" style="width:100%">
                                        <img src="{{ asset('assets/imghomeuser/imgfuel/fuel' . $key . '.png') }}"
                                            alt="" style="width:30px; height:30px;">
                                        <br>
                                        <span>
                                            {{ $ifuel->engine_fuel_type }}
                                        </span>
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            {{-- เชื้อเพลิง ed --}}

            {{-- เกียร์ st --}}
            @php
                $transmission = DB::table('car_dataset')->select('transmission_type')->distinct('transmission_type')->get();
            @endphp
            <div class="accordion-item">
                <h2 class="accordion-header" id="filter_tranmission">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseSix">
                        <span class="pe-2">
                            เกียร์
                        </span>
                    </button>
                </h2>
                <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="filter_tranmission"
                    data-bs-parent="#filter">
                    <div class="accordion-body">
                        <div class="row">
                            @foreach ($transmission as $key => $itransmission)
                                <div class="col-6 mt-1 d-flex justify-content-center align-items-center icategory">
                                    <input type="radio" class="btn-check" name="transmission"
                                        id="transmission{{ $key }}" autocomplete="off"
                                        value="{{ $itransmission->transmission_type }}">
                                    <label class="btn border btn-outline-success p-1 shadow-hover text-truncate"
                                        for="transmission{{ $key }}" style="width:100%">
                                        <span>
                                            {{ $itransmission->transmission_type }}
                                        </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- เกียร์ ed --}}

        </div>
    </div>
</div>

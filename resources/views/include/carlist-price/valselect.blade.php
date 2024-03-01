<div class="row">
    <div class="col-4 col-md-2 mt-1" id="search_select" style="display: none;">
        <span class="text-truncate bg-light form-control" style="max-width: 100%; font-size:12px;">
            <i class="fa-solid fa-xmark" style="font-size:12px;" role="button" id="close_search"></i>
            <span id="text_search"></span>
        </span>
    </div>
    <div class="col-4 col-md-2 mt-1" id="price_select" style="">
        <span class="text-truncate bg-light form-control" style="max-width: 100%; font-size:12px;">
            <span id="text_price">
                {{-- {{ dd($minprice, $maxprice) }} --}}
                <span
                    {{ $minprice == '' || $maxprice == '' ? 'hidden' : '' }}>{{ $minprice }}-{{ $maxprice }}</span>
                <span {{ $maxprice == '' ? 'hidden' : '' }}>ต่ำกว่า {{ $maxprice }}</span>
                <span {{ $minprice == '' ? 'hidden' : '' }}>มากกว่า {{ $minprice }}</span>

            </span>
        </span>
    </div>
    <div class="col-4 col-md-2 mt-1" id="year_select">
        <span class="text-truncate bg-light form-control" style="max-width: 100%; font-size:12px;">
            <span id="text_year">
                1990-2017
            </span>
        </span>
    </div>
    <div class="col-4 col-md-2 mt-1" id="category_select" style="display: none;">
        <span class="text-truncate bg-light form-control" style="max-width: 100%; font-size:12px;">
            <i class="fa-solid fa-xmark" style="font-size:12px;" role="button" id="category_close"></i>
            <span id="text_category"></span>
        </span>
    </div>
    <div class="col-4 col-md-2 mt-1" id="make_select" style="display: none;">
        <span class="text-truncate bg-light form-control" style="max-width: 100%; font-size:12px;">
            <i class="fa-solid fa-xmark" style="font-size:12px;" role="button" id="make_close"></i>
            <span id="text_make"></span>
        </span>
    </div>
    <div class="col-4 col-md-2 mt-1" id="model_select" style="display: none;">
        <span class="text-truncate bg-light form-control" style="max-width: 100%; font-size:12px;">
            <i class="fa-solid fa-xmark" style="font-size:12px;" role="button" id="model_close"></i>
            <span id="text_model"></span>
        </span>
    </div>
    <div class="col-4 col-md-2 mt-1" id="fuel_select" style="display: none;">
        <span class="text-truncate bg-light form-control" style="max-width: 100%; font-size:12px;">
            <i class="fa-solid fa-xmark" style="font-size:12px;" role="button" id="fuel_close"></i>
            <span id="text_fuel"></span>
        </span>
    </div>
    <div class="col-4 col-md-2 mt-1" id="transmission_select" style="display: none;">
        <span class="text-truncate bg-light form-control" style="max-width: 100%; font-size:12px;">
            <i class="fa-solid fa-xmark" style="font-size:12px;" role="button" id="transmission_close"></i>
            <span id="text_transmission"></span>
        </span>
    </div>
    <div class="col-4 col-md-2 mt-1" id="sortprice_select" style="display: none;">
        <span class="text-truncate bg-light form-control" style="max-width: 100%; font-size:12px;">
            <i class="fa-solid fa-xmark" style="font-size:12px;" role="button" id="sortprice_close"></i>
            <span id="text_sortprice"></span>
        </span>
    </div>
    <div class="col-4 col-md-2 mt-1" id="sortyear_select" style="display: none;">
        <span class="text-truncate bg-light form-control" style="max-width: 100%; font-size:12px;">
            <i class="fa-solid fa-xmark" style="font-size:12px;" role="button" id="sortyear_close"></i>
            <span id="text_sortyear"></span>
        </span>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12">
        <p class="text-20-bolder mb-0" id="totalcar">
            รายการรถยนต์ทั้งหมด {{ $totalcars }}
        </p>
    </div>
</div>

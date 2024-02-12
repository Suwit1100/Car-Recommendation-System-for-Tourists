<div class="row">
    {{-- header --}}
    <div class="col-12 d-flex">
        <span class="btn border btn-filter" role="button" data-bs-toggle="offcanvas" data-bs-target="#filter_mobile"
            aria-controls="filter_mobile">
            <i class="fa-solid fa-filter"></i>
        </span>
        <div class="input-group">
            <span class="input-group-text bg-white">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" class="form-control form-control-lg" name="searchcar" placeholder="ค้นหาชื่อรถยนต์"
                id="searchcar">
        </div>
    </div>
    <div class="col-2 mt-2 d-flex align-items-center">
        <span class="btn text-truncate form-control border" style="max-width: 100%" id="reset">
            <i class="fa-solid fa-rotate-left"></i>
            เริ่มใหม่
        </span>
    </div>
    <div class="col-8"></div>
    <div class="col-2 mt-2 d-flex justify-content-end align-items-center">
        <div class="dropdown form-control border-0 p-0">
            <span class="btn text-truncate form-control border" role="button" id="sort" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-sort"></i>
                เรียง
            </span>
            <ul class="dropdown-menu" aria-labelledby="sort">
                <li>
                    <a class="dropdown-item sort_price" href="#" data-val-sort="">
                        <i class="fa-solid fa-coins"></i>
                        <i class="fa-solid fa-arrows-left-right"></i>
                        <span>ราคา:เริ่มต้น</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item sort_price" href="#" data-val-sort="ASC">
                        <i class="fa-solid fa-coins"></i>
                        <i class="fa-solid fa-arrow-down-long"></i>
                        <span>ราคา:น้อยไปมาก</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item sort_price" href="#" data-val-sort="DESC">
                        <i class="fa-solid fa-coins"></i>
                        <i class="fa-solid fa-arrow-up-long"></i>
                        <span>ราคา:มากไปน้อย</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item sort_year" href="#" data-val-sort="">
                        <i class="fa-solid fa-calendar-days"></i>
                        <i class="fa-solid fa-arrows-left-right"></i>
                        <span>ปีรถ:เริ่มต้น</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item sort_year" href="#" data-val-sort="ASC">
                        <i class="fa-solid fa-calendar-days"></i>
                        <i class="fa-solid fa-arrow-down-long"></i>
                        <span>ปีรถ:น้อยไปมาก</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item sort_year" href="#" data-val-sort="DESC">
                        <i class="fa-solid fa-calendar-days"></i>
                        <i class="fa-solid fa-arrow-up-long"></i>
                        <span>ปีรถ:มากไปน้อย</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    {{-- header --}}
</div>

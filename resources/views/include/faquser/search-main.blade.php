<div class="col-12">
    <div class="row">
        <div class="col-12 my-1 col-lg-5">
            <form id="form-main" class="input-group flex-nowrap" action="{{ route('faq_view') }}" method="get">
                <span class="input-group-text bg-green text-white" id="addon-wrapping">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" class="form-control" placeholder="ค้าหาข้อความ" aria-label="ค้าหาข้อความที่ส่ง"
                    aria-describedby="addon-wrapping" name="search_main" value="{{ $search_main }}">
                <input type="hidden" name="sort_main" value="{{ $sort_main }}">
            </form>
        </div>
        <div class="col-12 my-1 col-lg-2">
            <span role="button" class="btn btn-green form-control" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                เขียนคำขอช่วยเหลือ
            </span>
        </div>
        <div class="col-12 my-1 col-lg-5 text-end">
            <div class="dropdown">
                <button class="btn border" type="button" id="sort_date" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-sort"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="sort_date">
                    <li>
                        <a class="dropdown-item sort-main {{ $sort_main == '' ? 'faq-bg-sort-active' : '' }}"
                            href="#" data-val-sort = "">
                            <i class="fa-solid fa-clock"></i>
                            เวลาส่ง:ที่เริ่มต้น
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item sort-main {{ $sort_main == 'ASC' ? 'faq-bg-sort-active' : '' }}"
                            href="#" data-val-sort = "ASC">
                            <i class="fa-solid fa-clock"></i>
                            เวลาส่ง:น้อยไปมาก
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item sort-main {{ $sort_main == 'DESC' ? 'faq-bg-sort-active' : '' }}"
                            href="#" data-val-sort = "DESC">
                            <i class="fa-solid fa-clock"></i>
                            เวลาส่ง:มากไปน้อย
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

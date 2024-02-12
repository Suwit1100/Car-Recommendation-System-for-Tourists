<div id="faqmain" class="tab-pane p-2">
    <div class="row">
        <div class="col-5">
            <form action="" method="GET">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="ค้นหาคำขอช่วยเหลือ"
                        aria-label="ค้นหาคำขอช่วยเหลือ" aria-describedby="addon-wrapping" name="faq"
                        value="{{ $titlesearch == 'faq' ? $valuesearch : '' }}">
                    <a class="btn btn-add-announce ms-2 rounded-2" id="open-anounce" data-bs-toggle="modal"
                        data-bs-target="#Modal-add-annouce"><b>+</b>
                        สร้างประกาศ</a>
                </div>
            </form>
        </div>
        <div class="col-7"></div>
        <div class="col-12">
            <table id="example" class="table table-striped" style="max-width:100%">
                <thead>
                    <tr>
                        <th>ชื่อเรื่อง</th>
                        <th>เนื้อหา</th>
                        <th>ส่งถึง</th>
                        <th>เวลาส่ง</th>
                        <th>สถานะ</th>
                        <th>เปิดอ่าน</th>
                        <th>ลบข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faq as $key => $lifaq)
                        <tr>
                            <td>{{ $lifaq->title }}</td>
                            <td>{{ $lifaq->content }}</td>
                            <td>แอดมิน</td>
                            <td>{{ \Carbon\Carbon::parse($lifaq->created_at)->diffForhumans() }}
                            </td>
                            <td>{{ $lifaq->statusAdmin == 'new' ? 'ใหม่' : ($lifaq->statusAdmin == 'send' ? 'ส่งแล้ว' : 'อ่านแล้ว') }}
                            </td>
                            <td class="text-center">
                                <a role="button" class="click-read-letter" data-id-letter="{{ $lifaq->id }}">
                                    <span class="btn btn-light">
                                        <i class="bi bi-book-half"></i>
                                    </span>
                                </a>
                            </td>
                            <td class="text-center">
                                <a role="button" class="click-delete-letter" data-id-letter="{{ $lifaq->id }}">
                                    <span class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-12 table-responsive">
    <table class="table">
        <thead class="table-light">
            <th>ชื่อเรื่อง</th>
            <th>เนื้อหา</th>
            <th>ส่งถึง</th>
            <th>เวลาส่ง</th>
            <th>สถานะ</th>
            <th>เปิดอ่าน</th>
            <th>ลบข้อมูล</th>
        </thead>
        @foreach ($faqnew as $ifaqnew)
            <tbody>
                <td class="text-truncate">
                    <p class="text-truncate" style="width:15rem;">
                        {{ $ifaqnew->title }}
                    </p>
                </td>
                <td class="text-truncate">
                    <p class="text-truncate" style="width:25rem;">
                        <strong>
                            {{ $ifaqnew->reply_by == Auth::user()->id ? '{คุณ}' : '{แอดมิน}' }}
                        </strong>
                        {{ $ifaqnew->replyContent }}
                    </p>
                </td>
                <td class="text-truncate">
                    ถึงแอดมิน
                </td>
                <td class="text-truncate">
                    {{ $ifaqnew->reply_create != null ? $ifaqnew->reply_create : $ifaqnew->created_at }}
                </td>
                <td class="text-truncate">
                    {{ $ifaqnew->statusUser == 'read' ? 'อ่านแล้ว' : ($ifaqnew->statusUser == 'new' ? 'ข้อความใหม่' : 'ส่งแล้ว') }}
                </td>
                <td class="text-center">
                    <a role="button" class="click-read-letter" data-id-letter="{{ $ifaqnew->id }}">
                        <span class="btn btn-green">
                            <i class="fa-brands fa-readme"></i>
                        </span>
                    </a>
                </td>
                <td class="text-center">
                    <a role="button" class="click-delete-letter" data-id-letter="{{ $ifaqnew->id }}">
                        <span class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </span>
                    </a>
                </td>
            </tbody>
        @endforeach

    </table>
</div>
<div>
    {{ $faqnew->links() }}
</div>

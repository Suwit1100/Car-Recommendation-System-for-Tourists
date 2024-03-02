@extends('layout.homeadmin')
@section('style')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            รายงานคอมเม้น
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ผู้รายงาน</th>
                        <th scope="col">ตรวจสอบ</th>
                        <th scope="col">เวลา</th>
                        <th scope="col">ยกเลิก</th>
                        <th scope="col">ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('script')
@endsection

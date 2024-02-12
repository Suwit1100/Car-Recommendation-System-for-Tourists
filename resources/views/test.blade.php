@extends('layout.homeuser')
@section('content')
    {{-- modal bt5 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- modal bt5 --}}
    <style>
        .magin-25 {
            margin-top: 25%;
        }

        .box-lable {
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            cursor: pointer;

        }

        .box-lable>i {
            font: 15px;
            background-color: #357266;
            border-radius: 100%;
            color: white;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            transition: 0.5s;
            opacity: 0;
        }

        .box-img>img {
            width: 100px;
            height: 100px;
        }

        .box-text>h6 {
            color: #000000;
            font-weight: 400;
        }


        .box-text {
            height: 60px;
            box-sizing: border-box;
        }

        .btn-check:checked+.box-lable {
            border: 2px solid #357266;
            /* white-space: nowrap;ตัวหนังสือไม่ขึ้นบรรทัดใหม่ */
        }

        .btn-check:checked+.box-lable i {
            transition: 0.5s;
            opacity: 1;
        }

        .btn-next-pre {
            background-color: #357266;
            color: white;
            width: 120px;
            height: 40px;
            /* position: absolute;
                                                                                                                    bottom: 10%; */
        }

        .btn-next-pre:hover {
            background-color: #10231f;
            color: white;
            width: 120px;
            height: 40px;
        }

        /* .qt-sex, */
        .qt-old,
        .qt-education,
        .qt-career,
        .qt-income,
        .qt-status,
        .qt-freetime,
        .qt-lifestyle,
        .qt-carnow,
        .qt-ownercar,
        .qt-planrent,
        .qt-factorrent,
        .qt-factordrive,
        .qt-travellevel,
        .qt-travelwith,
        .qt-typeattraction,
        .qt-attraction,
        .qt-factor-attraction {
            display: none;
            opacity: 0;
            transition: 0.5;
        }

        /* result */
        .img-result>img {
            height: 450px;
            width: 100%;

        }

        .text-result>.title {
            font-weight: bolder;
            font-size: 100px;
            text-align: center;
            color: #357266
        }

        .text-result>.details {
            font-size: 18px
        }

        .box-feture {
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
        }

        .imgfeture>img {
            height: 150px;
            width: 70%;
        }

        .result-suv,
        .result-sedan,
        .result-coupe,
        .result-convertible,
        .result-wagon,
        .result-hatchback,
        .result-van,
        .result-pickup {
            display: none;
        }

        /* result */

        /* loading */
        .loader {
            color: #357266;
            position: relative;
            font-size: 11px;
            background: #357266;
            animation: escaleY 1s infinite ease-in-out;
            width: 1em;
            height: 4em;
            animation-delay: -0.16s;
        }

        .loader:before,
        .loader:after {
            content: '';
            position: absolute;
            top: 0;
            left: 2em;
            background: #357266;
            width: 1em;
            height: 4em;
            animation: escaleY 1s infinite ease-in-out;
        }

        .loader:before {
            left: -2em;
            animation-delay: -0.32s;
        }

        @keyframes escaleY {

            0%,
            80%,
            100% {
                box-shadow: 0 0;
                height: 4em;
            }

            40% {
                box-shadow: 0 -2em;
                height: 5em;
            }
        }

        .divloader {
            display: none;
        }

        /* loading */

        /* modal */
        .modal-position-c {
            position: absolute;
            top: 30%;
        }

        .star {
            font-size: 30px;
            margin-left: 5px;
            margin-right: 5px;
            cursor: pointer;
        }

        .star:hover {
            color: #8d7801;
        }

        .star-input:checked+label .star-check {
            color: #FFD700;
        }


    </style>


    <div class="container">
        {{-- qt 1 --}}
        <div class="qt-sex">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">โปรดเลือกเพศของคุณ 1/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="sex" id="male" autocomplete="off" value="male">
                    <label class="box-lable" for="male">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/man.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ชาย</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="sex" id="female" autocomplete="off" value="female">
                    <label class="box-lable" for="female">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/girl.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">หญิง</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="sex" id="lgbt" autocomplete="off" value="lgbt">
                    <label class="box-lable" for="lgbt">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/lgbt.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">เพศทางเลือก</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="sex" id="not-like" autocomplete="off" value="no">
                    <label class="box-lable" for="not-like">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/not-like.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ไม่ต้องการระบุ</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            {{-- ก่อนหน้า ถัดไป --}}
            <div class="row mt-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="test-btn-log">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-old" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>


        </div>
        {{-- qt 2 --}}
        <div class="qt-old">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">โปรดเลือกช่วงอายุของคุณ 2/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="old" id="old20_24" autocomplete="off" value="20-24">
                    <label class="box-lable" for="old20_24">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/old20-24.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">20-24</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="old" id="old25_34" autocomplete="off"
                        value="25-34">
                    <label class="box-lable" for="old25_34">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/old25-34.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">25-34</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="old" id="old35_44" autocomplete="off"
                        value="35-44">
                    <label class="box-lable" for="old35_44">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/old35-44.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">35-44</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="old" id="old45_54" autocomplete="off"
                        value="45-54">
                    <label class="box-lable" for="old45_54">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/old45-54.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">45-54</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="old" id="old55_64" autocomplete="off"
                        value="55-64">
                    <label class="box-lable" for="old55_64">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/old55-64.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">55-64</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="old" id="old65" autocomplete="off"
                        value="over65">
                    <label class="box-lable" for="old65">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/oldmax65.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">65 ปีขึ้นไป</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-sex">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-education" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 3 --}}
        <div class="qt-education">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">โปรดเลือกระดับการศึกษาของคุณ 3/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="education" id="primary_education" autocomplete="off"
                        value="primaryeducation">
                    <label class="box-lable" for="primary_education">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/primaryeducation.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ประถมศึกษา</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="education" id="junior_high_school" autocomplete="off"
                        value="juniorhighschool">
                    <label class="box-lable" for="junior_high_school">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/juniorhighschool.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">มัธยมศึกษาตอนต้น</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="education" id="high_school" autocomplete="off"
                        value="highschool">
                    <label class="box-lable" for="high_school">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/highschool.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">มัธยมศึกษาตอนปลาย</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="education" id="associate_degree" autocomplete="off"
                        value="vocationalcertificate">
                    <label class="box-lable" for="associate_degree">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/vocationalcertificate.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">อนุปริญญา/ปวช</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="education" id="bachelor_degree" autocomplete="off"
                        value="bachelordegree">
                    <label class="box-lable" for="bachelor_degree">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/bachelordegree.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ปริญาตรี</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="education" id="master_degree" autocomplete="off"
                        value="masterdegree">
                    <label class="box-lable" for="master_degree">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/masterdegree.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ปริญาโท</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="education" id="doctoral_degree" autocomplete="off"
                        value="doctoraldegree">
                    <label class="box-lable" for="doctoral_degree">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/doctoraldegree.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ปริญาเอก</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-old">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-career" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 4 --}}
        <div class="qt-career">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">โปรดเลือกอาชีพของคุณ 4/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="career" id="student" autocomplete="off"
                        value="student">
                    <label class="box-lable" for="student">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/student.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">นักศึกษา</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="career" id="government_officer" autocomplete="off"
                        value="teacher">
                    <label class="box-lable" for="government_officer">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/teacher.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ข้าราชการ/รัฐวิสาหกิจ</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="career" id="company_employee" autocomplete="off"
                        value="employee">
                    <label class="box-lable" for="company_employee">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/employee.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">พนักงานบริษัท</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="career" id="personal_business" autocomplete="off"
                        value="ceo">
                    <label class="box-lable" for="personal_business">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ceo.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ธุรกิจส่วนตัว/ผู้ประกอบการ</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="career" id="tradesman" autocomplete="off"
                        value="tradesman">
                    <label class="box-lable" for="tradesman">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/tradesman.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ช่าง/ฝีมืออาชีพ</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="career" id="it" autocomplete="off"
                        value="it">
                    <label class="box-lable" for="it">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/it.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">งานด้านเทคโนโลยีสารสนเทศ/ไอที</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="career" id="freelance" autocomplete="off"
                        value="freelance">
                    <label class="box-lable" for="freelance">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/freelance.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ฟรีแลนซ์</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="career" id="no-career" autocomplete="off"
                        value="no">
                    <label class="box-lable" for="no-career">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/careerno.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ไม่ได้ประกอบอาชีพในขณะนี้</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-education">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-income" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 5 --}}
        <div class="qt-income">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">โปรดเลือกรายได้ของคุณ 5/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="income" id="income10000" autocomplete="off"
                        value="less10000">
                    <label class="box-lable" for="income10000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/icmin10000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">น้อยกว่า 10,000 บาทต่อเดือน</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="income" id="income10000-20000" autocomplete="off"
                        value="10000-20000">
                    <label class="box-lable" for="income10000-20000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ic10000-20000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">10,000 - 20,000 บาทต่อเดือน</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="income" id="income20001-30000" autocomplete="off"
                        value="20001-30000">
                    <label class="box-lable" for="income20001-30000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ic20001-30000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">20,001 - 30,000 บาทต่อเดือน</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="income" id="income30001-40000" autocomplete="off"
                        value="30001-40000">
                    <label class="box-lable" for="income30001-40000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ic30001-40000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">30,001 - 40,000 บาทต่อเดือน</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="income" id="income40001-50000" autocomplete="off"
                        value="40001-50000">
                    <label class="box-lable" for="income40001-50000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ic40001-50000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">40,001 - 50,000 บาทต่อเดือน</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="income" id="income50001-100000" autocomplete="off"
                        value="50000-100000">
                    <label class="box-lable" for="income50001-100000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ic50001-100000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">50,001 - 100,000 บาทต่อเดือน</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="income" id="income100000" autocomplete="off"
                        value="over100000">
                    <label class="box-lable" for="income100000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/icmax100000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">มากกว่า 100,000 บาทต่อเดือน</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="income" id="no-income" autocomplete="off"
                        value="no">
                    <label class="box-lable" for="no-income">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/icno.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ยังไม่มีรายได้</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-career">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-status" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 6 --}}
        <div class="qt-status">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">โปรดเลือกสถานะของคุณ 6/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="status" id="status_singer" autocomplete="off"
                        value="single">
                    <label class="box-lable" for="status_singer">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/st-single.jpg') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">โสด</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="status" id="status_couple" autocomplete="off"
                        value="couple">
                    <label class="box-lable" for="status_couple">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/st-couple.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">มีคู่</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="status" id="status_married" autocomplete="off"
                        value="married">
                    <label class="box-lable" for="status_married">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/st-married.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">แต่งงานแล้ว</h6>
                        </div>
                    </label>
                </div>

                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="status" id="status_widowed" autocomplete="off"
                        value="widowed">
                    <label class="box-lable" for="status_widowed">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/st-widowed.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">หม้าย</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="status" id="status_divorce" autocomplete="off"
                        value="divorce">
                    <label class="box-lable" for="status_divorce">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/st-divorce.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">หย่าร้าง</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="status" id="status_no" autocomplete="off"
                        value="no">
                    <label class="box-lable" for="status_no">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/st-no.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ไม่ต้องการระบุ</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-income">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-freetime" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 7 --}}
        <div class="qt-freetime">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">กิจกรรมที่คุณมักจะทำเวลาว่าง 7/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="freetime" id="freetime_health" autocomplete="off"
                        value="health">
                    <label class="box-lable" for="freetime_health">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/at-health.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">กิจกรรมที่เกี่ยวกับสุขภาพ</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="freetime" id="freetime_learn" autocomplete="off"
                        value="learn">
                    <label class="box-lable" for="freetime_learn">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/at-learn.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">กิจกรรมที่เกี่ยวกับการเรียนรู้และพัฒนาตนเอง</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="freetime" id="freetime_relax" autocomplete="off"
                        value="relax">
                    <label class="box-lable" for="freetime_relax">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/at-relax.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">กิจกรรมที่เกี่ยวกับความผ่อนคลาย</h6>
                        </div>
                    </label>
                </div>

                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="freetime" id="freetime_enjoy" autocomplete="off"
                        value="enjoy">
                    <label class="box-lable" for="freetime_enjoy">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/at-enjoy.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">กิจกรรมที่เกี่ยวการเพลิดเพลิน</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="freetime" id="freetime_survey" autocomplete="off"
                        value="exploration">
                    <label class="box-lable" for="freetime_survey">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/at-exploration.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">กิจกรรมที่เกี่ยวข้องกับการสำรวจ</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-status">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-lifestyle" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 8 --}}
        <div class="qt-lifestyle">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">เลือก Life Style ของคุณ 8/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="lifestyle" id="lifestyle_peaceful" autocomplete="off"
                        value="peaceful">
                    <label class="box-lable" for="lifestyle_peaceful">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ls-peaceful.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Peaceful lifestyle</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="lifestyle" id="lifestyle_career" autocomplete="off"
                        value="career">
                    <label class="box-lable" for="lifestyle_career">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ls-career.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Career-focused lifestyle</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="lifestyle" id="lifestyle_active" autocomplete="off"
                        value="active">
                    <label class="box-lable" for="lifestyle_active">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ls-active.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Active lifestyle</h6>
                        </div>
                    </label>
                </div>

                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="lifestyle" id="lifestyle_chill" autocomplete="off"
                        value="chill">
                    <label class="box-lable" for="lifestyle_chill">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ls-chill.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Chill lifestyle</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="lifestyle" id="lifestyle_travel" autocomplete="off"
                        value="travel">
                    <label class="box-lable" for="lifestyle_travel">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ls-travel.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Travel lifestyle</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="lifestyle" id="lifestyle_healthy" autocomplete="off"
                        value="healthy">
                    <label class="box-lable" for="lifestyle_healthy">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ls-excercise.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Healthy lifestyle</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-freetime">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-carnow" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 9 --}}
        <div class="qt-carnow">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">ปัจจุบันคุณใช้งานรถประเภทใดอยู่ 9/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="carnow" id="carnow_coupe" autocomplete="off"
                        value="coupe">
                    <label class="box-lable" for="carnow_coupe">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/rs-coupe.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Coupe</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="carnow" id="carnow_convertible" autocomplete="off"
                        value="convertible">
                    <label class="box-lable" for="carnow_convertible">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/rs-convertible.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Convertible</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="carnow" id="carnow_sedan" autocomplete="off"
                        value="sedan">
                    <label class="box-lable" for="carnow_sedan">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/rs-sedan.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Sedan</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="carnow" id="carnow_pickup" autocomplete="off"
                        value="pickup">
                    <label class="box-lable" for="carnow_pickup">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/rs-pickup.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Pickup</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="carnow" id="carnow_hatchback" autocomplete="off"
                        value="hatchback">
                    <label class="box-lable" for="carnow_hatchback">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/rs-hatchback.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Hatchback</h6>
                        </div>
                    </label>
                </div>

                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="carnow" id="carnow_wagon" autocomplete="off"
                        value="wagon">
                    <label class="box-lable" for="carnow_wagon">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/rs-wagon.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Wagon</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="carnow" id="carnow_suv" autocomplete="off"
                        value="suv">
                    <label class="box-lable" for="carnow_suv">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/rs-suv.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">SUV</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="carnow" id="carnow_minivan" autocomplete="off"
                        value="minivan">
                    <label class="box-lable" for="carnow_minivan">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/rs-van.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">Minivan</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="carnow" id="carnow_no" autocomplete="off"
                        value="no">
                    <label class="box-lable" for="carnow_no">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/carnow_no.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ไม่มีรถยนต์</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-lifestyle">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-ownercar" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 10 --}}
        <div class="qt-ownercar">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">ระยะเวลาในการเป็นเจ้าของรถยนต์ 10/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="ownercar" id="ownercar_1" autocomplete="off"
                        value="less1">
                    <label class="box-lable" for="ownercar_1">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/own_min1.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">น้อยกว่า 1 ปี</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="ownercar" id="ownercar_1-3" autocomplete="off"
                        value="1-3">
                    <label class="box-lable" for="ownercar_1-3">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/own_1-3.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">1-3 ปี</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="ownercar" id="ownercar_4-6" autocomplete="off"
                        value="4-6">
                    <label class="box-lable" for="ownercar_4-6">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/own_4-6.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">4-6 ปี</h6>
                        </div>
                    </label>
                </div>

                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="ownercar" id="ownercar_7-10" autocomplete="off"
                        value="7-10">
                    <label class="box-lable" for="ownercar_7-10">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/own_7-10.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">7-10 ปี</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="ownercar" id="ownercar_no" autocomplete="off"
                        value="no">
                    <label class="box-lable" for="ownercar_no">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/own_no.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ยังไม่มีรถยนต์</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-carnow">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-planrent" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 11 --}}
        <div class="qt-planrent">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">หากคุณมีแผนที่จะเช่ารถยนต์สำหรับการเดินทางท่องเที่ยว
                        คุณจะกำหนดงบประมาณในการเช่ารถยนต์เท่าไหร่ต่อวัน 11/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="planrent" id="planrent_1000" autocomplete="off"
                        value="less1000">
                    <label class="box-lable" for="planrent_1000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/pr_min1000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">น้อยกว่า 1,000 บาท</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="planrent" id="planrent_1000-2000"
                        autocomplete="off" value="1000-2000">
                    <label class="box-lable" for="planrent_1000-2000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/pr_1000-2000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">1,000 - 2,000 บาท</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="planrent" id="planrent_2001-3000"
                        autocomplete="off" value="2001-3000">
                    <label class="box-lable" for="planrent_2001-3000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/pr_2001-3000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">2,001 - 3,000 บาท</h6>
                        </div>
                    </label>
                </div>

                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="planrent" id="planrent_3001-4000"
                        autocomplete="off" value="3001-4000">
                    <label class="box-lable" for="planrent_3001-4000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/pr_3001-4000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">3,001 - 4,000 บาท</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="planrent" id="planrent_4001-5000"
                        autocomplete="off" value="4001-5000">
                    <label class="box-lable" for="planrent_4001-5000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/pr_4001-5000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">4,001 - 5,000 บาท</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="planrent" id="planrent_5000" autocomplete="off"
                        value="over5000">
                    <label class="box-lable" for="planrent_5000">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/pr_max5000.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">มากกว่า 5,000 บาท</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-ownercar">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-factorrent" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 12 --}}
        <div class="qt-factorrent">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">คุณให้ความสำคัญกับปัจจัยใดเมื่อเลือกเช่ารถยนต์ 12/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factorrent" id="factorrent_lowprice"
                        autocomplete="off" value="goodvalue">
                    <label class="box-lable" for="factorrent_lowprice">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fr_goodvalue.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ราคาที่คุ้มค่า</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factorrent" id="factorrent_carquality"
                        autocomplete="off" value="auqlity">
                    <label class="box-lable" for="factorrent_carquality">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fr_quality.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">คุณภาพของรถยนต์</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factorrent" id="factorrent_typescars"
                        autocomplete="off" value="category">
                    <label class="box-lable" for="factorrent_typescars">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fr_category.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ประเภทของรถยนต์</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factorrent" id="factorrent_carfacilities"
                        autocomplete="off" value="amenities">
                    <label class="box-lable" for="factorrent_carfacilities">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fr_facilities.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">สิ่งอำนวยความสะดวกในรถยนต์</h6>
                        </div>
                    </label>
                </div>

                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factorrent" id="factorrent_customerservice"
                        autocomplete="off" value="service">
                    <label class="box-lable" for="factorrent_customerservice">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fr_service.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">การบริการลูกค้า</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factorrent" id="factorrent_promotions"
                        autocomplete="off" value="discount">
                    <label class="box-lable" for="factorrent_promotions">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fr_discount.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ส่วนลดและโปรโมชั่น</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factorrent" id="factorrent_reliability"
                        autocomplete="off" value="reliability">
                    <label class="box-lable" for="factorrent_reliability">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fr_reliability.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ความน่าเชื่อถือในบริษัทเช่ารถ</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factorrent" id="factorrent_convenient"
                        autocomplete="off" value="location">
                    <label class="box-lable" for="factorrent_convenient">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fr_return.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">สถานที่รับและคืนรถที่สะดวก</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-planrent">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-factordrive" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 13 --}}
        <div class="qt-factordrive">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">คุณให้ความสำคัญกับสิ่งใดเมื่อขับขี่รถยนต์ 13/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factordrive" id="factordrive_comfortseat"
                        autocomplete="off" value="seat">
                    <label class="box-lable" for="factordrive_comfortseat">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fd_seat.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ความสบายในที่นั่งขณะขับขี่</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factordrive" id="factordrive_carstorage"
                        autocomplete="off" value="bag">
                    <label class="box-lable" for="factordrive_carstorage">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fd_bag.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ความสะดวกในการจัดเก็บของที่ต้องพาในรถยนต์</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factordrive" id="factordrive_connecting"
                        autocomplete="off" value="connecting">
                    <label class="box-lable" for="factordrive_connecting">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fd_usb.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ความสะดวกในการเชื่อมต่ออุปกรณ์เสริม</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factordrive" id="factordrive_safety"
                        autocomplete="off" value="safety">
                    <label class="box-lable" for="factordrive_safety">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fd_safety.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ความปลอดภัยในการขับขี่</h6>
                        </div>
                    </label>
                </div>

                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factordrive" id="factordrive_fueleconomy"
                        autocomplete="off" value="fuel">
                    <label class="box-lable" for="factordrive_fueleconomy">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fd_fuel.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ความประหยัดเชื้อเพลิง</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factordrive" id="factordrive_speed"
                        autocomplete="off" value="speed">
                    <label class="box-lable" for="factordrive_speed">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fd_speed.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ความเร็วและประสิทธิภาพของรถยนต์</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factordrive" id="factordrive_design"
                        autocomplete="off" value="design">
                    <label class="box-lable" for="factordrive_design">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fd_design.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ความสวยงามและดีไซน์ของรถยนต์</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="factordrive" id="factordrive_lifestyle"
                        autocomplete="off" value="lifestyle">
                    <label class="box-lable" for="factordrive_lifestyle">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/fd_lifestyle.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ความเหมาะสมในการใช้งานตามสไตล์ชีวิตของคุณ</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-factorrent">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-travellevel" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 14 --}}
        <div class="qt-travellevel">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">กรุณาเลือกประสบการณ์การเดินทางของคุณ 14/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="travellevel" id="travellevel_no"
                        autocomplete="off" value="level0">
                    <label class="box-lable" for="travellevel_no">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/t_lv0.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ไม่เคยเดินทางมาก่อน</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="travellevel" id="travellevel_lv1"
                        autocomplete="off" value="level1">
                    <label class="box-lable" for="travellevel_lv1">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/t_lv1.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">เคยเดินทางเล็กน้อยและเข้าร่วมกิจกรรมท่องเที่ยวเบาๆ</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="travellevel" id="travellevel_lv2"
                        autocomplete="off" value="level2">
                    <label class="box-lable" for="travellevel_lv2">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/t_lv2.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">เคยเดินทางบ่อยๆ และมีประสบการณ์ในการเข้าร่วมกิจกรรมท่องเที่ยวต่างๆ
                            </h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="travellevel" id="travellevel_lv3"
                        autocomplete="off" value="level3">
                    <label class="box-lable" for="travellevel_lv3">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/t_lv3.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">เป็นนักเดินทางที่ชำนาญและมีประสบการณ์มากในการเดินทาง</h6>
                        </div>
                    </label>
                </div>

                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-factordrive">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-travelwith" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 15 --}}
        <div class="qt-travelwith">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">คุณมักจะเดินทางไปเที่ยวกับใคร 15/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="travelwith" id="travelwith_family"
                        autocomplete="off" value="family">
                    <label class="box-lable" for="travelwith_family">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/tw_family.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ครอบครัว</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="travelwith" id="travelwith_closefriend"
                        autocomplete="off" value="closefriend">
                    <label class="box-lable" for="travelwith_closefriend">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/tw_friend.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">เพื่อนสนิท</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="travelwith" id="travelwith_lover"
                        autocomplete="off" value="lover">
                    <label class="box-lable" for="travelwith_lover">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/tw_love.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">คู่รัก</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="travelwith" id="travelwith_team"
                        autocomplete="off" value="team">
                    <label class="box-lable" for="travelwith_team">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/tw_team.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">กลุ่มเพื่อนหรือทีมงาน</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="travelwith" id="travelwith_alone"
                        autocomplete="off" value="alone">
                    <label class="box-lable" for="travelwith_alone">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/tw_alone.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">เดินทางคนเดียว</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-travellevel">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-typeattraction" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 16 --}}
        <div class="qt-typeattraction">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">คุณชอบสถานที่ท่องเที่ยวประเภทใด 16/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="typeattraction" id="typeattraction_human"
                        autocomplete="off" value="human">
                    <label class="box-lable" for="typeattraction_human">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/type_human.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">สถานที่ท่องเที่ยวที่มนุษย์สร้างขึ้น</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="typeattraction" id="typeattraction_nature"
                        autocomplete="off" value="nature">
                    <label class="box-lable" for="typeattraction_nature">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/type_nature.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">สถานที่ท่องเที่ยวที่เกิดขึ้นเองตามธรรมชาติ</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-travelwith">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-attraction" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 17 --}}
        <div class="qt-attraction">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">คุณชอบเดินทางไปเที่ยวในพื้นที่แบบใด 17/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="attraction" id="attraction_beach"
                        autocomplete="off" value="beach and sea">
                    <label class="box-lable" for="attraction_beach">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/at_sea.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ชายหาดและทะเล</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="attraction" id="attraction_mountain"
                        autocomplete="off" value="mountain">
                    <label class="box-lable" for="attraction_mountain">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/at_mountain.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ภูเขา</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="attraction" id="attraction_waterfall"
                        autocomplete="off" value="waterfall">
                    <label class="box-lable" for="attraction_waterfall">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/at_waterfall.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">น้ำตก</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="attraction" id="attraction_ancientcity"
                        autocomplete="off" value="ancientcity">
                    <label class="box-lable" for="attraction_ancientcity">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/at_ancientcity.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">เมืองโบราณและวัฒนธรรมท้องถิ่น</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="attraction" id="attraction_mall"
                        autocomplete="off" value="mall">
                    <label class="box-lable" for="attraction_mall">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/at_mall.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ห้างสรรพสินค้า</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="attraction" id="attraction_fleamarket"
                        autocomplete="off" value="fleamarket">
                    <label class="box-lable" for="attraction_fleamarket">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/at_market.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ตลาดนัด</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-typeattraction">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-ftattraction" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>
        {{-- qt 18 --}}
        <div class="qt-factor-attraction">
            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-center">สิ่งใดที่เป็นปัจจัยสำคัญที่ส่งผลให้คุณเลือกเดินทางไปในสถานที่นั้น 18/18</h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="ft-attraction" id="ft-attraction_culture"
                        autocomplete="off" value="culture">
                    <label class="box-lable" for="ft-attraction_culture">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ft_culture.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">วัฒนธรรมและประวัติศาสตร์ที่น่าสนใจ</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="ft-attraction" id="ft-attraction_privacy"
                        autocomplete="off" value="privacy">
                    <label class="box-lable" for="ft-attraction_privacy">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ft_privacy.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ความเป็นส่วนตัวและเงียบสงบ</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="ft-attraction" id="ft-attraction_nature"
                        autocomplete="off" value="natur">
                    <label class="box-lable" for="ft-attraction_nature">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ft_nature.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">ธรรมชาติที่หลากหลายและสวยงาม</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="ft-attraction" id="ft-attraction_adventure"
                        autocomplete="off" value="adventure">
                    <label class="box-lable" for="ft-attraction_adventure">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ft_explore.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">การผจญภัยและสำรวจ</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="ft-attraction" id="ft-attraction_food"
                        autocomplete="off" value="food">
                    <label class="box-lable" for="ft-attraction_food">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ft_food.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">อาหารและของที่กินที่อร่อยและน่าลิ้มลอง</h6>
                        </div>
                    </label>
                </div>
                <div class="col-2">
                    <input type="radio" class="btn-check" name="ft-attraction" id="ft-attraction_activity"
                        autocomplete="off" value="activity">
                    <label class="box-lable" for="ft-attraction_activity">
                        <i class="bi bi-check px-1 mt-1"></i>
                        <div class="box-img text-center mt-2">
                            <img src="{{ asset('assets/imgrec/ft_activity.png') }}">
                        </div>
                        <div class="box-text">
                            <h6 class="text-center">มีกิจกรรมที่สนุกและน่าสนใจ</h6>
                        </div>
                    </label>
                </div>
                <div class="col"></div>
            </div>
            <div class="row my-5 pt-3">
                <div class="col"></div>
                <div class="col-5 ">
                    <button class="btn btn-next-pre" id="btn-pre-attraction">
                        <i class="bi bi-arrow-left"></i>
                        ก่อนหน้า
                    </button>
                </div>
                <div class="col-5 d-flex justify-content-end">
                    <button class="btn btn-next-pre" id="btn-next-submit" disabled>
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
                <div class="col"></div>
            </div>
        </div>

        <div class="divloader">
            <div class="row magin-25">
                <div class="col-12">
                    <span class="loader"></span>
                </div>
            </div>
        </div>

        <div class="result-suv">
            <div class="row">
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <div class="text-result">
                        <p class="title">SUV</p>
                        <span class="details">
                            รถ SUV มีความสามารถในการเดินทางทั้งในเมืองและในสภาพถนนที่รุนแรงด้วยความสูงของรถที่สูงขึ้น
                            ซึ่งช่วยให้ผู้โดยสารมีมองเห็นไกลและมีความควบคุมที่ดี นอกจากนี้ รถ SUV
                            ยังมีพื้นที่ภายในกว้างขวางที่สามารถรับผู้โดยสารและของขวัญได้มาก
                            ทำให้เป็นเลือกที่สมบูรณ์สำหรับครอบครัวและการเดินทางไกลในความสบายความรวดเร็วและความสบายใจ.
                        </span>
                    </div>
                </div>
                <div class="col-6 ">
                    <div class="img-result">
                        <img src="{{ asset('/assets/imgrec/rs-suv.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_hp.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagehpsuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_mpg.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG city{{ $averagecitysuv }}/mpg{{ $averagehysuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_price.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagepricesuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <button class="btn btn-next-pre" data-bs-toggle="modal" data-bs-target="#myModal">
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="result-sedan">
            <div class="row">
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <div class="text-result">
                        <p class="title">Sedan</p>
                        <span class="details">
                            รถ Sedan มีความสามารถในการเดินทางทั้งในเมืองและในสภาพถนนที่รุนแรงด้วยความสูงของรถที่สูงขึ้น
                            ซึ่งช่วยให้ผู้โดยสารมีมองเห็นไกลและมีความควบคุมที่ดี นอกจากนี้ รถ Sedan
                            ยังมีพื้นที่ภายในกว้างขวางที่สามารถรับผู้โดยสารและของขวัญได้มาก
                            ทำให้เป็นเลือกที่สมบูรณ์สำหรับครอบครัวและการเดินทางไกลในความสบายความรวดเร็วและความสบายใจ.
                        </span>
                    </div>
                </div>
                <div class="col-6 ">
                    <div class="img-result">
                        <img src="{{ asset('/assets/imgrec/rs-sedan.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_hp.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagehpsuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_mpg.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG city{{ $averagecitysuv }}/mpg{{ $averagehysuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_price.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagepricesuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <button class="btn btn-next-pre" data-bs-toggle="modal" data-bs-target="#myModal">
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="result-coupe">
            <div class="row">
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <div class="text-result">
                        <p class="title">Coupe</p>
                        <span class="details">
                            รถ Coupe มีความสามารถในการเดินทางทั้งในเมืองและในสภาพถนนที่รุนแรงด้วยความสูงของรถที่สูงขึ้น
                            ซึ่งช่วยให้ผู้โดยสารมีมองเห็นไกลและมีความควบคุมที่ดี นอกจากนี้ รถ Coupe
                            ยังมีพื้นที่ภายในกว้างขวางที่สามารถรับผู้โดยสารและของขวัญได้มาก
                            ทำให้เป็นเลือกที่สมบูรณ์สำหรับครอบครัวและการเดินทางไกลในความสบายความรวดเร็วและความสบายใจ.
                        </span>
                    </div>
                </div>
                <div class="col-6 ">
                    <div class="img-result">
                        <img src="{{ asset('/assets/imgrec/rs-coupe.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_hp.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagehpsuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_mpg.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG city{{ $averagecitysuv }}/mpg{{ $averagehysuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_price.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagepricesuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <button class="btn btn-next-pre" data-bs-toggle="modal" data-bs-target="#myModal">
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="result-convertible">
            <div class="row">
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <div class="text-result">
                        <p class="title">Convertible</p>
                        <span class="details">
                            รถ Convertible
                            มีความสามารถในการเดินทางทั้งในเมืองและในสภาพถนนที่รุนแรงด้วยความสูงของรถที่สูงขึ้น
                            ซึ่งช่วยให้ผู้โดยสารมีมองเห็นไกลและมีความควบคุมที่ดี นอกจากนี้ รถ Convertible
                            ยังมีพื้นที่ภายในกว้างขวางที่สามารถรับผู้โดยสารและของขวัญได้มาก
                            ทำให้เป็นเลือกที่สมบูรณ์สำหรับครอบครัวและการเดินทางไกลในความสบายความรวดเร็วและความสบายใจ.
                        </span>
                    </div>
                </div>
                <div class="col-6 ">
                    <div class="img-result">
                        <img src="{{ asset('/assets/imgrec/rs-convertible.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_hp.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagehpsuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_mpg.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG city{{ $averagecitysuv }}/mpg{{ $averagehysuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_price.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagepricesuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <button class="btn btn-next-pre" data-bs-toggle="modal" data-bs-target="#myModal">
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="result-wagon">
            <div class="row">
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <div class="text-result">
                        <p class="title">Wagon</p>
                        <span class="details">
                            รถ Wagon มีความสามารถในการเดินทางทั้งในเมืองและในสภาพถนนที่รุนแรงด้วยความสูงของรถที่สูงขึ้น
                            ซึ่งช่วยให้ผู้โดยสารมีมองเห็นไกลและมีความควบคุมที่ดี นอกจากนี้ รถ Wagon
                            ยังมีพื้นที่ภายในกว้างขวางที่สามารถรับผู้โดยสารและของขวัญได้มาก
                            ทำให้เป็นเลือกที่สมบูรณ์สำหรับครอบครัวและการเดินทางไกลในความสบายความรวดเร็วและความสบายใจ.
                        </span>
                    </div>
                </div>
                <div class="col-6 ">
                    <div class="img-result">
                        <img src="{{ asset('/assets/imgrec/rs-wagon.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_hp.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagehpsuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_mpg.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG city{{ $averagecitysuv }}/mpg{{ $averagehysuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_price.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagepricesuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <button class="btn btn-next-pre" data-bs-toggle="modal" data-bs-target="#myModal">
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="result-hatchback">
            <div class="row">
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <div class="text-result">
                        <p class="title">Hatchback</p>
                        <span class="details">
                            รถ Hatchback มีความสามารถในการเดินทางทั้งในเมืองและในสภาพถนนที่รุนแรงด้วยความสูงของรถที่สูงขึ้น
                            ซึ่งช่วยให้ผู้โดยสารมีมองเห็นไกลและมีความควบคุมที่ดี นอกจากนี้ รถ Hatchback
                            ยังมีพื้นที่ภายในกว้างขวางที่สามารถรับผู้โดยสารและของขวัญได้มาก
                            ทำให้เป็นเลือกที่สมบูรณ์สำหรับครอบครัวและการเดินทางไกลในความสบายความรวดเร็วและความสบายใจ.
                        </span>
                    </div>
                </div>
                <div class="col-6 ">
                    <div class="img-result">
                        <img src="{{ asset('/assets/imgrec/rs-hatchback.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_hp.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagehpsuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_mpg.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG city{{ $averagecitysuv }}/mpg{{ $averagehysuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_price.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagepricesuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <button class="btn btn-next-pre" data-bs-toggle="modal" data-bs-target="#myModal">
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="result-van">
            <div class="row">
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <div class="text-result">
                        <p class="title">Van</p>
                        <span class="details">
                            รถ Van มีความสามารถในการเดินทางทั้งในเมืองและในสภาพถนนที่รุนแรงด้วยความสูงของรถที่สูงขึ้น
                            ซึ่งช่วยให้ผู้โดยสารมีมองเห็นไกลและมีความควบคุมที่ดี นอกจากนี้ รถ Van
                            ยังมีพื้นที่ภายในกว้างขวางที่สามารถรับผู้โดยสารและของขวัญได้มาก
                            ทำให้เป็นเลือกที่สมบูรณ์สำหรับครอบครัวและการเดินทางไกลในความสบายความรวดเร็วและความสบายใจ.
                        </span>
                    </div>
                </div>
                <div class="col-6 ">
                    <div class="img-result">
                        <img src="{{ asset('/assets/imgrec/rs-van.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_hp.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagehpsuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_mpg.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG city{{ $averagecitysuv }}/mpg{{ $averagehysuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_price.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagepricesuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <button class="btn btn-next-pre" data-bs-toggle="modal" data-bs-target="#myModal">
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="result-pickup">
            <div class="row">
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <div class="text-result">
                        <p class="title">Pickup</p>
                        <span class="details">
                            รถ Pickup มีความสามารถในการเดินทางทั้งในเมืองและในสภาพถนนที่รุนแรงด้วยความสูงของรถที่สูงขึ้น
                            ซึ่งช่วยให้ผู้โดยสารมีมองเห็นไกลและมีความควบคุมที่ดี นอกจากนี้ รถ Pickup
                            ยังมีพื้นที่ภายในกว้างขวางที่สามารถรับผู้โดยสารและของขวัญได้มาก
                            ทำให้เป็นเลือกที่สมบูรณ์สำหรับครอบครัวและการเดินทางไกลในความสบายความรวดเร็วและความสบายใจ.
                        </span>
                    </div>
                </div>
                <div class="col-6 ">
                    <div class="img-result">
                        <img src="{{ asset('/assets/imgrec/rs-pickup.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_hp.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagehpsuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_mpg.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG city{{ $averagecitysuv }}/mpg{{ $averagehysuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="box-feture">
                                <div class="imgfeture text-center">
                                    <img src="{{ asset('/assets/imgrec/rs_price.png') }}" alt="">
                                </div>
                                <div class="detailfeture text-center">
                                    <span>
                                        AVG {{ $averagepricesuv }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <button class="btn btn-next-pre" data-bs-toggle="modal" data-bs-target="#myModal">
                        หน้าถัดไป
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>









        <!-- The Modal -->
        <div class="modal fade modal-position-c" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">ส่งความคิดเห็น</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <form action="#" method="post">
                                @csrf
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <input type="radio" class="btn-check star-input" id="btn-check-1"
                                        name="score" autocomplete="off" value="1">
                                    <label class="star" for="btn-check-1"><span class="fa fa-star star-check"
                                            id="st-1"></span></label>
                                    <input type="radio" class="btn-check star-input" id="btn-check-2"
                                        name="score" autocomplete="off" value="2">
                                    <label class="star" for="btn-check-2"><span class="fa fa-star star-check"
                                            id="st-2"></span></label>
                                    <input type="radio" class="btn-check star-input" id="btn-check-3"
                                        name="score" autocomplete="off" value="3">
                                    <label class="star" for="btn-check-3"><span class="fa fa-star star-check"
                                            id="st-3"></span></label>
                                    <input type="radio" class="btn-check star-input" id="btn-check-4"
                                        name="score" autocomplete="off" value="4">
                                    <label class="star" for="btn-check-4"><span class="fa fa-star star-check"
                                            id="st-4"></span></label>
                                    <input type="radio" class="btn-check star-input" id="btn-check-5"
                                        name="score" autocomplete="off" value="5">
                                    <label class="star" for="btn-check-5"><span class="fa fa-star star-check"
                                            id="st-5"></span></label>
                                </div>
                                <div class="col-12 mt-3">
                                    <input type="hidden" name="md-result" id="md-result">
                                    <textarea name="md-details" id="md-details" cols="10" rows="4" class="form-control"></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="button" class="form-control"
                                        style="background: #357266; color:#ffffff;" id="sent-review">ส่ง</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div> --}}
                    <!-- Modal footer -->

                </div>
            </div>
        </div>











    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // เก็บค่า
            var answersex;
            var answerold;
            var answereducation;
            var answercareer;
            var answerincome;
            var answerstatus;
            var answerfreetime;
            var answerlifestyle;
            var answercarnow;
            var answerownercar;
            var answerplanrent;
            var answerfactorrent;
            var answerfactordrive;
            var answertravellevel;
            var answertravelwith;
            var answertypeattraction;
            var answerattraction;
            var answerftattraction;



            $('input[name="sex"]').on('change', function() {
                answersex = $('input[name="sex"]:checked').val();
                $('#btn-next-old').prop('disabled', false);
                console.log("ค่าที่เลือก: " + answersex);
            });

            $('input[name="old"]').on('change', function() {
                answerold = $('input[name="old"]:checked').val();
                console.log("ค่าที่เลือก: " + answerold);
                $('#btn-next-education').prop('disabled', false);
            });

            $('input[name="education"]').on('change', function() {
                answereducation = $('input[name="education"]:checked').val();
                console.log("ค่าที่เลือก: " + answereducation);
                $('#btn-next-career').prop('disabled', false);
            });

            $('input[name="career"]').on('change', function() {
                answercareer = $('input[name="career"]:checked').val();
                console.log("ค่าที่เลือก: " + answercareer);
                $('#btn-next-income').prop('disabled', false);
            });

            $('input[name="income"]').on('change', function() {
                answerincome = $('input[name="income"]:checked').val();
                console.log("ค่าที่เลือก: " + answerincome);
                $('#btn-next-status').prop('disabled', false);
            });

            $('input[name="status"]').on('change', function() {
                answerstatus = $('input[name="status"]:checked').val();
                console.log("ค่าที่เลือก: " + answerstatus);
                $('#btn-next-freetime').prop('disabled', false);
            });

            $('input[name="freetime"]').on('change', function() {
                answerfreetime = $('input[name="freetime"]:checked').val();
                console.log("ค่าที่เลือก: " + answerfreetime);
                $('#btn-next-lifestyle').prop('disabled', false);
            });

            $('input[name="lifestyle"]').on('change', function() {
                answerlifestyle = $('input[name="lifestyle"]:checked').val();
                console.log("ค่าที่เลือก: " + answerlifestyle);
                $('#btn-next-carnow').prop('disabled', false);
            });

            $('input[name="carnow"]').on('change', function() {
                answercarnow = $('input[name="carnow"]:checked').val();
                console.log("ค่าที่เลือก: " + answercarnow);
                $('#btn-next-ownercar').prop('disabled', false);
            });

            $('input[name="ownercar"]').on('change', function() {
                answerownercar = $('input[name="ownercar"]:checked').val();
                console.log("ค่าที่เลือก: " + answerownercar);
                $('#btn-next-planrent').prop('disabled', false);
            });

            $('input[name="planrent"]').on('change', function() {
                answerplanrent = $('input[name="planrent"]:checked').val();
                console.log("ค่าที่เลือก: " + answerplanrent);
                $('#btn-next-factorrent').prop('disabled', false);
            });

            $('input[name="factorrent"]').on('change', function() {
                answerfactorrent = $('input[name="factorrent"]:checked').val();
                console.log("ค่าที่เลือก: " + answerfactorrent);
                $('#btn-next-factordrive').prop('disabled', false);
            });

            $('input[name="factordrive"]').on('change', function() {
                answerfactordrive = $('input[name="factordrive"]:checked').val();
                console.log("ค่าที่เลือก: " + answerfactordrive);
                $('#btn-next-travellevel').prop('disabled', false);
            });

            $('input[name="travellevel"]').on('change', function() {
                answertravellevel = $('input[name="travellevel"]:checked').val();
                console.log("ค่าที่เลือก: " + answertravellevel);
                $('#btn-next-travelwith').prop('disabled', false);
            });

            $('input[name="travelwith"]').on('change', function() {
                answertravelwith = $('input[name="travelwith"]:checked').val();
                console.log("ค่าที่เลือก: " + answertravelwith);
                $('#btn-next-typeattraction').prop('disabled', false);
            });

            $('input[name="typeattraction"]').on('change', function() {
                answertypeattraction = $('input[name="typeattraction"]:checked').val();
                console.log("ค่าที่เลือก: " + answertypeattraction);
                $('#btn-next-attraction').prop('disabled', false);
            });

            $('input[name="attraction"]').on('change', function() {
                answerattraction = $('input[name="attraction"]:checked').val();
                console.log("ค่าที่เลือก: " + answerattraction);
                $('#btn-next-ftattraction').prop('disabled', false);
            });

            $('input[name="ft-attraction"]').on('change', function() {
                answerftattraction = $('input[name="ft-attraction"]:checked').val();
                console.log("ค่าที่เลือก: " + answerftattraction);
                $('#btn-next-submit').prop('disabled', false);
            });
            // เก็บค่า

            // next ถัดไป
            $("#btn-next-old").click(function() {
                $(".qt-sex").css("display", "none");
                console.log('เลือกแล้ว' + answersex);
                $(".qt-sex").animate({
                    opacity: 0
                }, 500);


                $(".qt-old").css("display", "block");
                $(".qt-old").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-education").click(function() {
                $(".qt-old").css("display", "none");
                $(".qt-old").animate({
                    opacity: 0
                }, 500);


                $(".qt-education").css("display", "block");
                $(".qt-education").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-career").click(function() {
                $(".qt-education").css("display", "none");
                $(".qt-education").animate({
                    opacity: 0
                }, 500);


                $(".qt-career").css("display", "block");
                $(".qt-career").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-income").click(function() {
                $(".qt-career").css("display", "none");
                $(".qt-career").animate({
                    opacity: 0
                }, 500);


                $(".qt-income").css("display", "block");
                $(".qt-income").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-status").click(function() {
                $(".qt-income").css("display", "none");
                $(".qt-income").animate({
                    opacity: 0
                }, 500);


                $(".qt-status").css("display", "block");
                $(".qt-status").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-freetime").click(function() {
                $(".qt-status").css("display", "none");
                $(".qt-status").animate({
                    opacity: 0
                }, 500);


                $(".qt-freetime").css("display", "block");
                $(".qt-freetime").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-lifestyle").click(function() {
                $(".qt-freetime").css("display", "none");
                $(".qt-freetime").animate({
                    opacity: 0
                }, 500);


                $(".qt-lifestyle").css("display", "block");
                $(".qt-lifestyle").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-carnow").click(function() {
                $(".qt-lifestyle").css("display", "none");
                $(".qt-lifestyle").animate({
                    opacity: 0
                }, 500);


                $(".qt-carnow").css("display", "block");
                $(".qt-carnow").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-ownercar").click(function() {
                $(".qt-carnow").css("display", "none");
                $(".qt-carnow").animate({
                    opacity: 0
                }, 500);


                $(".qt-ownercar").css("display", "block");
                $(".qt-ownercar").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-planrent").click(function() {
                $(".qt-ownercar").css("display", "none");
                $(".qt-ownercar").animate({
                    opacity: 0
                }, 500);


                $(".qt-planrent").css("display", "block");
                $(".qt-planrent").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-factorrent").click(function() {
                $(".qt-planrent").css("display", "none");
                $(".qt-planrent").animate({
                    opacity: 0
                }, 500);


                $(".qt-factorrent").css("display", "block");
                $(".qt-factorrent").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-factordrive").click(function() {
                $(".qt-factorrent").css("display", "none");
                $(".qt-factorrent").animate({
                    opacity: 0
                }, 500);


                $(".qt-factordrive").css("display", "block");
                $(".qt-factordrive").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-travellevel").click(function() {
                $(".qt-factordrive").css("display", "none");
                $(".qt-factordrive").animate({
                    opacity: 0
                }, 500);


                $(".qt-travellevel").css("display", "block");
                $(".qt-travellevel").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-travelwith").click(function() {
                $(".qt-travellevel").css("display", "none");
                $(".qt-travellevel").animate({
                    opacity: 0
                }, 500);


                $(".qt-travelwith").css("display", "block");
                $(".qt-travelwith").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-typeattraction").click(function() {
                $(".qt-travelwith").css("display", "none");
                $(".qt-travelwith").animate({
                    opacity: 0
                }, 500);


                $(".qt-typeattraction").css("display", "block");
                $(".qt-typeattraction").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-attraction").click(function() {
                $(".qt-typeattraction").css("display", "none");
                $(".qt-typeattraction").animate({
                    opacity: 0
                }, 500);


                $(".qt-attraction").css("display", "block");
                $(".qt-attraction").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-next-ftattraction").click(function() {
                $(".qt-attraction").css("display", "none");
                $(".qt-attraction").animate({
                    opacity: 0
                }, 500);


                $(".qt-factor-attraction").css("display", "block");
                $(".qt-factor-attraction").animate({
                    opacity: 1
                }, 500);
            });
            // ส่งค่าไปประมวลเพื่อแนะนำ
            $("#btn-next-submit").click(function() {
                Swal.fire({
                    title: 'คุณต้องการส่งข้อมูลใช่หรือไม่?',
                    // showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'ยืนยัน',
                    confirmButtonColor: '#357266',
                    // denyButtonText: `Don't save`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Swal.fire('Saved!', '', 'success')
                        $(".qt-factor-attraction").css("display", 'none')
                        $(".divloader").css("display", "flex");
                        $(".divloader").css("justify-content", "center");
                        $(".divloader").css("align-items", "center");
                        console.log('ลอง' + answerold);

                        $.ajax({
                            url: '/reccoment-result',
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                answersex1: answersex,
                                answerold2: answerold,
                                answereducation3: answereducation,
                                answercareer4: answercareer,
                                answerincome5: answerincome,
                                answerstatus6: answerstatus,
                                answerfreetime7: answerfreetime,
                                answerlifestyle8: answerlifestyle,
                                answercarnow9: answercarnow,
                                answerownercar10: answerownercar,
                                answerplanrent11: answerplanrent,
                                answerfactorrent12: answerfactorrent,
                                answerfactordrive13: answerfactordrive,
                                answertravellevel14: answertravellevel,
                                answertravelwith15: answertravelwith,
                                answertypeattraction16: answertypeattraction,
                                answerattraction17: answerattraction,
                                answerftattraction18: answerftattraction,

                            },
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                $('#md-result').val(response.result);
                                setTimeout(function() {
                                    $(".divloader").css("display", "none");
                                    if (response.result == 'SUV') {
                                        $(".result-suv").css("display", 'block')
                                    } else if (response.result == 'Coupe') {
                                        $(".result-coupe").css("display",
                                            'block')
                                    } else if (response.result ==
                                        'Convertible') {
                                        $(".result-convertible").css("display",
                                            'block')
                                    } else if (response.result == 'Sedan') {
                                        $(".result-sedan").css("display",
                                            'block')
                                    } else if (response.result == 'Wagon') {
                                        $(".result-wagon").css("display",
                                            'block')
                                    } else if (response.result == 'Hatchback') {
                                        $(".result-hatchback").css("display",
                                            'block')
                                    } else if (response.result == 'Van') {
                                        $(".result-van").css("display",
                                            'block')
                                    } else if (response.result == 'Pickup') {
                                        $(".result-pickup").css("display",
                                            'block')
                                    }


                                }, 2800);
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });

                    }

                });
            });
            // ส่งค่าไปประมวลเพื่อแนะนำ
            // next ถัดไป




            // pre ย้อนกลับ
            $("#btn-pre-sex").click(function() {
                $(".qt-old").css("display", "none");
                $(".qt-old").animate({
                    opacity: 0
                }, 500);


                $(".qt-sex").css("display", "block");
                $(".qt-sex").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-old").click(function() {
                $(".qt-education").css("display", "none");
                $(".qt-education").animate({
                    opacity: 0
                }, 500);


                $(".qt-old").css("display", "block");
                $(".qt-old").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-education").click(function() {
                $(".qt-career").css("display", "none");
                $(".qt-career").animate({
                    opacity: 0
                }, 500);

                $(".qt-education").css("display", "block");
                $(".qt-education").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-career").click(function() {
                $(".qt-income").css("display", "none");
                $(".qt-income").animate({
                    opacity: 0
                }, 500);


                $(".qt-career").css("display", "block");
                $(".qt-career").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-income").click(function() {
                $(".qt-status").css("display", "none");
                $(".qt-status").animate({
                    opacity: 0
                }, 500);


                $(".qt-income").css("display", "block");
                $(".qt-income").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-status").click(function() {
                $(".qt-freetime").css("display", "none");
                $(".qt-freetime").animate({
                    opacity: 0
                }, 500);


                $(".qt-status").css("display", "block");
                $(".qt-status").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-freetime").click(function() {
                $(".qt-lifestyle").css("display", "none");
                $(".qt-lifestyle").animate({
                    opacity: 0
                }, 500);


                $(".qt-freetime").css("display", "block");
                $(".qt-freetime").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-lifestyle").click(function() {
                $(".qt-carnow").css("display", "none");
                $(".qt-carnow").animate({
                    opacity: 0
                }, 500);


                $(".qt-lifestyle").css("display", "block");
                $(".qt-lifestyle").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-carnow").click(function() {
                $(".qt-ownercar").css("display", "none");
                $(".qt-ownercar").animate({
                    opacity: 0
                }, 500);


                $(".qt-carnow").css("display", "block");
                $(".qt-carnow").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-ownercar").click(function() {
                $(".qt-planrent").css("display", "none");
                $(".qt-planrent").animate({
                    opacity: 0
                }, 500);


                $(".qt-ownercar").css("display", "block");
                $(".qt-ownercar").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-planrent").click(function() {
                $(".qt-factorrent").css("display", "none");
                $(".qt-factorrent").animate({
                    opacity: 0
                }, 500);


                $(".qt-planrent").css("display", "block");
                $(".qt-planrent").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-factorrent").click(function() {
                $(".qt-factordrive").css("display", "none");
                $(".qt-factordrive").animate({
                    opacity: 0
                }, 500);


                $(".qt-factorrent").css("display", "block");
                $(".qt-factorrent").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-factordrive").click(function() {
                $(".qt-travellevel").css("display", "none");
                $(".qt-travellevel").animate({
                    opacity: 0
                }, 500);


                $(".qt-factordrive").css("display", "block");
                $(".qt-factordrive").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-travellevel").click(function() {
                $(".qt-travelwith").css("display", "none");
                $(".qt-travelwith").animate({
                    opacity: 0
                }, 500);


                $(".qt-travellevel").css("display", "block");
                $(".qt-travellevel").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-travelwith").click(function() {
                $(".qt-typeattraction").css("display", "none");
                $(".qt-typeattraction").animate({
                    opacity: 0
                }, 500);


                $(".qt-travelwith").css("display", "block");
                $(".qt-travelwith").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-typeattraction").click(function() {
                $(".qt-attraction").css("display", "none");
                $(".qt-attraction").animate({
                    opacity: 0
                }, 500);


                $(".qt-typeattraction").css("display", "block");
                $(".qt-typeattraction").animate({
                    opacity: 1
                }, 500);
            });

            $("#btn-pre-attraction").click(function() {
                $(".qt-factor-attraction").css("display", "none");
                $(".qt-factor-attraction").animate({
                    opacity: 0
                }, 500);


                $(".qt-attraction").css("display", "block");
                $(".qt-attraction").animate({
                    opacity: 1
                }, 500);
            });
            // pre ย้อนกลับ

            // score ที่เลือก
            $('input[name="score"]').on('change', function() {
                console.log('คลิกเลือก score ละ');
                score = $('input[name="score"]:checked').val();
                console.log("ค่าที่เลือก: " + score);
            });
            // score ที่เลือก

            // hoverscore
            let scoreInput = $('.star');
            var score;
            $(scoreInput).hover(
                function() {
                    score = $('input[name="score"]:checked').val();
                    let radiofor = $(this).attr('for');
                    if (radiofor == 'btn-check-1') {
                        // window.location.href = "/test/"+score;
                        $('#st-1').css('color', '#FFD700');
                        $('#st-2').css('color', '#111111');
                        $('#st-3').css('color', '#111111');
                        $('#st-4').css('color', '#111111');
                        $('#st-5').css('color', '#111111');

                        if (score == '1') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#111111');
                            $('#st-3').css('color', '#111111');
                            $('#st-4').css('color', '#111111');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '2') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#8d7801');
                            $('#st-3').css('color', '#111111');
                            $('#st-4').css('color', '#111111');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '3') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#8d7801');
                            $('#st-3').css('color', '#8d7801');
                            $('#st-4').css('color', '#111111');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '4') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#8d7801');
                            $('#st-3').css('color', '#8d7801');
                            $('#st-4').css('color', '#8d7801');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '5') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#8d7801');
                            $('#st-3').css('color', '#8d7801');
                            $('#st-4').css('color', '#8d7801');
                            $('#st-5').css('color', '#8d7801');
                        }
                    }
                    if (radiofor == 'btn-check-2') {
                        $('#st-1').css('color', '#FFD700');
                        $('#st-2').css('color', '#FFD700');
                        $('#st-3').css('color', '#111111');
                        $('#st-4').css('color', '#111111');
                        $('#st-5').css('color', '#111111');

                        if (score == '1') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#111111');
                            $('#st-4').css('color', '#111111');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '2') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#111111');
                            $('#st-4').css('color', '#111111');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '3') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#8d7801');
                            $('#st-4').css('color', '#111111');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '4') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#8d7801');
                            $('#st-4').css('color', '#8d7801');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '5') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#8d7801');
                            $('#st-4').css('color', '#8d7801');
                            $('#st-5').css('color', '#8d7801');
                        }
                    }
                    if (radiofor == 'btn-check-3') {
                        $('#st-1').css('color', '#FFD700');
                        $('#st-2').css('color', '#FFD700');
                        $('#st-3').css('color', '#FFD700');
                        $('#st-4').css('color', '#111111');
                        $('#st-5').css('color', '#111111');

                        if (score == '1') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#111111');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '2') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#111111');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '3') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#111111');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '4') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#8d7801');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '5') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#8d7801');
                            $('#st-5').css('color', '#8d7801');
                        }
                    }
                    if (radiofor == 'btn-check-4') {
                        $('#st-1').css('color', '#FFD700');
                        $('#st-2').css('color', '#FFD700');
                        $('#st-3').css('color', '#FFD700');
                        $('#st-4').css('color', '#FFD700');
                        $('#st-5').css('color', '#111111');

                        if (score == '1') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#FFD700');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '2') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#FFD700');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '3') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#FFD700');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '4') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#FFD700');
                            $('#st-5').css('color', '#111111');
                        } else if (score == '5') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#FFD700');
                            $('#st-5').css('color', '#8d7801');
                        }
                    }
                    if (radiofor == 'btn-check-5') {
                        $('#st-1').css('color', '#FFD700');
                        $('#st-2').css('color', '#FFD700');
                        $('#st-3').css('color', '#FFD700');
                        $('#st-4').css('color', '#FFD700');
                        $('#st-5').css('color', '#FFD700');

                        if (score == '1') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#FFD700');
                            $('#st-5').css('color', '#FFD700');
                        } else if (score == '2') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#FFD700');
                            $('#st-5').css('color', '#FFD700');
                        } else if (score == '3') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#FFD700');
                            $('#st-5').css('color', '#FFD700');
                        } else if (score == '4') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#FFD700');
                            $('#st-5').css('color', '#FFD700');
                        } else if (score == '5') {
                            $('#st-1').css('color', '#FFD700');
                            $('#st-2').css('color', '#FFD700');
                            $('#st-3').css('color', '#FFD700');
                            $('#st-4').css('color', '#FFD700');
                            $('#st-5').css('color', '#FFD700');
                        }
                    }
                },
                function() {
                    // window.location.href = "asda"+score;
                    score = $('input[name="score"]:checked').val();
                    if (score == undefined) {
                        $('#st-1').css('color', '#111111');
                        $('#st-2').css('color', '#111111');
                        $('#st-3').css('color', '#111111');
                        $('#st-4').css('color', '#111111');
                        $('#st-5').css('color', '#111111');
                    } else if (score == '1') {
                        $('#st-1').css('color', '#FFD700');
                        $('#st-2').css('color', '#111111');
                        $('#st-3').css('color', '#111111');
                        $('#st-4').css('color', '#111111');
                        $('#st-5').css('color', '#111111');
                    } else if (score == '2') {
                        $('#st-1').css('color', '#FFD700');
                        $('#st-2').css('color', '#FFD700');
                        $('#st-3').css('color', '#111111');
                        $('#st-4').css('color', '#111111');
                        $('#st-5').css('color', '#111111');
                    } else if (score == '3') {
                        $('#st-1').css('color', '#FFD700');
                        $('#st-2').css('color', '#FFD700');
                        $('#st-3').css('color', '#FFD700');
                        $('#st-4').css('color', '#111111');
                        $('#st-5').css('color', '#111111');
                    } else if (score == '4') {
                        $('#st-1').css('color', '#FFD700');
                        $('#st-2').css('color', '#FFD700');
                        $('#st-3').css('color', '#FFD700');
                        $('#st-4').css('color', '#FFD700');
                        $('#st-5').css('color', '#111111');
                    } else if (score == '5') {
                        $('#st-1').css('color', '#FFD700');
                        $('#st-2').css('color', '#FFD700');
                        $('#st-3').css('color', '#FFD700');
                        $('#st-4').css('color', '#FFD700');
                        $('#st-5').css('color', '#FFD700');
                    }
                }
            );
            // hoverscore

            // ส่ง review
            $('#sent-review').click(function() {
                console.log('sent-review-click');
                $('.btn-close').click();
                var md_result = $('#md-result').val();
                var detailsreview = $("#md-details").val();
                var scorereview = $('input[name="score"]:checked').val();
                var dataReview = {
                    "answersex": answersex,
                    "answerold": answerold,
                    "answereducation": answereducation,
                    "answercareer": answercareer,
                    "answerincome": answerincome,
                    "answerstatus": answerstatus,
                    "answerfreetime": answerfreetime,
                    "answerlifestyle": answerlifestyle,
                    "answercarnow": answercarnow,
                    "answerownercar": answerownercar,
                    "answerplanrent": answerplanrent,
                    "answerfactorrent": answerfactorrent,
                    "answerfactordrive": answerfactordrive,
                    "answertravellevel": answertravellevel,
                    "answertravelwith": answertravelwith,
                    "answertypeattraction": answertypeattraction,
                    "answerattraction": answerattraction,
                    "answerftattraction": answerftattraction,
                    "scorereview": scorereview,
                    "detailsreview": detailsreview,
                    "result": md_result,
                };

                // alert(scorereview+detailsreview); 
                $.ajax({
                    url: '/review-rec',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        dataReview: dataReview,
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.successreview) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: response.successreview,
                                showConfirmButton: false,
                                timer: 2000
                            }).then(() => {

                                window.location.href = '/car-result';
                            });
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
            // ส่ง review
        });
    </script>
@endsection

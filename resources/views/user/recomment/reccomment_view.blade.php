@extends('layout.homeuser')
@section('style')
    <style>
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
            left: 45%;
            transform: translateX(-50%);
            transition: 0.5s;
            opacity: 0;
        }

        .box-img>img {
            width: 150px;
            height: 180px;
        }

        .box-img img {
            width: 98%;
            object-fit: cover;
            object-position: center center;
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

        .box-load {
            position: fixed;
            top: 50%;
            left: 50%;
            color: #23c686;
        }

        .re_rec,
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

        .title {
            text-align: center;
            font-size: 40px;
            font-weight: 900;
            color: #134bc5;
            line-height: 40px;
            margin-top: 30px;
        }

        .details {
            text-align: center;
            font-size: 20px;
            font-weight: 500;
        }

        .img-result {
            width: 100%;
            overflow: hidden;
        }

        .img-result img {
            object-fit: cover;
            width: 100%;
            object-position: center;
        }

        .box-feture {
            margin-top: 15px;
            padding: 10px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
            border-radius: 20px;
        }

        .imgfeture i {
            font-size: 50px;
            color: #23c686;
        }

        .detailfeture span {
            text-align: center;
            font-size: 16px;
            font-weight: 500;
        }

        .btn-next-pre {
            font-size: 40px;
        }

        .star {
            font-size: 25px;
            margin-left: 5px;
            margin-right: 5px;
            cursor: pointer;
        }

        .star:hover {
            color: #8d7801;
        }

        #sent-review {
            background-color: #23c686;
            color: white;
        }

        #sent-review:disabled {
            background-color: #6aa08a;
            color: white;
        }

        input[type="radio"][name="sex"][value="male"]:disabled+label[for="male"] {
            opacity: 0.3;
            pointer-events: none;
        }

        input[type="radio"][name="income"]:disabled+label {
            opacity: 0.3;
            pointer-events: none;
        }

        input[type="radio"][name="ownercar"]:disabled+label {
            opacity: 0.3;
            pointer-events: none;
        }

        input[type="radio"][name="attraction"]:disabled+label {
            opacity: 0.3;
            pointer-events: none;
        }

        .answertitle {
            color: #134bc5;
            font-size: 26px;
            font-weight: 900;
        }

        @media only screen and (max-width: 500px) {
            #btn-next-review {
                display: flex;
                justify-content: center !important;
            }
        }
    </style>
@endsection
@section('content')
    @include('include.reccomment-view.qt1')
    @include('include.reccomment-view.qt2')
    @include('include.reccomment-view.qt3')
    @include('include.reccomment-view.qt4')
    @include('include.reccomment-view.qt5')
    @include('include.reccomment-view.qt6')
    @include('include.reccomment-view.qt7')
    @include('include.reccomment-view.qt8')
    @include('include.reccomment-view.qt9')
    @include('include.reccomment-view.qt10')
    @include('include.reccomment-view.qt11')
    @include('include.reccomment-view.qt12')
    @include('include.reccomment-view.qt13')
    @include('include.reccomment-view.qt14')
    @include('include.reccomment-view.qt15')
    @include('include.reccomment-view.qt16')
    @include('include.reccomment-view.qt17')
    @include('include.reccomment-view.qt18')
    @include('include.reccomment-view.re-rec')
    <div class="box-load" hidden>
        <div class="spinner-grow" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @include('include.reccomment-view.result-convertible')
    @include('include.reccomment-view.result-coupe')
    @include('include.reccomment-view.result-hatchback')
    @include('include.reccomment-view.result-pickup')
    @include('include.reccomment-view.result-sedan')
    @include('include.reccomment-view.result-suv')
    @include('include.reccomment-view.result-van')
    @include('include.reccomment-view.result-wagon')

    @include('include.reccomment-view.modal-review')
@endsection
@section('script')
    <script>
        // ประกาศตัวแปร
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

        // qt-1
        $('input[name="sex"]').on('change', function() {
            answersex = $('input[name="sex"]:checked').val();
            $('#btn-next-old').prop('disabled', false);
            console.log("sex: " + answersex);
        });

        // next-1
        $("#btn-next-old").click(function() {
            $(".qt-sex").css("display", "none");
            console.log('sex เลือกแล้ว' + answersex);
            $(".qt-sex").animate({
                opacity: 0
            }, 500);
            $(".qt-old").css("display", "block");
            $(".qt-old").animate({
                opacity: 1
            }, 500);
        });

        // qt-2
        $('input[name="old"]').on('change', function() {
            answerold = $('input[name="old"]:checked').val();
            console.log("ค่าที่เลือก: " + answerold);
            $('#btn-next-education').prop('disabled', false);
        });

        // next-2
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

        // pre-2
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

        // qt-3
        $('input[name="education"]').on('change', function() {
            answereducation = $('input[name="education"]:checked').val();
            console.log("ค่าที่เลือก: " + answereducation);
            $('#btn-next-career').prop('disabled', false);
        });

        // next-3
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

        // pre-3
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

        // qt-4
        $('input[name="career"]').on('change', function() {
            answercareer = $('input[name="career"]:checked').val();
            console.log("ค่าที่เลือก: " + answercareer);
            $('#btn-next-income').prop('disabled', false);

            if (answercareer == 'no' || answercareer == 'student') {
                $('#income10000').prop('disabled', true);
                $('#income10000-20000').prop('disabled', true);
                $('#income20001-30000').prop('disabled', true);
                $('#income30001-40000').prop('disabled', true);
                $('#income40001-50000').prop('disabled', true);
                $('#income50001-100000').prop('disabled', true);
                $('#income100000').prop('disabled', true);
                $('no-income').prop('disabled', false);
            } else {
                $('#income10000').prop('disabled', false);
                $('#income10000-20000').prop('disabled', false);
                $('#income20001-30000').prop('disabled', false);
                $('#income30001-40000').prop('disabled', false);
                $('#income40001-50000').prop('disabled', false);
                $('#income50001-100000').prop('disabled', false);
                $('#income100000').prop('disabled', false);
                $('no-income').prop('disabled', true);
            }
        });
        // next-4
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
        // pre-4
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

        // qt-5
        $('input[name="income"]').on('change', function() {
            answerincome = $('input[name="income"]:checked').val();
            console.log("ค่าที่เลือก: " + answerincome);
            $('#btn-next-status').prop('disabled', false);
        });
        // next-5
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
        // pre-5
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

        // qt-6
        $('input[name="status"]').on('change', function() {
            answerstatus = $('input[name="status"]:checked').val();
            console.log("ค่าที่เลือก: " + answerstatus);
            $('#btn-next-freetime').prop('disabled', false);
        });
        // next-6
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
        // pre-6
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

        // qt-7
        $('input[name="freetime"]').on('change', function() {
            answerfreetime = $('input[name="freetime"]:checked').val();
            console.log("ค่าที่เลือก: " + answerfreetime);
            $('#btn-next-lifestyle').prop('disabled', false);
        });

        // next-7
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
        // pre-7
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

        // qt-8
        $('input[name="lifestyle"]').on('change', function() {
            answerlifestyle = $('input[name="lifestyle"]:checked').val();
            console.log("ค่าที่เลือก: " + answerlifestyle);
            $('#btn-next-carnow').prop('disabled', false);
        });
        // next-8
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
        // pre-8
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

        // qt-9
        $('input[name="carnow"]').on('change', function() {
            answercarnow = $('input[name="carnow"]:checked').val();
            console.log("ค่าที่เลือก: " + answercarnow);
            $('#btn-next-ownercar').prop('disabled', false);

            if (answercarnow == 'no') {
                $('#ownercar_1').prop('disabled', true);
                $('#ownercar_1to3').prop('disabled', true);
                $('#ownercar_4to6').prop('disabled', true);
                $('#ownercar_7to10').prop('disabled', true);
                $('#ownercar_7to10').prop('disabled', true);
                $('ownercar_no').prop('disabled', false);
            } else {
                $('#ownercar_1').prop('disabled', false);
                $('#ownercar_1to3').prop('disabled', false);
                $('#ownercar_4to6').prop('disabled', false);
                $('#ownercar_7to10').prop('disabled', false);
                $('#ownercar_7to10').prop('disabled', false);
                $('ownercar_no').prop('disabled', true);
            }
        });
        // next-9
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
        // pre-9
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

        // qt-10
        $('input[name="ownercar"]').on('change', function() {
            answerownercar = $('input[name="ownercar"]:checked').val();
            console.log("ค่าที่เลือก: " + answerownercar);
            $('#btn-next-planrent').prop('disabled', false);
        });
        // next-10
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
        // pre-10
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

        // qt-11
        $('input[name="planrent"]').on('change', function() {
            answerplanrent = $('input[name="planrent"]:checked').val();
            console.log("ค่าที่เลือก: " + answerplanrent);
            $('#btn-next-factorrent').prop('disabled', false);
        });
        // next-11
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
        // pre-11
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

        // qt-12
        $('input[name="factorrent"]').on('change', function() {
            answerfactorrent = $('input[name="factorrent"]:checked').val();
            console.log("ค่าที่เลือก: " + answerfactorrent);
            $('#btn-next-factordrive').prop('disabled', false);
        });
        // next-12
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
        // pre-12
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

        // qt-13
        $('input[name="factordrive"]').on('change', function() {
            answerfactordrive = $('input[name="factordrive"]:checked').val();
            console.log("ค่าที่เลือก: " + answerfactordrive);
            $('#btn-next-travellevel').prop('disabled', false);
        });
        // next-13
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
        // pre-13
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

        // qt-14
        $('input[name="travellevel"]').on('change', function() {
            answertravellevel = $('input[name="travellevel"]:checked').val();
            console.log("ค่าที่เลือก: " + answertravellevel);
            $('#btn-next-travelwith').prop('disabled', false);
        });
        // next-14
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
        // pre-14
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

        // qt-15
        $('input[name="travelwith"]').on('change', function() {
            answertravelwith = $('input[name="travelwith"]:checked').val();
            console.log("ค่าที่เลือก: " + answertravelwith);
            $('#btn-next-typeattraction').prop('disabled', false);
        });
        // next-15
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
        // pre-15
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

        // qt-16
        $('input[name="typeattraction"]').on('change', function() {
            answertypeattraction = $('input[name="typeattraction"]:checked').val();
            console.log("ค่าที่เลือก: " + answertypeattraction);
            $('#btn-next-attraction').prop('disabled', false);

            if (answertypeattraction == 'human') {
                $('#attraction_beach').prop('disabled', true);
                $('#attraction_mountain').prop('disabled', true);
                $('#attraction_waterfall').prop('disabled', true);
                $('#attraction_ancientcity').prop('disabled', false);
                $('#attraction_mall').prop('disabled', false);
                $('#attraction_fleamarket').prop('disabled', false);
            } else {
                $('#attraction_beach').prop('disabled', false);
                $('#attraction_mountain').prop('disabled', false);
                $('#attraction_waterfall').prop('disabled', false);
                $('#attraction_ancientcity').prop('disabled', true);
                $('#attraction_mall').prop('disabled', true);
                $('#attraction_fleamarket').prop('disabled', true);
            }
        });
        // next-16
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
        // pre-16
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

        // qt-17
        $('input[name="attraction"]').on('change', function() {
            answerattraction = $('input[name="attraction"]:checked').val();
            console.log("ค่าที่เลือก: " + answerattraction);
            $('#btn-next-ftattraction').prop('disabled', false);
        });
        // next-17
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
        // pre-17
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

        // qt-18
        $('input[name="ft-attraction"]').on('change', function() {
            answerftattraction = $('input[name="ft-attraction"]:checked').val();
            console.log("ค่าที่เลือก: " + answerftattraction);
            $('#btn-next-submit').prop('disabled', false);
        });
        // next-18
        $("#btn-next-submit").click(function() {
            Swal.fire({
                title: 'คุณต้องการส่งข้อมูลใช่หรือไม่?',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                confirmButtonColor: '#357266',
            }).then((result) => {
                if (result.isConfirmed) {
                    $(".qt-factor-attraction").css("display", 'none')
                    $('.box-load').attr('hidden', false);
                    $('#box-content').removeClass('box-content');
                    console.log('ลอง' + answerold);

                    $.ajax({
                        url: "{{ route('reccoment_proccess') }}",
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
                                $('.box-load').attr('hidden', true);
                                $('#box-content').addClass('box-content');
                                if (response.result == 'suv') {
                                    $(".result-suv").css("display", 'block')
                                } else if (response.result == 'coupe') {
                                    $(".result-coupe").css("display",
                                        'block')
                                } else if (response.result ==
                                    'convertible') {
                                    $(".result-convertible").css("display",
                                        'block')
                                } else if (response.result == 'sedan') {
                                    $(".result-sedan").css("display",
                                        'block')
                                } else if (response.result == 'wagon') {
                                    $(".result-wagon").css("display",
                                        'block')
                                } else if (response.result == 'hatchback') {
                                    $(".result-hatchback").css("display",
                                        'block')
                                } else if (response.result == 'minivan') {
                                    $(".result-van").css("display",
                                        'block')
                                } else if (response.result == 'pickup') {
                                    $(".result-pickup").css("display",
                                        'block')
                                } else if (response.result == '') {
                                    $(".re_rec").css("display",
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
        // pre-18
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

        // score ที่เลือก
        var score = '';
        $('input[name="score"]').on('change', function() {
            checkScoreSelection();
            console.log('คลิกเลือก score ละ');
            score = $('input[name="score"]:checked').val();
            console.log("ค่าที่เลือก: " + score);
        });

        // การ hover star
        var scoreInput = $('.star');
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

        // ฟังก์ชันเพื่อตรวจสอบการเลือก score
        function checkScoreSelection() {
            if ($("input[name='score']:checked").length === 0) {
                $("#sent-review").prop("disabled", true);
            } else {
                $("#sent-review").prop("disabled", false);
            }
        }

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

            $.ajax({
                url: "{{ route('review_recomment') }}",
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
                            timerProgressBar: true,
                            timer: 2000
                        }).then(() => {
                            console.log('บันทึกสำเร็จ');
                            window.location.href = "/result_view/" + md_result;
                        });
                    }

                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // กดลองอีกครั้ง
        $('#click-re-rec').click(function(e) {
            e.preventDefault();
            $(':radio[name=sex], :radio[name=old], :radio[name=education], :radio[name=career], :radio[name=income], :radio[name=status], :radio[name=freetime], :radio[name=lifestyle], :radio[name=carnow], :radio[name=ownercar], :radio[name=planrent], :radio[name=factorrent], :radio[name=factordrive], :radio[name=travellevel], :radio[name=travelwith], :radio[name=typeattraction], :radio[name=attraction], :radio[name=ft-attraction]')
                .prop('checked', false);
            $('#btn-next-old, #btn-next-education, #btn-next-career, #btn-next-income, #btn-next-status, #btn-next-freetime, #btn-next-lifestyle, #btn-next-carnow, #btn-next-ownercar, #btn-next-planrent, #btn-next-factorrent, #btn-next-factordrive, #btn-next-travellevel, #btn-next-travelwith, #btn-next-typeattraction, #btn-next-attraction, #btn-next-ftattraction, #btn-next-submit')
                .prop('disabled', true);

            $(".re_rec").css("display", "none");
            $(".qt-sex").css("display", "block");
            $(".qt-sex").animate({
                opacity: 1
            }, 500);

        });
    </script>
@endsection

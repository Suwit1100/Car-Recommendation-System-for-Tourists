<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\ReviewRecomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommentCarController extends Controller
{
    public function reccomment_view()
    {
        return view('user.recomment.reccomment_view');
    }

    public function reccoment_proccess(Request $request)
    {
        // dd($request->all());
        $answersex1 = $request->input('answersex1');
        $answerold2 = $request->input('answerold2');
        $answereducation3 = $request->input('answereducation3');
        $answercareer4 = $request->input('answercareer4');
        $answerincome5 = $request->input('answerincome5');
        $answerstatus6 = $request->input('answerstatus6');
        $answerfreetime7 = $request->input('answerfreetime7');
        $answerlifestyle8 = $request->input('answerlifestyle8');
        $answercarnow9 = $request->input('answercarnow9');
        $answerownercar10 = $request->input('answerownercar10');
        $answerplanrent11 = $request->input('answerplanrent11');
        $answerfactorrent12 = $request->input('answerfactorrent12');
        $answerfactordrive13 = $request->input('answerfactordrive13');
        $answertravellevel14 = $request->input('answertravellevel14');
        $answertravelwith15 = $request->input('answertravelwith15');
        $answertypeattraction16 = $request->input('answertypeattraction16');
        $answerattraction17 = $request->input('answerattraction17');
        $answerftattraction18 = $request->input('answerftattraction18');

        // แนะนำ
        $result = '';
        $condition = 'ไม่เข้าเงื่อนไข';
        if ($answerfactorrent12 == 'amenities') {
            if ($answereducation3 == 'bachelordegree') {
                $result = 'sedan';
                $condition = 'factorrent = amenities\n-education = bachelordegree: sedan';
            } else if ($answereducation3 == 'highschool') {
                $result = 'coupe';
                $condition = 'factorrent = amenities\n-education = highschool: coupe';
            }
        } else if ($answerfactorrent12 == 'auqlity') {
            if ($answercarnow9 == 'coupe') {
                $result = 'convertible';
                $condition = 'factorrent = auqlity\n-carnow = coupe: convertible';
            } else if ($answercarnow9 == 'hatchback') {
                if ($answerownercar10 == '1to3') {
                    $result = 'hatchback';
                    $condition = 'factorrent = auqlity\n-carnow = hatchback\n--ownercar = 1to3: hatchback';
                } else if ($answerownercar10 == 'less1') {
                    $result = 'suv';
                    $condition = 'factorrent = auqlity\n-carnow = hatchback\n--ownercar = less1: suv';
                }
            } else if ($answercarnow9 == 'minivan') {
                $result = 'suv';
                $condition = 'factorrent = auqlity\n-carnow = minivan: suv';
            } else if ($answercarnow9 == 'no') {
                if ($answerattraction17 == 'ancientcity') {
                    $result = 'minivan';
                    $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = ancientcity: minivan';
                } else if ($answerattraction17 == 'beach and sea') {
                    if ($answereducation3 == 'bachelordegree') {
                        if ($answercarnow9 == '1to3') {
                            $result = 'coupe';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = beach and sea\n---education = bachelordegree\n----ownercar = 1to3: coupe';
                        } else if ($answercarnow9 == 'less1') {
                            $result = 'convertible';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = beach and sea\n---education = bachelordegree\n----ownercar = less1: convertible';
                        } else if ($answercarnow9 == 'no') {
                            $result = 'sedan';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = beach and sea\n---education = bachelordegree\n----ownercar = no: sedan';
                        }
                    } else if ($answereducation3 == 'highschool') {
                        $result = 'sedan';
                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = beach and sea\n---education = highschool: sedan';
                    } else if ($answereducation3 == 'masterdegree') {
                        $result = 'suv';
                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = beach and sea\n---education = masterdegree: suv';
                    } else if ($answereducation3 == 'vocationalcertificate') {
                        $result = 'coupe';
                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = beach and sea\n---education = vocationalcertificate: coupe';
                    }
                } else if ($answerattraction17 == 'fleamarket') {
                    if ($answerold2 == '20-24') {
                        if ($answerincome5 == '10000-20000') {
                            $result = 'pickup';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = fleamarket\n---old = 20-24----income = 10000-20000: pickup';
                        } else if ($answerincome5 == 'less10000') {
                            $result = 'sedan';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = fleamarket\n---old = 20-24----income = less10000: sedan';
                        } else if ($answerincome5 == 'no') {
                            $result = 'minivan';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = fleamarket\n---old = 20-24----income = no: minivan';
                        }
                    } else if ($answerold2 == '25-34') {
                        $result = 'suv';
                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = fleamarket\n---old = 25-34 : minivan';
                    }
                } else if ($answerattraction17 == 'mall') {
                    if ($answerstatus6 == 'couple') {
                        $result = 'sedan';
                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = couple: sedan';
                    } else if ($answerstatus6 == 'no') {
                        if ($answercareer4 == 'no') {
                            $result = 'pickup';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = no\n----career = no: pickup';
                        } else if ($answercareer4 == 'student') {
                            $result = 'sedan';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = no\n----career = student: sedan';
                        }
                    } else if ($answerstatus6 == 'single') {
                        if ($answerplanrent11 == '1000-2000') {
                            $result == 'hatchback';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = single\n----planrent = 1000-2000: hatchback';
                        } else if ($answerplanrent11 == 'less1000') {
                            if ($answerincome5 == '10000-20000') {
                                $result = 'sedan';
                                $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = single\n----planrent = less1000\n-----income = 10000-20000 : sedan';
                            } else if ($answerincome5 == 'less10000') {
                                $result = 'coupe';
                                $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = single\n----planrent = less1000\n-----income = less10000 : coupe';
                            } else if ($answerincome5 == 'no') {
                                if ($answercareer4 == 'no') {
                                    $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = single\n----planrent = less1000\n-----income = no\n------career = no : sedan';
                                } else if ($answercareer4 == 'student') {
                                    if ($answertravelwith15 == 'closefriend') {
                                        $result = 'minivan';
                                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = single\n----planrent = less1000\n-----income = less10000\n------career = no\n-------travelwith = closefriend  : minivan';
                                    } else if ($answertravelwith15 == 'family') {
                                        $result = 'suv';
                                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = single\n----planrent = less1000\n-----income = less10000\n------career = no\n-------travelwith = family  : suv';
                                    }
                                }
                            }
                        }
                    }
                } else if ($answerattraction17 == 'mountain') {
                    if ($answertravelwith15  == 'closefriend') {
                        if ($answersex1 == 'female') {
                            $result = 'hatchback';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mountain\n---travelwith = closefriend\n----sex = female: hatchback';
                        } else if ($answersex1 == 'male') {
                            $result = 'pickup';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mountain\n---travelwith = closefriend\n----sex = male: pickup';
                        }
                    } else if ($answertravelwith15  == 'family') {
                        $result = 'sedan';
                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mountain\n---travelwith = family: pickup';
                    }
                } else if ($answerattraction17 == 'waterfall') {
                    $result = 'pickup';
                    $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = waterfall: pickup';
                }
            } else if ($answercarnow9 == 'pickup') {
                if ($answertravelwith15 == 'closefriend') {
                    if ($answertravellevel14 == 'level1') {
                        $result == 'hatchback';
                        $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = closefriend\n---travellevel = level1: hatchback';
                    } else if ($answertravellevel14 == 'level2') {
                        if ($answerownercar10 == '1to3') {
                            $result = 'minivan';
                            $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = closefriend\n---travellevel = level2\n----ownercar = 1to3: minivan';
                        } else if ($answerownercar10 == 'less1') {
                            $result = 'pickup';
                            $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = closefriend\n---travellevel = level2\n----ownercar = less1: pickup';
                        }
                    }
                }
            }
        }


        // $answer = [
        //     'sex' => $answersex1,
        //     'old' => $answerold2,
        //     'education' => $answereducation3,
        //     'career' => $answercareer4,
        //     'income' => $answerincome5,
        //     'an6' => $answerstatus6,
        //     'status' => $answerfreetime7,
        //     'lifestyle' => $answerlifestyle8,
        //     'carnow' => $answercarnow9,
        //     'ownercar' => $answerownercar10,
        //     'planrent' => $answerplanrent11,
        //     'factorrent' => $answerfactorrent12,
        //     'factordrive' => $answerfactordrive13,
        //     'travellevel' => $answertravellevel14,
        //     'travelwith' => $answertravelwith15,
        //     'typeattraction' => $answertypeattraction16,
        //     'attraction' => $answerattraction17,
        //     'ftattraction' => $answerftattraction18,
        // ];
        // dd($result);
        // แนะนำ



        //บันทึก Log
        Log::create([
            'user_id' => Auth::user()->id,
            'user_type' => Auth::user()->type,
            'text_detail' => 'ได้ใช้ระบบแนะนำรถยนต์',
        ]);

        return response([
            'status' => '200',
            'message' => 'ส่งข้อมูลสำเร็จ',
            // 'result' => $result,
            // 'answer' => $answer,
        ]);
    }

    public function review_recomment(Request $request)
    {
        // dd($request->all());
        $dataReview = $request->input('dataReview');

        // เก็บข้อมูลรีวิว 
        ReviewRecomment::create([
            'review_by' => Auth::user()->id,
            'answer1' => $dataReview['answersex'],
            'answer2' => $dataReview['answerold'],
            'answer3' => $dataReview['answereducation'],
            'answer4' => $dataReview['answercareer'],
            'answer5' => $dataReview['answerincome'],
            'answer6' => $dataReview['answerstatus'],
            'answer7' => $dataReview['answerfreetime'],
            'answer8' => $dataReview['answerlifestyle'],
            'answer9' => $dataReview['answercarnow'],
            'answer10' => $dataReview['answerownercar'],
            'answer11' => $dataReview['answerplanrent'],
            'answer12' => $dataReview['answerfactorrent'],
            'answer13' => $dataReview['answerfactordrive'],
            'answer14' => $dataReview['answertravellevel'],
            'answer15' => $dataReview['answertravelwith'],
            'answer16' => $dataReview['answertypeattraction'],
            'answer17' => $dataReview['answerattraction'],
            'answer18' => $dataReview['answerftattraction'],
            'result' => $dataReview['result'],
            'score' => $dataReview['scorereview'],
            'comment' => $dataReview['detailsreview'],
        ]);

        //บันทึก Log
        Log::create([
            'user_id' => Auth::user()->id,
            'user_type' => Auth::user()->type,
            'text_detail' => 'ได้แสดงความคิดเห็นเกี่ยวกับการแนะนำ',
        ]);

        // dd($result);
        return response([
            'status' => '200',
            'successreview' => 'บันทึกความคิดเห็นสำเร็จ',
            'data' => $dataReview
        ]);
    }
}

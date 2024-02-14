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
        // $result = 'SUV';
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

        $answer = [
            'an1' => $answersex1,
            'an2' => $answerold2,
            'an3' => $answereducation3,
            'an4' => $answercareer4,
            'an5' => $answerincome5,
            'an6' => $answerstatus6,
            'an7' => $answerfreetime7,
            'an8' => $answerlifestyle8,
            'an9' => $answercarnow9,
            'an10' => $answerownercar10,
            'an11' => $answerplanrent11,
            'an12' => $answerfactorrent12,
            'an13' => $answerfactordrive13,
            'an14' => $answertravellevel14,
            'an15' => $answertravelwith15,
            'an16' => $answertypeattraction16,
            'an17' => $answerattraction17,
            'an18' => $answerftattraction18,
        ];

        // แนะนำ
        if ($answerattraction17 == 'ancientcity') {
            $result = 'Van';
        } else if ($answerattraction17 == 'beach and sea') {
            if ($answertypeattraction16 == 'human') {
                $result = 'Sedan';
            } else if ($answertypeattraction16 == 'nature') {
                if ($answercarnow9 == 'coupe') {
                    $result = 'Convertible';
                } else if ($answercarnow9 == 'hatchback') {
                    if ($answerownercar10 == '1-3') {
                        $result = 'Sedan';
                    } else if ($answerownercar10 == '4-6') {
                        $result = 'Van';
                    } else if ($answerownercar10 == 'less1') {
                        $result = 'SUV';
                    }
                } else if ($answercarnow9 == 'minivan') {
                    $result = 'SUV';
                } else if ($answercarnow9 == 'pickup') {
                    if ($answertravelwith15 == 'closefriend') {
                        $result = 'Coupe';
                    } else if ($answertravelwith15 == 'family') {
                        $result = 'SUV';
                    }
                } else if ($answercarnow9 == 'suv') {
                    $result = 'SUV';
                } else if ($answercarnow9 == 'sedan') {
                    $result = 'SUV';
                } else if ($answercarnow9 == 'wagon') {
                    if ($answerold2 == '25-34') {
                        $result = 'SUV';
                    } else if ($answerold2 == '35-44') {
                        $result = 'Van';
                    }
                } else if ($answercarnow9 == 'no') {
                    if ($answerownercar10 == '1-3') {
                        if ($answertravellevel14 == 'level1') {
                            $result = 'Coupe';
                        } else if ($answertravellevel14 == 'travelLv2') {
                            $result = 'Van';
                        }
                    } else if ($answerownercar10 == '4-6') {
                        $result = 'SUV';
                    } else if ($answerownercar10 == 'less1') {
                        $result = 'Coupe';
                    } else if ($answerownercar10 == 'no') {
                        if ($answereducation3 == 'bachelordegree') {
                            $result = 'Sedan';
                        } else if ($answereducation3 == 'juniorhighschool') {
                            $result = 'Sedan';
                        } else if ($answereducation3 == 'masterdegree') {
                            $result = 'Sedan';
                        } else if ($answereducation3 == 'vocationalcertificate') {
                            $result = 'SUV';
                        } else if ($answereducation3 == 'highschool') {
                            if ($answerfactorrent12 == 'goodvalue') {
                                $result = 'SUV';
                            } else if ($answerfactorrent12 == 'auqlity') {
                                $result = 'Sedan';
                            }
                        }
                    }
                }
            }
        } else if ($answerattraction17 == 'fleamarket') {
            if ($answerincome5 == 'no') {
                if ($answersex1 == 'female') {
                    $result = 'Sedan';
                } else if ($answersex1 == 'male') {
                    $result = 'Sedan';
                }
            } else if ($answerincome5 == '10000-20000') {
                $result = 'Pickup';
            } else if ($answerincome5 == '20001-30000') {
                $result = 'Wagon';
            } else if ($answerincome5 == 'less10000') {
                if ($answerplanrent11 == '1000-2000') {
                    $result = 'SUV';
                } else if ($answerplanrent11 == 'less1000') {
                    $result = 'Sedan';
                }
            }
        } else if ($answerattraction17 == 'mall') {
            if ($answercareer4 == 'freelance') {
                $result = 'Sedan';
            } else if ($answercareer4 == 'it') {
                if ($answerownercar10 == '1-3') {
                    $result = 'SUV';
                } else if ($answerownercar10 == 'no') {
                    $result = 'Hatchback';
                }
            } else if ($answercareer4 == 'no') {
                $result = 'Sedan';
            } else if ($answercareer4 == 'tradesman') {
                $result = 'Sedan';
            } else if ($answercareer4 == 'employee') {
                if ($answersex1 == 'female') {
                    $result = 'Sedan';
                } else if ($answersex1 == 'male') {
                    $result = 'Hatchback';
                }
            } else if ($answercareer4 == 'ceo') {
                $result = 'Hatchback';
            } else if ($answercareer4 == 'student') {
                if ($answerstatus6 == 'couple') {
                    $result = 'Sedan';
                } else if ($answerstatus6 == 'no') {
                    if ($answerftattraction18 == 'activity') {
                        $result = 'Sedan';
                    } else if ($answerftattraction18 == 'food') {
                        $result = 'SUV';
                    }
                } else if ($answerstatus6 == 'single') {
                    $result = 'Hatchback';
                }
            }
        } else if ($answerattraction17 == 'mountain') {
            if ($answertypeattraction16 == 'human') {
                $result = 'Sedan';
            } else if ($answertypeattraction16 == 'nature') {
                if ($answerfactorrent12 == 'goodvalue') {
                    if ($answersex1 == 'female') {
                        $result = 'Van';
                    } else if ($answersex1 == 'male') {
                        $result = 'Pickup';
                    }
                } else if ($answerfactorrent12 == 'service') {
                    $result = 'SUV';
                } else if ($answerfactorrent12 == 'auqlity') {
                    if ($answerold2 == '20-24') {
                        if ($answersex1 == 'female') {
                            $result = 'Sedan';
                        } else if ($answersex1 == 'male') {
                            $result = 'Pickup';
                        }
                    } else if ($answerold2 == '25-34') {
                        if ($answersex1 == 'female') {
                            $result = 'SUV';
                        } else if ($answersex1 == 'male') {
                            $result = 'Convertible';
                        }
                    } else if ($answerold2 == '35-44') {
                        $result = 'Hatchback';
                    } else if ($answerold2 == '45-54') {
                        $result = 'Pickup';
                    }
                } else if ($answerfactorrent12 == 'category') {
                    if ($answertravelwith15 == 'closefriend') {
                        $result = 'SUV';
                    } else if ($answertravelwith15 == 'family') {
                        $result = 'Hatchback';
                    }
                } else if ($answerfactorrent12 == 'discount') {
                    $result = 'Convertible';
                }
            }
        } else if ($answerattraction17 == 'waterfall') {
            if ($answerownercar10 == '1-3') {
                $result = 'SUV';
            } else if ($answerownercar10 == '4-6') {
                if ($answerincome5 == '10000-20000') {
                    $result = 'Van';
                } else if ($answerincome5 == '20001-30000') {
                    $result = 'SUV';
                } else if ($answerincome5 == '30001-40000') {
                    $result = 'SUV';
                }
            } else if ($answerownercar10 == '7-10') {
                $result = 'Pickup';
            } else if ($answerownercar10 == 'less1') {
                $result = 'Pickup';
            } else if ($answerownercar10 == 'no') {
                if ($answertravellevel14 == 'level0') {
                    $result = 'SUV';
                } else if ($answertravellevel14 == 'level1') {
                    if ($answersex1 == 'female') {
                        $result = 'Hatchback';
                    } else if ($answersex1 == 'male') {
                        if ($answerincome5 == 'no') {
                            $result = 'Pickup';
                        } else if ($answerincome5 == '10000-20000') {
                            $result = 'Sedan';
                        } else if ($answerincome5 == 'less10000') {
                            $result = 'Sedan';
                        }
                    }
                } else if ($answertravellevel14 == 'level2') {
                    $result = 'SUV';
                }
            }
        }
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
            'result' => $result,
            'answer' => $answer,
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

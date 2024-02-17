<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\ReviewRecomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecommentCarController extends Controller
{
    public function reccomment_view()
    {
        return view('user.recomment.reccomment_view');
    }

    public function reccoment_proccess(Request $request)
    {
        // dd($request->all());
        $sex = $request->input('answersex1');
        $old = $request->input('answerold2');
        $education = $request->input('answereducation3');
        $career = $request->input('answercareer4');
        $income = $request->input('answerincome5');
        $status = $request->input('answerstatus6');
        $freetime = $request->input('answerfreetime7');
        $lifestyle = $request->input('answerlifestyle8');
        $carnow = $request->input('answercarnow9');
        $ownercar = $request->input('answerownercar10');
        $planrent = $request->input('answerplanrent11');
        $factorrent = $request->input('answerfactorrent12');
        $factordrive = $request->input('answerfactordrive13');
        $travellevel = $request->input('answertravellevel14');
        $travelwith = $request->input('answertravelwith15');
        $typeattraction = $request->input('answertypeattraction16');
        $attraction = $request->input('answerattraction17');
        $ftattraction = $request->input('answerftattraction18');

        // แนะนำ
        $result = '';
        $condition = 'ไม่เข้าเงื่อนไข';
        if ($factorrent == 'amenities') {
            if ($education == 'bachelordegree') {
                $result = 'sedan';
                $condition = [
                    'factorrent' => 'amenities',
                    'education' => 'bachelordegree',
                    'result' => 'sedan'
                ];
            } else if ($education == 'highschool') {
                $result = 'coupe';
                $condition = [
                    'factorrent' => 'amenities',
                    'education' => 'highschool',
                    'result' => 'coupe'
                ];
            }
        } else if ($factorrent == 'auqlity') {
            if ($carnow == 'coupe') {
                $result = 'convertible';
                $condition = [
                    'factorrent' => 'auqlity',
                    'carnow' => 'coupe',
                    'result' => 'convertible'
                ];
            } else if ($carnow == 'hatchback') {
                if ($ownercar == '1to3') {
                    $result = 'hatchback';
                    $condition = [
                        'factorrent' => 'auqlity',
                        'carnow' => 'hatchback',
                        'ownercar' => '1to3',
                        'result' => 'hatchback'
                    ];
                } else if ($ownercar == 'less1') {
                    $result = 'suv';
                    $condition = [
                        'factorrent' => 'auqlity',
                        'carnow' => 'hatchback',
                        'ownercar' => 'less1',
                        'result' => 'suv'
                    ];
                }
            } else if ($carnow == 'minivan') {
                $result = 'suv';
                $condition = [
                    'factorrent' => 'auqlity',
                    'carnow' => 'minivan',
                    'result' => 'suv'
                ];
            } else if ($carnow == 'no') {
                if ($attraction == 'ancientcity') {
                    $result = 'minivan';
                    $condition = [
                        'factorrent' => 'auqlity',
                        'carnow' => 'no',
                        'attraction' => 'ancientcity',
                        'result' => 'minivan'
                    ];
                } else if ($attraction == 'beach and sea') {
                    if ($education == 'bachelordegree') {
                        if ($ownercar == '1to3') {
                            $result = 'coupe';
                            $condition = [
                                'factorrent' => 'auqlity',
                                'carnow' => 'no',
                                'attraction' => 'beach and sea',
                                'education' => 'bachelordegree',
                                'ownercar' => '1to3',
                                'result' => 'coupe'
                            ];
                        } else if ($ownercar == 'less1') {
                            $result = 'convertible';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = beach and sea\n---education = bachelordegree\n----ownercar = less1: convertible';
                        } else if ($ownercar == 'no') {
                            $result = 'sedan';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = beach and sea\n---education = bachelordegree\n----ownercar = no: sedan';
                        }
                    } else if ($education == 'highschool') {
                        $result = 'sedan';
                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = beach and sea\n---education = highschool: sedan';
                    } else if ($education == 'masterdegree') {
                        $result = 'suv';
                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = beach and sea\n---education = masterdegree: suv';
                    } else if ($education == 'vocationalcertificate') {
                        $result = 'coupe';
                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = beach and sea\n---education = vocationalcertificate: coupe';
                    }
                } else if ($attraction == 'fleamarket') {
                    if ($old == '20-24') {
                        if ($income == '10000-20000') {
                            $result = 'pickup';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = fleamarket\n---old = 20-24----income = 10000-20000: pickup';
                        } else if ($income == 'less10000') {
                            $result = 'sedan';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = fleamarket\n---old = 20-24----income = less10000: sedan';
                        } else if ($income == 'no') {
                            $result = 'minivan';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = fleamarket\n---old = 20-24----income = no: minivan';
                        }
                    } else if ($old == '25-34') {
                        $result = 'suv';
                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = fleamarket\n---old = 25-34 : minivan';
                    }
                } else if ($attraction == 'mall') {
                    if ($status == 'couple') {
                        $result = 'sedan';
                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = couple: sedan';
                    } else if ($status == 'no') {
                        if ($career == 'no') {
                            $result = 'pickup';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = no\n----career = no: pickup';
                        } else if ($career == 'student') {
                            $result = 'sedan';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = no\n----career = student: sedan';
                        }
                    } else if ($status == 'single') {
                        if ($planrent == '1000-2000') {
                            $result == 'hatchback';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = single\n----planrent = 1000-2000: hatchback';
                        } else if ($planrent == 'less1000') {
                            if ($income == '10000-20000') {
                                $result = 'sedan';
                                $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = single\n----planrent = less1000\n-----income = 10000-20000 : sedan';
                            } else if ($income == 'less10000') {
                                $result = 'coupe';
                                $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = single\n----planrent = less1000\n-----income = less10000 : coupe';
                            } else if ($income == 'no') {
                                if ($career == 'no') {
                                    $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = single\n----planrent = less1000\n-----income = no\n------career = no : sedan';
                                } else if ($career == 'student') {
                                    if ($travelwith == 'closefriend') {
                                        $result = 'minivan';
                                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = single\n----planrent = less1000\n-----income = less10000\n------career = no\n-------travelwith = closefriend  : minivan';
                                    } else if ($travelwith == 'family') {
                                        $result = 'suv';
                                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mall\n---status = single\n----planrent = less1000\n-----income = less10000\n------career = no\n-------travelwith = family  : suv';
                                    }
                                }
                            }
                        }
                    }
                } else if ($attraction == 'mountain') {
                    if ($travelwith  == 'closefriend') {
                        if ($sex == 'female') {
                            $result = 'hatchback';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mountain\n---travelwith = closefriend\n----sex = female: hatchback';
                        } else if ($sex == 'male') {
                            $result = 'pickup';
                            $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mountain\n---travelwith = closefriend\n----sex = male: pickup';
                        }
                    } else if ($travelwith  == 'family') {
                        $result = 'sedan';
                        $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = mountain\n---travelwith = family: pickup';
                    }
                } else if ($attraction == 'waterfall') {
                    $result = 'pickup';
                    $condition = 'factorrent = auqlity\n-carnow = no\n--attraction = waterfall: pickup';
                }
            } else if ($carnow == 'pickup') {
                if ($travelwith == 'closefriend') {
                    if ($travellevel == 'level1') {
                        $result == 'hatchback';
                        $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = closefriend\n---travellevel = level1: hatchback';
                    } else if ($travellevel == 'level2') {
                        if ($ownercar == '1to3') {
                            $result = 'minivan';
                            $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = closefriend\n---travellevel = level2\n----ownercar = 1to3: minivan';
                        } else if ($ownercar == 'less1') {
                            $result = 'pickup';
                            $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = closefriend\n---travellevel = level2\n----ownercar = less1: pickup';
                        }
                    }
                } else if ($travelwith == 'family') {
                    $result = 'suv';
                    $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = family: suv';
                } else if ($travelwith == 'lover') {
                    $result = 'pickup';
                    $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = lover: pickup';
                } else if ($travelwith == 'team') {
                    if ($income == '10000-20000') {
                        $result = 'suv';
                        $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = team\n---income = 10000-20000: suv';
                    } else if ($income == '30001-40000') {
                        $result = 'pickup';
                        $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = team\n---income = 30001-40000: pickup';
                    }
                }
            } else if ($carnow == 'sedan') {
                if ($old  == '20-24') {
                    $result = 'sedan';
                    $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 20-24: sedan';
                } else if ($old  == '25-34') {
                    if ($ftattraction == 'activity') {
                        $result = 'hatchback';
                        $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = activity: hatchback';
                    } else if ($ftattraction == 'adventure') {
                        $result = 'suv';
                        $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = adventure: suv';
                    } else if ($ftattraction == 'food') {
                        $result = 'sedan';
                        $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = food: sedan';
                    } else if ($ftattraction == 'nature') {
                        if ($travellevel  == 'level1') {
                            if ($freetime == 'enjoy') {
                                $result = 'convertible';
                                $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = nature\n----travellevel = level1\n-----freetime = enjoy: convertible';
                            } else if ($freetime == 'relax') {
                                $result = 'suv';
                                $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = nature\n----travellevel = level1\n-----freetime = relax: suv';
                            }
                        } else if ($travellevel  == 'level2') {
                            $result = 'suv';
                            $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = nature\n----travellevel = level2: suv';
                        }
                    } else if ($ftattraction == 'privacy') {
                        $result = 'sedan';
                        $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = privacy: sedan';
                    }
                } else if ($old  == '35-44') {
                    $result = 'coupe';
                    $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 35-44: coupe';
                } else if ($old  == '45-54') {
                    $result = 'sedan';
                    $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 45-54: sedan';
                }
            } else if ($carnow == 'suv') {
                $result = 'suv';
                $condition = 'factorrent = auqlity\n-carnow = suv: suv';
            } else if ($carnow == 'wagon') {
                $result = 'suv';
                $condition = 'factorrent = auqlity\n-carnow = wagon: suv';
            }
        } else if ($factorrent == 'category') {
            if ($carnow == 'no') {
                $result = 'suv';
                $condition = 'factorrent = category\n-carnow = no: suv';
            } else if ($carnow == 'pickup') {
                $result = 'pickup';
                $condition = 'factorrent = category\n-carnow = pickup: pickup';
            } else if ($carnow == 'sedan') {
                $result = 'coupe';
                $condition = 'factorrent = category\n-carnow = sedan: coupe';
            } else if ($carnow == 'wagon') {
                $result = 'hatchback';
                $condition = 'factorrent = category\n-carnow = wagon: hatchback';
            }
        } else if ($factorrent == 'discount') {
            if ($attraction == 'ancientcity') {
                $result = 'sedan';
                $condition = 'factorrent = discount\n-attraction = ancientcity: sedan';
            } else if ($attraction == 'beach and sea') {
                if ($status == 'couple') {
                    if ($old == '20-24') {
                        $result = 'pickup';
                        $condition = 'factorrent = discount\n-attraction = beach and sea\n--status = couple\n---old = 20-24: pickup';
                    } else if ($old == '25-34') {
                        $result = 'sedan';
                        $condition = 'factorrent = discount\n-attraction = beach and sea\n--status = couple\n---old = 25-34: sedan';
                    }
                } else if ($status == 'married') {
                    $result = 'convertible';
                    $condition = 'factorrent = discount\n-attraction = beach and sea\n--status = married: convertible';
                } else if ($status == 'single') {
                    if ($sex == 'female') {
                        $result = 'convertible';
                        $condition = 'factorrent = discount\n-attraction = beach and sea\n--status = single\n---sex = female: convertible';
                    } else if ($sex == 'lgbt') {
                        $result = 'sedan';
                        $condition = 'factorrent = discount\n-attraction = beach and sea\n--status = single\n---sex = lgbt: sedan';
                    } else if ($sex == 'male') {
                        $result = 'minivan';
                        $condition = 'factorrent = discount\n-attraction = beach and sea\n--status = single\n---sex = male: minivan';
                    }
                }
            } else if ($attraction == 'fleamarket') {
                if ($sex == 'female') {
                    $result = 'sedan';
                    $condition = 'factorrent = discount\n-attraction = fleamarket\n--sex = female: sedan';
                } else if ($sex == 'male') {
                    $result = 'suv';
                    $condition = 'factorrent = discount\n-attraction = fleamarket\n--sex = male: suv';
                }
            } else if ($attraction == 'mall') {
                $result = 'suv';
                $condition = 'factorrent = discount\n-attraction = mall: suv';
            } else if ($attraction == 'mountain') {
                $result = 'convertible';
                $condition = 'factorrent = discount\n-attraction = mountain: convertible';
            } else if ($attraction == 'waterfall') {
                $result = 'suv';
                $condition = 'factorrent = discount\n-attraction = waterfall: suv';
            }
        } else if ($factorrent == 'goodvalue') {
            if ($attraction == 'ancientcity') {
                $result = 'minivan';
                $condition = 'factorrent = goodvalue\n-attraction = ancientcity: minivan';
            } else if ($attraction == 'beach and sea') {
                if ($ftattraction == 'activity') {
                    $result = 'suv';
                    $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = activity: suv';
                } else if ($ftattraction == 'adventure') {
                    $result = 'minivan';
                    $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = adventure: minivan';
                } else if ($ftattraction == 'culture') {
                    $result = 'suv';
                    $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = culture: suv';
                } else if ($ftattraction == 'food') {
                    $result = 'sedan';
                    $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = food: sedan';
                } else if ($ftattraction == 'nature') {
                    if ($lifestyle == 'active') {
                        $result = 'convertible';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = nature\n---lifestyle = active: convertible';
                    } else if ($lifestyle == 'career') {
                        $result = 'sedan';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = nature\n---lifestyle = career: sedan';
                    } else if ($lifestyle == 'chill') {
                        $result = 'suv';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = nature\n---lifestyle = chill: suv';
                    } else if ($lifestyle == 'peaceful') {
                        $result = 'sedan';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = nature\n---lifestyle = peaceful: sedan';
                    } else if ($lifestyle == 'travel') {
                        $result = 'suv';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = nature\n---lifestyle = travel: suv';
                    }
                } else if ($ftattraction == 'privacy') {
                    if ($travellevel == 'level1') {
                        $result = 'sedan';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = privacy\n---travellevel = level1: sedan';
                    } else if ($travellevel == 'level2') {
                        $result = 'wagon';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = privacy\n---travellevel = level2: wagon';
                    }
                }
            } else if ($attraction == 'fleamarket') {
                $result = 'hatchback';
                $condition = 'factorrent = goodvalue\n-attraction = fleamarket: hatchback';
            } else if ($attraction == 'mall') {
                if ($income == '10000-20000') {
                    $result = 'sedan';
                    $condition = 'factorrent = goodvalue\n-attraction = mall\n--income = 10000-20000: sedan';
                } else if ($income == 'less10000') {
                    $result = 'suv';
                    $condition = 'factorrent = goodvalue\n-attraction = mall\n--income = less10000: suv';
                } else if ($income == 'no') {
                    $result = 'suv';
                    $condition = 'factorrent = goodvalue\n-attraction = mall\n--income = no: suv';
                }
            } else if ($attraction == 'mountain') {
                if ($planrent == '1000-2000') {
                    $result = 'sedan';
                    $condition = 'factorrent = goodvalue\n-attraction = mountain\n--planrent = 1000-2000: sedan';
                } else if ($planrent == 'less1000') {
                    $result = 'pickup';
                    $condition = 'factorrent = goodvalue\n-attraction = mountain\n--planrent = less1000: pickup';
                }
            } else if ($attraction == 'waterfall') {
                if ($sex == 'female') {
                    $result = 'minivan';
                    $condition = 'factorrent = goodvalue\n-attraction = waterfall\n--sex = female: minivan';
                } else if ($sex == 'male') {
                    if ($travelwith == 'closefriend') {
                        $result = 'pickup';
                        $condition = 'factorrent = goodvalue\n-attraction = waterfall\n--sex = male\n---travelwith = closefriend: pickup';
                    } else if ($travelwith == 'family') {
                        $result = 'minivan';
                        $condition = 'factorrent = goodvalue\n-attraction = waterfall\n--sex = male\n---travelwith = family: minivan';
                    }
                }
            }
        } else if ($factorrent == 'location') {
            $result = 'minivan';
            $condition = 'factorrent = location: minivan';
        } else if ($factorrent == 'reliability') {
            $result = 'suv';
            $condition = 'factorrent = reliability: suv';
        } else if ($factorrent == 'service') {
            if ($income == '10000-20000') {
                $result = 'suv';
                $condition = 'factorrent = service\n-income = 10000-20000: suv';
            } else if ($income == '20001-30000') {
                if ($education == 'bachelordegree') {
                    $result = 'sedan';
                    $condition = 'factorrent = service\n-income = 20001-30000\n--education = bachelordegree: sedan';
                } else if ($education == 'masterdegree') {
                    $result = 'suv';
                    $condition = 'factorrent = service\n-income = 20001-30000\n--education = masterdegree: suv';
                } else if ($education == 'vocationalcertificate') {
                    $result = 'suv';
                    $condition = 'factorrent = service\n-income = 20001-30000\n--education = vocationalcertificate: suv';
                }
            } else if ($income == '30001-40000') {
                $result = 'minivan';
                $condition = 'factorrent = service\n-income = 30001-40000: minivan';
            } else if ($income == 'less10000') {
                $result = 'sedan';
                $condition = 'factorrent = service\n-income = less10000: sedan';
            }
        }

        if ($condition != 'ไม่เข้าเงื่อนไข') {
            $condition = str_replace("\n", '\n', $condition);
        }


        // $answer = [
        //     'sex' => $sex,
        //     'old' => $old,
        //     'education' => $education,
        //     'career' => $career,
        //     'income' => $income,
        //     'an6' => $status,
        //     'status' => $freetime,
        //     'lifestyle' => $lifestyle,
        //     'carnow' => $carnow,
        //     'ownercar' => $ownercar,
        //     'planrent' => $planrent,
        //     'factorrent' => $factorrent,
        //     'factordrive' => $factordrive,
        //     'travellevel' => $travellevel,
        //     'travelwith' => $travelwith,
        //     'typeattraction' => $typeattraction,
        //     'attraction' => $attraction,
        //     'ftattraction' => $ftattraction,
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
            // 'answer' => $answer,
            'condition' => $condition,
            'result' => $result,

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

    public function result_view(Request $request, $category)
    {
        // dd($category);
        $cars = DB::table('car_dataset')
            ->where('vehicle_style', $category)
            ->paginate(12);

        $totalcars = DB::table('car_dataset')
            ->where('vehicle_style', $category)
            ->count();
        $category;
        return view('user.recomment.rec-result-view', compact('category', 'cars', 'totalcars'));
    }

    public function rec_filter_car(Request $request)
    {
        $data = $request->Datafilter;
        $ofset = ($data['page'] - 1) * 12;
        $cars = DB::table('car_dataset')
            ->when($data['valSearch'], function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('car_dataset.make', 'like', '%' . $search . '%')
                        ->orWhere('car_dataset.model', 'like', '%' . $search . '%');
                });
            })
            ->when($data['valPricemin'], function ($query, $pricemin) {
                return $query->where('msrp', '>=', "$pricemin");
            })
            ->when($data['valPricemax'], function ($query, $pricemax) {
                return $query->where('msrp', '<=', "$pricemax");
            })
            ->when($data['valYearmin'], function ($query, $yearmin) {
                return $query->where('year', '>=', "$yearmin");
            })
            ->when($data['valYearmax'], function ($query, $yearmax) {
                return $query->where('year', '<=', "$yearmax");
            })
            ->when($data['valVachicle'], function ($query, $category) {
                return $query->where('vehicle_style', 'like', "$category");
            })
            ->when($data['valMake'], function ($query, $make) {
                return $query->where('make', 'like', "$make");
            })
            ->when($data['valModel'], function ($query, $model) {
                return $query->where('model', 'like', "$model");
            })
            ->when($data['valFuel'], function ($query, $fuel) {
                return $query->where('engine_fuel_type', 'like', "$fuel");
            })
            ->when($data['valTransmission'], function ($query, $transmission) {
                return $query->where('transmission_type', 'like', "$transmission");
            })
            ->when($data['ValSortPrice'], function ($query, $sort_price) {
                return $query->orderBy('msrp', $sort_price);
            })
            ->when($data['ValSortYear'], function ($query, $sort_year) {
                return $query->orderBy('year', $sort_year);
            })
            ->skip($ofset)
            ->take(12)
            ->get();

        // จำนวน st
        $totalcars = DB::table('car_dataset')
            ->when($data['valSearch'], function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('car_dataset.make', 'like', '%' . $search . '%')
                        ->orWhere('car_dataset.model', 'like', '%' . $search . '%');
                });
            })
            ->when($data['valPricemin'], function ($query, $pricemin) {
                return $query->where('msrp', '>=', "$pricemin");
            })
            ->when($data['valPricemax'], function ($query, $pricemax) {
                return $query->where('msrp', '<=', "$pricemax");
            })
            ->when($data['valYearmin'], function ($query, $yearmin) {
                return $query->where('year', '>=', "$yearmin");
            })
            ->when($data['valYearmax'], function ($query, $yearmax) {
                return $query->where('year', '<=', "$yearmax");
            })
            ->when($data['valVachicle'], function ($query, $category) {
                return $query->where('vehicle_style', 'like', "$category");
            })
            ->when($data['valMake'], function ($query, $make) {
                return $query->where('make', 'like', "$make");
            })
            ->when($data['valModel'], function ($query, $model) {
                return $query->where('model', 'like', "$model");
            })
            ->when($data['valFuel'], function ($query, $fuel) {
                return $query->where('engine_fuel_type', 'like', "$fuel");
            })
            ->when($data['valTransmission'], function ($query, $transmission) {
                return $query->where('transmission_type', 'like', "$transmission");
            })
            ->when($data['ValSortPrice'], function ($query, $sort_price) {
                return $query->orderBy('msrp', $sort_price);
            })
            ->when($data['ValSortYear'], function ($query, $sort_year) {
                return $query->orderBy('year', $sort_year);
            })
            ->count();
        // จำนวน ed

        $html = view('include.rec-result-view.recdatacar', compact('cars'))->render();

        return response([
            'message' => "สำเร็จ",
            'status' => '300',
            'data' => $data,
            'cardata' => $cars,
            'html' => $html,
            'total' => $totalcars
        ]);
    }
}

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
                } else if ($answertravelwith15 == 'family') {
                    $result = 'suv';
                    $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = family: suv';
                } else if ($answertravelwith15 == 'lover') {
                    $result = 'pickup';
                    $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = lover: pickup';
                } else if ($answertravelwith15 == 'team') {
                    if ($answerincome5 == '10000-20000') {
                        $result = 'suv';
                        $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = team\n---income = 10000-20000: suv';
                    } else if ($answerincome5 == '30001-40000') {
                        $result = 'pickup';
                        $condition = 'factorrent = auqlity\n-carnow = pickup\n--travelwith = team\n---income = 30001-40000: pickup';
                    }
                }
            } else if ($answercarnow9 == 'sedan') {
                if ($answerold2  == '20-24') {
                    $result = 'sedan';
                    $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 20-24: sedan';
                } else if ($answerold2  == '25-34') {
                    if ($answerftattraction18 == 'activity') {
                        $result = 'hatchback';
                        $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = activity: hatchback';
                    } else if ($answerftattraction18 == 'adventure') {
                        $result = 'suv';
                        $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = adventure: suv';
                    } else if ($answerftattraction18 == 'food') {
                        $result = 'sedan';
                        $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = food: sedan';
                    } else if ($answerftattraction18 == 'nature') {
                        if ($answertravellevel14  == 'level1') {
                            if ($answerfreetime7 == 'enjoy') {
                                $result = 'convertible';
                                $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = nature\n----travellevel = level1\n-----freetime = enjoy: convertible';
                            } else if ($answerfreetime7 == 'relax') {
                                $result = 'suv';
                                $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = nature\n----travellevel = level1\n-----freetime = relax: suv';
                            }
                        } else if ($answertravellevel14  == 'level2') {
                            $result = 'suv';
                            $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = nature\n----travellevel = level2: suv';
                        }
                    } else if ($answerftattraction18 == 'privacy') {
                        $result = 'sedan';
                        $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 25-34\n---ftattraction = privacy: sedan';
                    }
                } else if ($answerold2  == '35-44') {
                    $result = 'coupe';
                    $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 35-44: coupe';
                } else if ($answerold2  == '45-54') {
                    $result = 'sedan';
                    $condition = 'factorrent = auqlity\n-carnow = sedan\n--old = 45-54: sedan';
                }
            } else if ($answercarnow9 == 'suv') {
                $result = 'suv';
                $condition = 'factorrent = auqlity\n-carnow = suv: suv';
            } else if ($answercarnow9 == 'wagon') {
                $result = 'suv';
                $condition = 'factorrent = auqlity\n-carnow = wagon: suv';
            }
        } else if ($answerfactorrent12 == 'category') {
            if ($answercarnow9 == 'no') {
                $result = 'suv';
                $condition = 'factorrent = category\n-carnow = no: suv';
            } else if ($answercarnow9 == 'pickup') {
                $result = 'pickup';
                $condition = 'factorrent = category\n-carnow = pickup: pickup';
            } else if ($answercarnow9 == 'sedan') {
                $result = 'coupe';
                $condition = 'factorrent = category\n-carnow = sedan: coupe';
            } else if ($answercarnow9 == 'wagon') {
                $result = 'hatchback';
                $condition = 'factorrent = category\n-carnow = wagon: hatchback';
            }
        } else if ($answerfactorrent12 == 'discount') {
            if ($answerattraction17 == 'ancientcity') {
                $result = 'sedan';
                $condition = 'factorrent = discount\n-attraction = ancientcity: sedan';
            } else if ($answerattraction17 == 'beach and sea') {
                if ($answerstatus6 == 'couple') {
                    if ($answerold2 == '20-24') {
                        $result = 'pickup';
                        $condition = 'factorrent = discount\n-attraction = beach and sea\n--status = couple\n---old = 20-24: pickup';
                    } else if ($answerold2 == '25-34') {
                        $result = 'sedan';
                        $condition = 'factorrent = discount\n-attraction = beach and sea\n--status = couple\n---old = 25-34: sedan';
                    }
                } else if ($answerstatus6 == 'married') {
                    $result = 'convertible';
                    $condition = 'factorrent = discount\n-attraction = beach and sea\n--status = married: convertible';
                } else if ($answerstatus6 == 'single') {
                    if ($answersex1 == 'female') {
                        $result = 'convertible';
                        $condition = 'factorrent = discount\n-attraction = beach and sea\n--status = single\n---sex = female: convertible';
                    } else if ($answersex1 == 'lgbt') {
                        $result = 'sedan';
                        $condition = 'factorrent = discount\n-attraction = beach and sea\n--status = single\n---sex = lgbt: sedan';
                    } else if ($answersex1 == 'male') {
                        $result = 'minivan';
                        $condition = 'factorrent = discount\n-attraction = beach and sea\n--status = single\n---sex = male: minivan';
                    }
                }
            } else if ($answerattraction17 == 'fleamarket') {
                if ($answersex1 == 'female') {
                    $result = 'sedan';
                    $condition = 'factorrent = discount\n-attraction = fleamarket\n--sex = female: sedan';
                } else if ($answersex1 == 'male') {
                    $result = 'suv';
                    $condition = 'factorrent = discount\n-attraction = fleamarket\n--sex = male: suv';
                }
            } else if ($answerattraction17 == 'mall') {
                $result = 'suv';
                $condition = 'factorrent = discount\n-attraction = mall: suv';
            } else if ($answerattraction17 == 'mountain') {
                $result = 'convertible';
                $condition = 'factorrent = discount\n-attraction = mountain: convertible';
            } else if ($answerattraction17 == 'waterfall') {
                $result = 'suv';
                $condition = 'factorrent = discount\n-attraction = waterfall: suv';
            }
        } else if ($answerfactorrent12 == 'goodvalue') {
            if ($answerattraction17 == 'ancientcity') {
                $result = 'minivan';
                $condition = 'factorrent = goodvalue\n-attraction = ancientcity: minivan';
            } else if ($answerattraction17 == 'beach and sea') {
                if ($answerftattraction18 == 'activity') {
                    $result = 'suv';
                    $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = activity: suv';
                } else if ($answerftattraction18 == 'adventure') {
                    $result = 'minivan';
                    $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = adventure: minivan';
                } else if ($answerftattraction18 == 'culture') {
                    $result = 'suv';
                    $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = culture: suv';
                } else if ($answerftattraction18 == 'food') {
                    $result = 'sedan';
                    $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = food: sedan';
                } else if ($answerftattraction18 == 'nature') {
                    if ($answerlifestyle8 == 'active') {
                        $result = 'convertible';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = nature\n---lifestyle = active: convertible';
                    } else if ($answerlifestyle8 == 'career') {
                        $result = 'sedan';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = nature\n---lifestyle = career: sedan';
                    } else if ($answerlifestyle8 == 'chill') {
                        $result = 'suv';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = nature\n---lifestyle = chill: suv';
                    } else if ($answerlifestyle8 == 'peaceful') {
                        $result = 'sedan';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = nature\n---lifestyle = peaceful: sedan';
                    } else if ($answerlifestyle8 == 'travel') {
                        $result = 'suv';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = nature\n---lifestyle = travel: suv';
                    }
                } else if ($answerftattraction18 == 'privacy') {
                    if ($answertravellevel14 == 'level1') {
                        $result = 'sedan';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = privacy\n---travellevel = level1: sedan';
                    } else if ($answertravellevel14 == 'level2') {
                        $result = 'wagon';
                        $condition = 'factorrent = goodvalue\n-attraction = beach and sea\n--ftattraction = privacy\n---travellevel = level2: wagon';
                    }
                }
            } else if ($answerattraction17 == 'fleamarket') {
                $result = 'hatchback';
                $condition = 'factorrent = goodvalue\n-attraction = fleamarket: hatchback';
            } else if ($answerattraction17 == 'mall') {
                if ($answerincome5 == '10000-20000') {
                    $result = 'sedan';
                    $condition = 'factorrent = goodvalue\n-attraction = mall\n--income = 10000-20000: sedan';
                } else if ($answerincome5 == 'less10000') {
                    $result = 'suv';
                    $condition = 'factorrent = goodvalue\n-attraction = mall\n--income = less10000: suv';
                } else if ($answerincome5 == 'no') {
                    $result = 'suv';
                    $condition = 'factorrent = goodvalue\n-attraction = mall\n--income = no: suv';
                }
            } else if ($answerattraction17 == 'mountain') {
                if ($answerplanrent11 == '1000-2000') {
                    $result = 'sedan';
                    $condition = 'factorrent = goodvalue\n-attraction = mountain\n--planrent = 1000-2000: sedan';
                } else if ($answerplanrent11 == 'less1000') {
                    $result = 'pickup';
                    $condition = 'factorrent = goodvalue\n-attraction = mountain\n--planrent = less1000: pickup';
                }
            } else if ($answerattraction17 == 'waterfall') {
                if ($answersex1 == 'female') {
                    $result = 'minivan';
                    $condition = 'factorrent = goodvalue\n-attraction = waterfall\n--sex = female: minivan';
                } else if ($answersex1 == 'male') {
                    if ($answertravelwith15 == 'closefriend') {
                        $result = 'pickup';
                        $condition = 'factorrent = goodvalue\n-attraction = waterfall\n--sex = male\n---travelwith = closefriend: pickup';
                    } else if ($answertravelwith15 == 'family') {
                        $result = 'minivan';
                        $condition = 'factorrent = goodvalue\n-attraction = waterfall\n--sex = male\n---travelwith = family: minivan';
                    }
                }
            }
        } else if ($answerfactorrent12 == 'location') {
            $result = 'minivan';
            $condition = 'factorrent = location: minivan';
        } else if ($answerfactorrent12 == 'reliability') {
            $result = 'suv';
            $condition = 'factorrent = reliability: suv';
        } else if ($answerfactorrent12 == 'service') {
            if ($answerincome5 == '10000-20000') {
                $result = 'suv';
                $condition = 'factorrent = service\n-income = 10000-20000: suv';
            } else if ($answerincome5 == '20001-30000') {
                if ($answereducation3 == 'bachelordegree') {
                    $result = 'sedan';
                    $condition = 'factorrent = service\n-income = 20001-30000\n--education = bachelordegree: sedan';
                } else if ($answereducation3 == 'masterdegree') {
                    $result = 'suv';
                    $condition = 'factorrent = service\n-income = 20001-30000\n--education = masterdegree: suv';
                } else if ($answereducation3 == 'vocationalcertificate') {
                    $result = 'suv';
                    $condition = 'factorrent = service\n-income = 20001-30000\n--education = vocationalcertificate: suv';
                }
            } else if ($answerincome5 == '30001-40000') {
                $result = 'minivan';
                $condition = 'factorrent = service\n-income = 30001-40000: minivan';
            } else if ($answerincome5 == 'less10000') {
                $result = 'sedan';
                $condition = 'factorrent = service\n-income = less10000: sedan';
            }
        }

        if ($condition != 'ไม่เข้าเงื่อนไข') {
            $condition = str_replace("\n", '\n', $condition);
        }


        $answer = [
            'sex' => $answersex1,
            'old' => $answerold2,
            'education' => $answereducation3,
            'career' => $answercareer4,
            'income' => $answerincome5,
            'an6' => $answerstatus6,
            'status' => $answerfreetime7,
            'lifestyle' => $answerlifestyle8,
            'carnow' => $answercarnow9,
            'ownercar' => $answerownercar10,
            'planrent' => $answerplanrent11,
            'factorrent' => $answerfactorrent12,
            'factordrive' => $answerfactordrive13,
            'travellevel' => $answertravellevel14,
            'travelwith' => $answertravelwith15,
            'typeattraction' => $answertypeattraction16,
            'attraction' => $answerattraction17,
            'ftattraction' => $answerftattraction18,
        ];
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
            'answer' => $answer,
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
        dd($category);
    }
}

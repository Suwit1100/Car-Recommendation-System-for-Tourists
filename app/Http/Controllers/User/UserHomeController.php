<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LikeCar;
use App\Models\Log;
use App\Models\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class UserHomeController extends Controller
{
    public function home_view()
    {
        return view('user.home.home');
    }

    public function car_list(Request $request)
    {

        $cars = DB::table('car_dataset')
            ->paginate(12);

        $totalcars = DB::table('car_dataset')
            ->count();
        return view('user.home.carlist', compact('cars', 'totalcars'));
    }

    public function filter_car(Request $request)
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

        $html = view('include.carlist.datacar', compact('cars'))->render();

        return response([
            'message' => "สำเร็จ",
            'status' => '300',
            'data' => $data,
            'cardata' => $cars,
            'html' => $html,
            'total' => $totalcars
        ]);
    }

    public function model_query(Request $request)
    {
        $valMake = $request->valMake;
        $model = DB::table('model')
            ->where('make', $valMake)
            ->distinct('model')
            ->get();

        return response([
            'status' => '200',
            'message' => 'สำเร็จ',
            'model' => $model
        ]);
    }

    public function increment_view_car(Request $request)
    {
        // dd($request->all());
        $idcar = $request->idcar;
        DB::table('car_dataset')->where('id_cardataset', $idcar)->increment('total_view');

        $responseData = [
            'status' => 200,
            'message' => 'เพิ่มจำนวนการเข้าชมสำเร็จ',
            'idcar' => $idcar
        ];

        return response()->json($responseData);
    }

    public function like_car(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        if ($data['statuslike'] == 'notready') {
            $result_like = DB::table('car_dataset')->where('id_cardataset', $data['idcars'])->increment('total_like');
            $result_status = LikeCar::updateOrCreate(
                ['likeby_userid' => Auth::user()->id, 'carpost_id' => $data['idcars']],
                ['status' => 'ready']
            );
            $newstatus = $result_status->status;
            $message = 'เพิ่มไลค์ให้ ';
        } else {
            $result_like = DB::table('car_dataset')->where('id_cardataset', $data['idcars'])->decrement('total_like');
            $result_status = LikeCar::updateOrCreate(
                ['likeby_userid' => Auth::user()->id, 'carpost_id' => $data['idcars']],
                ['status' => 'notready']
            );
            $newstatus = $result_status->status;
            $message = 'ลดไลค์ให้ id';
        }

        $car = DB::table('car_dataset')
            ->where('id_cardataset', $data['idcars'])
            ->first();

        $totallike = $car->total_like;
        $responseData = [
            'status' => 200,
            'message' => $message,
            'idcar' => $data['idcars'],
            'newstatus' => $newstatus,
            'total' => $totallike
        ];

        //บันทึก Log
        Log::create([
            'user_id' => Auth::user()->id,
            'user_type' => Auth::user()->type,
            'text_detail' => 'ได้กดถูกใจรถยนต์',
        ]);

        return response()->json($responseData);
    }

    public function car_view($id)
    {
        // dd($id);
        $car = DB::table('car_dataset')
            ->where('car_dataset.id_cardataset', $id)
            ->first();

        return view('user.home.car-in', compact('car'));
    }

    public function load_more_notify(Request $request)
    {
        $data = $request->all();
        $ofset = ($data['page'] - 1) * 3;
        $notify = DB::table('notify')
            ->leftjoin('users', 'notify.user_send_id', '=', 'users.id')
            ->leftjoin('post', 'post.id', '=', 'notify.web_id')
            ->leftjoin('faq', 'faq.id', '=', 'notify.faq_id')
            ->select('notify.*', 'users.name', 'users.lastname', 'users.imgprofile', 'faq.title AS faqtitle', 'post.title AS posttitle')
            ->orderBy('notify.created_at', 'DESC')
            ->where('to_user_id', Auth::user()->id)
            ->skip($ofset)
            ->take(3);
        $view = view('include.homeuser.data-notify', compact('notify'))->render();
        return response()->json(['html' => $view]);
    }

    public function car_mylike(Request $request)
    {
        PaginationPaginator::useBootstrap();
        $car_like = DB::table('like_car')
            ->leftJoin('car_dataset', 'car_dataset.id_cardataset', '=', 'like_car.carpost_id')
            ->where('like_car.likeby_userid', Auth::user()->id)
            ->where('like_car.likeby_userid', Auth::user()->id)
            ->orderBy('like_car.created_at', 'DESC')
            ->paginate(8);
        // dd($car_like);

        return view('user.home.car-like', compact('car_like'));
    }

    public function read_notify_user(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        Notify::find($data['noti_id'])
            ->update(['to_user_id_read' => 'read']);

        $href = '';
        if ($data['faq_id'] != null) {
            $href = '/faquser/faq_in/' . $data['faq_id'];
        } else {
            $href = '/webboard/webborad_in/' . $data['web_id'];
        }

        return response()->json(
            [
                'status' => 200,
                'message' => 'อัปเดตการอ่านสำเร็จ',
                'href' => $href,
            ]
        );
    }
}

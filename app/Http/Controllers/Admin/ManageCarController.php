<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarDataset;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageCarController extends Controller
{
    public function view_managecar()
    {
        Paginator::useBootstrap();
        $car_dataset = DB::table('car_dataset')
            ->leftJoin('users', 'car_dataset.created_by', '=', 'users.id')
            ->select('car_dataset.*', 'users.name', 'users.lastname')
            // ->orderBy('car_dataset.created_at', 'DESC')
            ->get();

        $engine_fuel_type = DB::table('car_dataset')
            ->select('car_dataset.engine_fuel_type')
            ->orderBy('engine_fuel_type', 'ASC')
            ->whereNotNull('engine_fuel_type')
            ->distinct()
            ->get();

        $transmission_type = DB::table('car_dataset')
            ->select('car_dataset.transmission_type')
            ->orderBy('transmission_type', 'ASC')
            ->whereNotNull('transmission_type')
            ->distinct()
            ->get();

        $driven_wheels = DB::table('car_dataset')
            ->select('car_dataset.driven_wheels')
            ->orderBy('driven_wheels', 'ASC')
            ->whereNotNull('driven_wheels')
            ->distinct()
            ->get();

        $vehicle_size = DB::table('car_dataset')
            ->select('car_dataset.vehicle_size')
            ->orderBy('vehicle_size', 'ASC')
            ->whereNotNull('vehicle_size')
            ->distinct()
            ->get();

        $market_category = DB::table('car_dataset')
            ->select('car_dataset.market_category')
            ->orderBy('market_category', 'ASC')
            ->whereNotNull('market_category')
            ->distinct()
            ->get();

        $vehicle_style = DB::table('car_dataset')
            ->select('car_dataset.vehicle_style')
            ->orderBy('vehicle_style', 'ASC')
            ->whereNotNull('vehicle_style')
            ->distinct()
            ->get();

        // $trashcar = Cars::onlyTrashed()->paginate(3);

        return view('admin.managecar.manacar-view', compact(
            'car_dataset',
            'engine_fuel_type',
            'transmission_type',
            'driven_wheels',
            'vehicle_size',
            'market_category',
            'vehicle_style'
        ));
    }

    public function add_car(Request $request)
    {
        // dd(111111111111111);
        // dd($request->all());
        $make = $request->make;
        $model = $request->model;
        $year = $request->year;
        $engine_hp = $request->engine_hp;
        $engine_cylinders = $request->engine_cylinders;
        $number_doors = $request->number_doors;
        $msrp = $request->msrp;
        $city_mpg = $request->city_mpg;
        $highway_mpg = $request->highway_mpg;
        $popularity = $request->popularity;
        $engine_fuel_type = $request->engine_fuel_type;
        $transmission_type = $request->transmission_type;
        $driven_wheels = $request->driven_wheels;
        $vehicle_size = $request->vehicle_size;
        $market_category = $request->market_category;
        $vehicle_style = $request->vehicle_style;
        $description_car = $request->description_car;
        $car_img = $request->has('car_img');
        $request->validate(
            [
                'make' => 'required',
                // 'car_name' => 'required|unique:cars,name',
                // 'car_price' => 'required',
                // 'car_mpg_city' => 'required',
                // 'car_mpg_hwy' => 'required',
                // // 'car_detail' => 'required',
                // 'car_img' => 'required|mimes:jpeg,png,jpg,gif',
            ],
            [
                'make.required' => 'กรุณากรอกผู้ผลิต',
                // 'car_name.required' => 'กรุณากรอกชื่อรถยนต์',
                // 'car_name.unique' => 'ชื่อรถยนต์ซ้ำครับ'
            ]
        );

        $filename_car = '';

        if ($car_img) {
            $file_imgcar = $request->file('car_img');
            $filename_car = 'car' . time() . '_' . $file_imgcar->getClientOriginalName();
            $file_imgcar->move(public_path('assets/imgcar'), $filename_car);
        }

        $car_dataset = new CarDataset([
            'make' => $make,
            'model' => $model,
            'year' => $year,
            'engine_fuel_type' => $engine_fuel_type,
            'engine_hp' => $engine_hp,
            'engine_cylinders' => $engine_cylinders,
            'transmission_type' => $transmission_type,
            'driven_wheels' => $driven_wheels,
            'number_doors' => $number_doors,
            'market_category' => $market_category,
            'vehicle_size' => $vehicle_size,
            'highway_mpg' => $highway_mpg,
            'city_mpg' => $city_mpg,
            'popularity' => $popularity,
            'msrp' => $msrp,
            'vehicle_style' => $vehicle_style,
            'description_car' => $description_car,
            'imgcar' => $filename_car,
            'created_by' => Auth::user()->id,
        ]);


        $car_dataset->save();

        //บันทึก Log
        Log::create([
            'user_id' => Auth::user()->id,
            'user_type' => Auth::user()->type,
            'text_detail' => 'ได้เพิ่มข้อมูลรถยนต์',
        ]);

        return redirect()->back()->with('success', 'เพิ่มข้อมูลรถยนต์สำเร็จ');
    }

    public function  edit_car($id)
    {
        $car_dataset = DB::table('car_dataset')->where('id_cardataset', $id)->first();
        $engine_fuel_type = DB::table('car_dataset')
            ->select('car_dataset.engine_fuel_type')
            ->orderBy('engine_fuel_type', 'ASC')
            ->whereNotNull('engine_fuel_type')
            ->distinct()
            ->get();

        $transmission_type = DB::table('car_dataset')
            ->select('car_dataset.transmission_type')
            ->orderBy('transmission_type', 'ASC')
            ->whereNotNull('transmission_type')
            ->distinct()
            ->get();

        $driven_wheels = DB::table('car_dataset')
            ->select('car_dataset.driven_wheels')
            ->orderBy('driven_wheels', 'ASC')
            ->whereNotNull('driven_wheels')
            ->distinct()
            ->get();

        $vehicle_size = DB::table('car_dataset')
            ->select('car_dataset.vehicle_size')
            ->orderBy('vehicle_size', 'ASC')
            ->whereNotNull('vehicle_size')
            ->distinct()
            ->get();

        $market_category = DB::table('car_dataset')
            ->select('car_dataset.market_category')
            ->orderBy('market_category', 'ASC')
            ->whereNotNull('market_category')
            ->distinct()
            ->get();

        $vehicle_style = DB::table('car_dataset')
            ->select('car_dataset.vehicle_style')
            ->orderBy('vehicle_style', 'ASC')
            ->whereNotNull('vehicle_style')
            ->distinct()
            ->get();
        return view('admin.managecar.editcar', compact(
            'car_dataset',
            'engine_fuel_type',
            'transmission_type',
            'driven_wheels',
            'vehicle_size',
            'market_category',
            'vehicle_style'
        ));
    }
    public function update_car(Request $request, $id)
    {
        // dd($id, $request->all());

        $make = $request->make;
        $model = $request->model;
        $year = $request->year;
        $engine_hp = $request->engine_hp;
        $engine_cylinders = $request->engine_cylinders;
        $number_doors = $request->number_doors;
        $msrp = $request->msrp;
        $city_mpg = $request->city_mpg;
        $highway_mpg = $request->highway_mpg;
        $popularity = $request->popularity;
        $engine_fuel_type = $request->engine_fuel_type;
        $transmission_type = $request->transmission_type;
        $driven_wheels = $request->driven_wheels;
        $vehicle_size = $request->vehicle_size;
        $market_category = $request->market_category;
        $vehicle_style = $request->vehicle_style;
        $description_car = $request->description_car;
        $car_img = $request->has('car_img');

        $request->validate(
            [
                // 'car_name' => 'required|unique:cars,name',
                'make' => 'required',
            ],
            [
                'make.required' => 'กรุณากรอกชื่อรถยนต์',
            ]
        );


        $img_carname = '';
        if ($car_img) {

            $updateimgcar = $request->file('car_img');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($updateimgcar->getClientOriginalExtension());
            $img_carname = $name_gen . '.' . $img_ext;
            $upload_location = 'assets/imgcar/';
            $updateimgcar->move($upload_location, $img_carname);

            $old_image = $request->car_img_old;

            if (file_exists($upload_location . $old_image)) {
                if ($old_image != '') {
                    unlink($upload_location . $old_image);
                }
            }

            CarDataset::where('id_cardataset', $id)->update([
                'imgcar' => $img_carname,
            ]);
        }
        CarDataset::where('id_cardataset', $id)->update([
            'make' => $make,
            'model' => $model,
            'year' => $year,
            'engine_fuel_type' => $engine_fuel_type,
            'engine_hp' => $engine_hp,
            'engine_cylinders' => $engine_cylinders,
            'transmission_type' => $transmission_type,
            'driven_wheels' => $driven_wheels,
            'number_doors' => $number_doors,
            'market_category' => $market_category,
            'vehicle_size' => $vehicle_size,
            'highway_mpg' => $highway_mpg,
            'city_mpg' => $city_mpg,
            'popularity' => $popularity,
            'msrp' => $msrp,
            'vehicle_style' => $vehicle_style,
            'description_car' => $description_car,
            'imgcar' => $img_carname,
            'created_by' => Auth::user()->id,
        ]);

        //บันทึก Log
        Log::create([
            'user_id' => Auth::user()->id,
            'user_type' => Auth::user()->type,
            'text_detail' => 'ได้แก้ไขข้อมูลรถยนต์',
        ]);


        return redirect()->route('view_managecar')->with('success-updatecar', 'อัปเดตข้อมูลรถยนต์สำเร็จ');
    }

    public function force_delete_car($id)
    {
        // dd($id);
        $forcedeletecar = CarDataset::where('id_cardataset', $id)
            ->first();
        // dd($forcedeletecar);

        $location_path = 'assets/imgcar/';

        if (file_exists($location_path . $forcedeletecar->imgcar)) {
            // dd(11111111);
            if ($forcedeletecar->imgcar != '') {
                unlink($location_path . $forcedeletecar->imgcar);
            }
        }

        $forcedeletecar->delete();

        //บันทึก Log
        Log::create([
            'user_id' => Auth::user()->id,
            'user_type' => Auth::user()->type,
            'text_detail' => 'ได้ลบข้อมูลรถยนต์',
        ]);
        return redirect()->back()->with('success-forcedeletecar', 'ลบข้อมูลถาวรสำเร็จ');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Stock;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use App\Models\History_repair;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show',);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd('fgfd');
        Carbon::parse()->thaidate();
        $user = User::get();
        $inventoryList = Inventory::get();
        $stock1 = Stock::join('inventories', 'inventories.id', '=', 'stocks.sttype')
            ->where('stocks.ststatus', [1])
            ->select(
                "stocks.*",
                'inventories.stname as inventory_name',
            )->get();
        // dd($stock1);
        $stock2 = Stock::join('inventories', 'inventories.id', '=', 'stocks.sttype')
            ->where('stocks.ststatus', [2])
            ->select("stocks.*", 'inventories.stname as inventory_name')->get();
        $stock0 = Stock::join('inventories', 'inventories.id', '=', 'stocks.sttype')
            ->where('stocks.ststatus', [0])
            ->select("stocks.*", 'inventories.stname as inventory_name')->get();
        // dd($data['stock']);
        return view('admin.Inventory.stock', compact('user', 'inventoryList', 'stock1', 'stock2', 'stock0'));
        // dd('dfsdf');
        // $data = Stock::all();
        // $data['inventoryList'] = Inventory::get();
        // return view('admin.Inventory.stock', ['stock' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // dd($request ->all());
        DB::beginTransaction();
        $table = new Stock();
        $table->stid = IdGenerator::generate(['table' => 'stocks', 'field' => 'stid', 'length' => 7, 'prefix' => "IPAS"]);
        // $table->emid =  IdGenerator::generate(['table' => 'users','field' =>'emid' ,'length' => 5, 'prefix' =>"IP"]);
        if ($request->hasFile('stImg')) {
            $image = $request->file('stImg');
            $extention = $image->getClientOriginalExtension();
            $fileName  = time() . '.' . $extention;
            $location = "imgstock/" . $fileName;
            // $img = Image::make($image)->save($location);
            $img =  Image::make($image)->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);
            $table->stimg =  $fileName;
        }
        // dd($table->stimg);

        // if ($request->hasfile('stImg')) {
        //     $file = $request->file('stImg');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extention;
        //     $file->move('imgstock/', $filename);
        //     $table->stimg = $filename;
        // }
        $table->stnumber =  $request->stnumber;
        $table->stamount =  $request->stamount;
        $table->stunit = $request->stunit;
        $table->stname = $request->stname;
        $table->sttype = $request->sttype;
        // $table->stdaybuy = date('Y-m-d', strtotime($request->stdaybuy));
        $stdaybuy1 = $request->stdaybuy;
        $arry1 = explode("/", $stdaybuy1);
        // dd($arry1);
        $day1 = $arry1[2] - 543;
        $table->stdaybuy = $day1 . '-' . $arry1[1] . '-' . $arry1[0];
        // dd($day1);


        // $table->stdaystart = date('Y-m-d', strtotime($request->stdaystart));
        $startyear = $request->stdaystart;
        $arry = explode("/", $startyear);
        // dd($arry);
        $year = $arry[2] - 543;
        $table->stdaystart = $year . '-' . $arry[1] . '-' . $arry[0];

        $table->stdescription =  $request->stdescription;
        $table->stprice = $request->stprice;
        $table->stageuse =  $request->stageuse;

        $stageuse = $request->stageuse;
        $year = $stageuse * 365;
        $table->stageuse = $year;

        $table->stmath = $request->stmath;
        $table->ststatus = $request->ststatus;
        $table->stusers = $request->stusers;
        // dd($table);
        $table->save();
        Alert::success('บันทึกสำเร็จ');
        DB::commit();

        return redirect()->back()->with('success', 'เพิ่มสำเสร็จ');
        // return response()->json();
        // DB::commit();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // dd($id);
        $data = Stock::find($id);
        $user = User::find($id);
        $data->stdaybuy = Carbon::parse($data->stdaybuy)->thaidate('j M Y');
        $data->stdaystart = Carbon::parse($data->stdaystart)->thaidate('j M Y');
        $history = History_repair::where('repair_stid', $data->stid)->join('users', 'users.id', '=', 'history_repairs.repair_name')->get(['history_repairs.*', 'users.fullname']);
        $html = '';
        $count = 0;
        $i = 1;
        // dd($history);
        foreach ($history as $key => $value) {
            if ($count == 3) {
                break;
            }
            $html .= '<tr>';
            $html .= '<td>' . $i++ . '</td>';
            $html .= '<td>' . $value->repair_place . "</td>";
            $html .= '<td>' . $value->repair_start . "</td>";
            $html .= '<td>' . $value->repair_end . "</td>";
            $html .= '<td>' .  number_format($value->repair_cost, 2) . "</td>";
            $html .= '<td>' . $value->fullname . "</td>";
            $html .= '</tr>';
            $count++;
        }
        return response()->json([
            "data" => $data,
            "history" => $html,
        ]);
        // return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // dd('fgvdf');
        $user = User::get();
        $unit = Unit::get();
        $inventoryList = Inventory::where('ststatus', [1])->get();
        $stock = Stock::find($id);
        $stock->stageuse = ($stock->stageuse / 365);
        // dd($stock->stageuse);
        // $stock->stdaystart = Carbon::parse($stock->stdaystart)->thaidate('j/M/Y');
        // dd($data);
        return view('admin.Inventory.editInventory', compact('user', 'unit', 'inventoryList', 'stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Stock::find($id);
        $data->stid = $request->input('stid');
        // if ($request->hasfile('stImg')) {

        //     $destination = 'imgstock/' . $data->stimg;
        //     if (File::exists($destination)) {
        //         File::delete($destination);
        //     }
        //     $file = $request->file('stImg');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extention;
        //     $file->move('imgstock/', $filename);
        //     $data->stimg = $filename;
        // }
        if ($request->hasfile('stImg')) {
            $destination = 'imguse/' . $data->stimg;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $image = $request->file('stImg');
            $extention = $image->getClientOriginalExtension();
            $fileName  = time() . '.' . $extention;
            $location = "imgstock/" . $fileName;
            $img = Image::make($image)->save($location);
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);
            $data->stimg =  $fileName;
        }
        $data->stnumber = $request->input('stnumber');
        $data->stamount = $request->input('stamount');
        $data->stunit = $request->input('stunit');
        $data->stname = $request->input('stname');
        $data->sttype = $request->input('sttype');
        // $data->stdaybuy = date('Y-m-d', strtotime($request->stdaybuy));
        $stdaybuy1 = $request->input('stdaybuy');
        $arry1 = explode("/", $stdaybuy1);
        //   dd($arry1);
        $day1 = $arry1[2] - 543;
        $data->stdaybuy = $day1 . '-' . $arry1[1] . '-' . $arry1[0];
        // dd($data->stdaybuy);


        // $data->stdaystart = date('Y-m-d', strtotime($request->stdaystart));
        $startyear = $request->input('stdaystart');
        $arry = explode("/", $startyear);
        // dd($arry);
        $year1 = $arry[2] - 543;
        $data->stdaystart = $year1 . '-' . $arry[1] . '-' . $arry[0];
        // dd($year1);


        // $data->stdaybuy = date('Y-m-d', strtotime($request->input('stdaybuy')));
        // $data->stdaystart = date('Y-m-d', strtotime($request->input('stdaystart')));
        $data->stdescription = $request->input('stdescription');
        $data->stprice = $request->input('stprice');

        $stageuse = $request->stageuse;
        $year = $stageuse * 365;
        $data->stageuse = $year;

        // $data->stageuse = $request->input('stageuse');
        // dd($request->stusers);
        $data->stusers = $request->input('stusers');
        $data->ststatus = $request->input('ststatus');
        $data->stmath = $request->input('stmath');
        // dd($data);
        $data->update();
        Alert::success('แก้ไขเรียบร้อย');
        return redirect()->route('stock')->with('status', 'Student Updated Successfully');
    }

    public function updatestatus(Request $request)
    {
        $student = Stock::find($request->input('id'));
        $student->ststatus = $request->input('ststatus');
        $student->update();
        Alert::success('แก้ไขเรียบร้อย');
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

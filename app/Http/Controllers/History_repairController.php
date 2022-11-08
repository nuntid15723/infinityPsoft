<?php

namespace App\Http\Controllers;

use App\Models\History_repair;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class History_repairController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd('fgvsdfg');
        $user = User::get();
        $History = History_repair::join('stocks', 'stocks.id', '=', 'history_repairs.id');
        return view('admin.Inventory.stock', compact('History', 'user'));
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
        // $user=Auth::user();
        // dd('dfmls');
        $table = new History_repair();
        $table->repair_stid = $request->repair_stid;
        $table->repair_name = $request->repair_name;  // Auth::user()->id;
        $table->repair_place =   $request->repair_place;
        $table->repair_start = date('Y-m-d', strtotime($request->repair_start));
        $table->repair_end =  date('Y-m-d', strtotime($request->repair_end));
        $table->repair_cost = $request->repair_cost;
        $table->save();
        Alert::success('บันทึกเรียบร้อย');
        // dd($request->all());
        $student = Stock::find($request->input('id'));
        $student->ststatus = 1;
        // dd($request->all());
        $student->save();
        Alert::success('แก้ไขเรียบร้อย');
        return redirect()->back()->with('status', 'Student Added Successfully');
    }
    // public function storest(Request $request)
    // {
    //     //
    //     $table = new Stock();

    //     $table->repair_cost = $request->repair_cost;
    //     $table->save();
    //     return redirect()->back()->with('status', 'Student Added Successfully');
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $data = History_repair::find($id);
        $data->repair_start = Carbon::parse($data->repair_start)->thaidate('j M Y');
        $data->repair_end = Carbon::parse($data->repair_end)->thaidate('j M Y');
        return response()->json($data);
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
        $table = new History_repair();
        $table->repair_cost = $request->repair_stid;
        $table->repair_name = $request->repair_name;  // Auth::user()->id;
        $table->repair_place =   $request->repair_place;
        $table->repair_start = date('Y-m-d', strtotime($request->repair_start));
        $table->repair_end =  date('Y-m-d', strtotime($request->repair_end));
        $table->repair_cost = $request->repair_cost;
        $table->save();
        // dd($request->all());
        $student = Stock::find($request->input('id'));
        $student->ststatus = 1;
        // dd($request->all());
        $student->save();
        Alert::success('บันทึกเรียบร้อย');
        return redirect()->back()->with('status', 'Student Added Successfully');
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

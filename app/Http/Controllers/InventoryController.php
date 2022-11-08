<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class InventoryController extends Controller
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
        $data = Inventory::all();
        $stid = IdGenerator::generate(['table' => 'inventories', 'field' => 'stid', 'length' => 6, 'prefix' => "ST"]);
        return view('admin.setting.stocksetting', compact('data', 'stid'));
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
        // dd($request);
        DB::beginTransaction();
        $data = new Inventory();
        $data->stid = IdGenerator::generate(['table' => 'inventories', 'field' => 'stid', 'length' => 6, 'prefix' => "ST"]);
        $data->stname  = $request->stname;
        $data->ststatus  = 1;
        // add other fields
        $data->save();
        DB::commit();
        return redirect()->back()->with('status', 'Student Added Successfully');
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
        $data = Inventory::find($id);
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
        $data = Inventory::find($id);
        dd($data);
        return view('admin.setting.stocksetting', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $student = Inventory::find($request->input('Id'));
        $student->stid = $request->input('stid');
        $student->stname = $request->input('stname');
        $student->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }
    public function updatee(Request $request)
    {
        try {
            $student = Inventory::find($request->input('id'));
            $student->ststatus = $request->input('ststatus');
            $student->update();
            // return redirect()->back()->with('status', 'Student Updated Successfully');
            return response()->json([
                'successful' => TRUE,
                'msg' => 'Student Updated Successfully'
            ]);
            // return redirect()->back()->with('status', 'Student Updated Successfully');
        } catch (\Throwable $th) {
            DB::rollback();
            // dd($th->getMessage());
            return response()->json([
                'successful' => False,
                'msg' => $th->getMessage()
            ]);
            // return redirect()->back()->with('error', 'ไม่สำเร็จ');
        }
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

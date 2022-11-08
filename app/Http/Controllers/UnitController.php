<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class UnitController extends Controller
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
        $data = Unit::all();
        $unid = IdGenerator::generate(['table' => 'units', 'field' => 'unid', 'length' => 6, 'prefix' => "UN"]);
        return view('admin.setting.unitstock', compact('data', 'unid'));
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
        // dd($request->unId);
        DB::beginTransaction();
        $data = new Unit();
        $data->unid =  IdGenerator::generate(['table' => 'units', 'field' => 'unid', 'length' => 6, 'prefix' => "UN"]);
        $data->unname  = $request->unname;
        $data->unstatus  = 1;
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
        $data = Unit::find($id);
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
        $data = Unit::find($id);
        dd($data);
        return view('admin.setting.unitstock', compact('data'));
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
        //
        $student = Unit::find($request->input('Id'));
        $student->unid = $request->input('unId');
        $student->unname = $request->input('unname');
        $student->update();
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }
    public function updatee(Request $request)
    {
        try {
            //
            $student = Unit::find($request->input('id'));
            $student->unstatus = $request->input('unstatus');
            $student->update();
            // return redirect()->back()->with('status','Student Updated Successfully');
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

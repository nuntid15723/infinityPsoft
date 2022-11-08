<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class departmentController extends Controller
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
        // dd('fgdfg');
        $data = Department::all();
        $dpid = IdGenerator::generate(['table' => 'department', 'field' => 'dpid', 'length' => 6, 'prefix' => "DP"]);
        // dd( $data['dpid1']);
        return view('admin.setting.departsetting',compact('data','dpid'));
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
    public function storedepart(Request $request)
    {
        //
        // $data['dpid'] = IdGenerator::generate(['table' => 'department', 'field' => 'dpid', 'length' => 7, 'prefix' => "DP"]);
        // dd($request->dpname);
        DB::beginTransaction();
        $data = new Department();
        $data->dpid = IdGenerator::generate(['table' => 'department', 'field' => 'dpid', 'length' => 6, 'prefix' => "DP"]);
        $data->dpname  = $request->dpname;
        $data->dpstatus  = 1;
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
        $data = Department::find($id);
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
        $data = Department::find($id);
        return view('admin.setting.departsetting', compact('data'));
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
        // dd($id);
        // $data = Department::find($id);
        // $data->dpid = $request->dpId;
        // $data->dpname  = $request->dpname;
        // $data->update();
        // return redirect()->back()->with('status', 'Student Added Successfully');
        // dd($request->all());
        $student = Department::find($request->input('Id'));
        $student->dpid = $request->input('dpId');
        $student->dpname = $request->input('dpname');
        $student->update();
        Alert::success('บันทึกเรียบร้อย');
        return redirect()->back()->with('status', 'Student Updated Successfully');
    }
    public function updatestatus(Request $request)
    {
        // dd($request->id);
        try {
            $student = Department::find($request->id);
            $student->dpstatus = $request->input('dpstatus');
            // dd($request->all());
            $student->update();
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

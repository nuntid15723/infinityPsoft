<?php

namespace App\Http\Controllers;

use App\Events\Userevent;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Department;
use App\Models\NotifyUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show', 'edit', 'update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd('dfvcasdf');
        Carbon::parse()->thaidate();
        $leaveList = Leave::join('users', 'users.emid', '=', 'leaves.emid')
            ->join('department', 'department.id', '=', 'leaves.ladepartment')
            ->orderBy('leaves.id', 'DESC')
            ->where('leaves.pnid', [2])
            ->select(
                'leaves.id as id',
                'leaves.pnid as pnid',
                'leaves.emid as emid',
                'users.fullname as fullname',
                'leaves.ladepartment as department',
                'users.phonenumber as phonenumber',
                'leaves.daystartla as daystartla',
                'leaves.dayendla as dayendla',
                'leaves.typeleave as typeleave',
                'leaves.timestart as timestart',
                'leaves.timeend as timeend',
                'department.dpname as dpname',
            )->get();
        // dd($leaveList);
        $leaveList1 = Leave::join('users', 'users.emid', '=', 'leaves.emid')
            ->join('department', 'department.id', '=', 'leaves.ladepartment')
            ->orderBy('leaves.id', 'DESC')
            ->where('leaves.pnid', [1])
            ->select(
                'leaves.id as id',
                'leaves.pnid as pnid',
                'leaves.emid as emid',
                'users.fullname as fullname',
                'leaves.ladepartment as department',
                'users.phonenumber as phonenumber',
                'leaves.daystartla as daystartla',
                'leaves.dayendla as dayendla',
                'leaves.typeleave as typeleave',
                'leaves.timestart as timestart',
                'leaves.timeend as timeend',
                'department.dpname as dpname',
            )->get();
        // dd($leaveList1);
        $leaveList2 = Leave::join('users', 'users.emid', '=', 'leaves.emid')
            ->join('department', 'department.id', '=', 'leaves.ladepartment')
            ->orderBy('leaves.id', 'DESC')
            ->where('leaves.pnid', [0])
            ->select(
                'leaves.id as id',
                'leaves.pnid as pnid',
                'leaves.emid as emid',
                'users.fullname as fullname',
                'leaves.ladepartment as department',
                'users.phonenumber as phonenumber',
                'leaves.daystartla as daystartla',
                'leaves.dayendla as dayendla',
                'leaves.typeleave as typeleave',
                'leaves.timestart as timestart',
                'leaves.timeend as timeend',
                'department.dpname as dpname',
            )->get();
        // dd($useList);
        // $leaveList = Leave::all();
        // dd($leaveList);
        $departmentList = Department::all();
        return view('admin.sumleavework', compact('leaveList', 'leaveList1', 'leaveList2', 'departmentList'));
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
        {
            try {
                // dd($request->all());
                // dd('dvfdvf');
                DB::beginTransaction();
                $table = new Leave();
                $table->emid =  $request->emid;
                $table->user_id =  $request->user_id;
                // $table->pnid =  2;
                $table->pnid =  1;
                $table->ladepartment =  $request->ladepartment;
                $table->email = $request->email;
                $table->typeleave = $request->typeleave;
                $table->timestart =  $request->timestart;

                if ($request->hasfile('laimg')) {
                    $file = $request->file('laimg');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extention;
                    $file->move('imgbank/', $filename);
                    $table->laimg = $filename;
                }
                $table->timeend =  $request->timeend;

                $daystartla = $request->daystartla;
                $arry1 = explode("/", $daystartla);
                // dd($arry1);
                $day1 = $arry1[2] - 543;
                $table->daystartla = $day1 . '-' . $arry1[1] . '-' . $arry1[0];
                // dd($day1);


                // $table->stdaystart = date('Y-m-d', strtotime($request->stdaystart));

                // if ($request->dayendla = null) {
                //     $table->dayendla = $table->daystartla;
                // } else {
                $dayendla = $request->dayendla;
                if ($dayendla == null) {
                    $daystartla;
                    $arry = explode("/", $daystartla);
                    // dd($arry);
                    $year = $arry[2] - 543;
                    $table->dayendla = $year . '-' . $arry[1] . '-' . $arry[0];
                } else {
                    $arry = explode("/", $dayendla);
                    // dd($arry);
                    $year = $arry[2] - 543;

                    $table->dayendla = $year . '-' . $arry[1] . '-' . $arry[0];
                }
                // dd($request->all());
                // $table->daystartla = date('Y-m-d', strtotime($request->daystartla));
                // $table->dayendla = date('Y-m-d', strtotime($request->dayendla));
                // dd( $table->dayendla);
                $table->reasonla =  $request->reasonla;
                $table->save();
                DB::commit();
                Alert::success('บันทึกเรียบร้อย');
                return redirect()->route('absent')->with('success', 'เพิ่มสำเสร็จ');
                // return response()->json([
                //     'successful' => true
                // ]);
                // DB::commit();
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
        // dd("asdasd");
        $data = Leave::find($id);
        $leave = Leave::select(
            'leaves.id as id',
            'leaves.emid as emid',
            'leaves.pnid as pnid',
            'users.fullname as fullname',
            'leaves.ladepartment as department',
            'users.phonenumber as phonenumber',
            'leaves.daystartla as daystartla',
            'leaves.dayendla as dayendla',
            'leaves.typeleave as typeleave',
            'leaves.timestart as timestart',
            'leaves.timeend as timeend',
        )
            ->join('users', 'leaves.user_id', 'users.id')
            ->where('leaves.emid', $data->emid)
            ->orderBy('leaves.id', 'DESC')->limit(3)
            ->get();
        // dd($leave);
        // $leave = Leave::whereNotIn('pnid',[2])->get();
        $data->daystartla = Carbon::parse($data->daystartla)->thaidate('j M Y');
        $data->dayendla = Carbon::parse($data->dayendla)->thaidate('j M Y');
        $data->full_name = $leave[0]->fullname;
        $data->dp_name = $leave[0]->department;

        $html = '';
        $count = 0;
        foreach ($leave as $key => $value) {
            if ($count == 3) {
                break;
            }
            $html .= '<tr>';
            $html .= '<td>' . $value->fullname . '</td>';
            $html .= '<td>';
            if ($value->typeleave == 1) {
                $html .= "ลากิจ";
            } else if ($value->typeleave == 2) {
                $html .= "ลาพักร้อน";
            } else {
                $html .= "ลาป่วย";
            }
            $html .= '</td>';
            $html .= '<td>' . $data->daystartla . "</td>";
            $html .= '<td>' . $data->dayendla . "</td>";
            $html .= '<td><span>';
            if ($value->timestart == 1) {
                $html .= "ทั้งวัน";
            } elseif ($value->timestart == 2) {
                $html .= "ครึ่งเช้า";
            } else {
                $html .= 'ครึ่งบ่าย';
            }
            if ($value->timeend == 0) {
                $html .= "(ลาเต็ม)";
            } elseif ($value->timeend == 1) {
                $html .= "(1ชั่วโมง)";
            } elseif ($value->timeend == 2) {
                $html .= "(2ชั่วโมง)";
            } else {
                $html .= "(3ชั่วโมง)";
            }
            $html .= '</span></td>';
            $html .= '<td>';
            if ($value->pnid == 1) {
                $html .= '<div class="chip-body">';
                $html .= '<div class="chip-text" style="color: #058240">' . 'อนุมัติ' . '</div>';
                $html .= '</div>';
            } elseif ($value->pnid == 2) {
                $html .= '<div class="chip-body">';
                $html .= '<div class="chip-text" style="color: #ff9f43">' . 'รออนุมัติ' . '</div>';
                $html .= '</div>';
            } else {
                $html .= '<div class="chip-body">';
                $html .= '<div class="chip-text" style="color: red">' . 'ไม่อนุมัติ' . '</div>';
                $html .= '</div>';
            }
            $html .= '</td>';
            $html .= '</tr>';
            $count++;
        }
        return response()->json([
            "data" => $data,
            "leave" => $html,

        ]);
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
        $data = Leave::find($id);
        return view('admin.sumleavework', compact('data'));
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

        // dd($request->all());
        $student = Leave::find($request->input('id'));
        $student->pnid = $request->pnid;
        // $student->user_id = ($request->input('user_id'));
        // $student->typeleave = ($request->input('typeleave'));
        $student->update();
        $pnid = request()->pnid;
        $id = request()->id;
        $typeleave = request()->typeleave;

        $notify = new NotifyUser();
        $notify->user_id = $student->user_id;
        $notify->pnid = $pnid;
        $notify->type = $student->typeleave;
        // dd($request->all($typeleave));
        $notify->save();
        event(new Userevent($pnid, $typeleave, $notify->user_id));
        // dd($pnid);
        Alert::success('บันทึกเรียบร้อย');

        return response()->json();
        // dd($request->all());
        // return redirect()->route('sumleavework')->with('status', 'Student Updated Successfully');
    }
    // public function updateadmin(Request $request)
    // {

    //     // dd($request->all());
    //     $student = Leave::find($request->input('id'));
    //     $student->pnid = 1;
    //     $student->update();
    //     Alert::success('บันทึกเรียบร้อย');
    //     return response()->json();
    //     // dd($request->all());
    //     // return redirect()->back()->with('status', 'Student Updated Successfully');
    // }

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

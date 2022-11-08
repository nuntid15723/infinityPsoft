<?php

namespace App\Http\Controllers\dashboard;

use App\Events\Adminevent;
use App\Events\Userevent;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Leave;
use App\Models\Notify;
use App\Models\NotifyUser;
use App\Models\Salary;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OffersNotification;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Date;
use Pusher\Pusher;

class UseDashController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('empolyee')->except('show');
    // }
    public function index()
    {
        $count_leavesum1 = 0;
        $count_leavesum2 = 0;
        $count_leavesum3 = 0;
        $count_leavesum4 = 0;
        $leave = Leave::where('leaves.emid', '=', Auth::user()->emid)->get();
        $leaves1 = Leave::where('leaves.emid', '=', Auth::user()->emid)->where('leaves.typeleave', [1])->get();
        $leaves2 = Leave::where('leaves.emid', '=', Auth::user()->emid)->where('leaves.typeleave', [2])->get();
        $leaves3 = Leave::where('leaves.emid', '=', Auth::user()->emid)->where('leaves.typeleave', [3])->get();
        $leaves4 = Salary::where('salaries.emid', '=', Auth::user()->id)->get();
        $count_leavesum1 = $leaves1->count();
        $count_leavesum2 = $leaves2->count();
        $count_leavesum3 = $leaves3->count();
        $count_leavesum4 = $leaves4->count();

        $leavstatus = Leave::get();
        $leaveListAll = Leave::join('users', 'users.emid', '=', 'leaves.emid')
            ->join('department', 'department.id', '=', 'leaves.ladepartment')
            ->where('leaves.emid', [Auth::user()->emid])
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
            )->orderBy('leaves.id', 'DESC')->limit(5)->get();
        $departList = Department::get();
        // dd($months);
        // $leavstatus->full_name = $leaveListAll[0]->fullname;
        // dd('leave');
        return view('user.dashboard', compact('departList', 'leavstatus', 'leaveListAll', 'count_leavesum1', 'count_leavesum2', 'count_leavesum3', 'count_leavesum4', 'leave'));
    }
    // public function chart($type, $start_date, $end_date)
    function getDate(Request $request)
    {
        $date = $request->datepicker;
        return "chosen date is: " . $date;
    }

    public function chart($year)
    {
        // dd($year);
        // $year = intval($year)-543;
        $year = intval($year);

        // dd($year);
        $months = collect();
        $round_l1 = collect();
        $round_l2 = collect();
        $round_l3 = collect();
        $period = new DatePeriod(
            new DateTime(date(strval($year) . '-01-01')),
            new DateInterval('P1M'),
            new DateTime(date(strval($year) . '-12-31')),
        );
        foreach ($period as $key => $value) {
            // dump($value->format('m'));
            $a = Leave::whereNotIn('pnid', [0, 3])->whereYear('created_at', $value->format('Y'))->whereMonth('created_at', $value->format('m'))->where('leaves.emid', '=', Auth::user()->emid)->where('typeleave', [1,])->count('typeleave');
            $b = Leave::whereNotIn('pnid', [0, 3])->whereYear('created_at', $value->format('Y'))->whereMonth('created_at', $value->format('m'))->where('leaves.emid', '=', Auth::user()->emid)->where('typeleave', [2,])->count('typeleave');
            $c = Leave::whereNotIn('pnid', [0, 3])->whereYear('created_at', $value->format('Y'))->whereMonth('created_at', $value->format('m'))->where('leaves.emid', '=', Auth::user()->emid)->where('typeleave', [3,])->count('typeleave');

            // $val = [
            //     'round_l1' => $round_l1,
            //     'round_l2' => $round_l2,
            //     'round_l3' => $round_l3,
            // ];
            $months->push(Carbon::parse($value->format('Y-m-d'))->thaidate('M'));
            $round_l1->push($a);
            $round_l2->push($b);
            $round_l3->push($c);
        }
        return response()->json([
            'success' => true,
            'months' => $months,
            'round_l1' => $round_l1,
            'round_l2' => $round_l2,
            'round_l3' => $round_l3,
            'year' => $year,
            // dd($year)
        ]);
        // }
    }

    public function profile()
    {
        $dp = Department::get();
        $stockList = User::join('stocks', 'stocks.stusers', '=', 'users.id')->where('users.id', '=', Auth::user()->id)->get();
        $departList = User::join('department', 'department.id', '=', 'users.department')
            // ->join('stocks', 'stocks.stusers', '=', 'users.id')
            ->where('users.id', '=', Auth::user()->id)
            // ->select('stocks.stusers')
            ->first();
        // dd($departList);
        return view('user.profile', compact('departList', 'dp', 'stockList'));
    }
    public function updateprofile(Request $request)
    {
        try {
            // dd($request->all());

            $table = User::find($request->id);
            if ($request->hasfile('emImg')) {
                $destination = 'imguse/' . $table->emimg;
                $image = $request->file('emImg');
                $extention = $image->getClientOriginalExtension();
                $fileName  = time() . '.' . $extention;
                $location = "imguse/" . $fileName;
                $img = Image::make($image)->save($location);
                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($location);
                $table->emimg = $fileName;
                $table->save();
                File::delete($destination);
            }
            // $table->save();
            //  DB::commit();
            Alert::success('แก้ไขเรียบร้อย');
            return redirect()->route('profile')->with('success', 'เพิ่มสำเสร็จ');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'ไม่สำเร็จ');
        }
    }
    public function absent()
    {
        $data['departList'] = Department::get();
        $data['departmentList'] = Department::where('dpstatus', [1])->get();
        return view('user.absent', $data);
    }
    public function history()
    {
        $leavstatus = Leave::get();
        $leaveListAll = Leave::join('users', 'users.emid', '=', 'leaves.emid')
            ->join('department', 'department.id', '=', 'leaves.ladepartment')
            ->where('leaves.emid', [Auth::user()->emid])->where('leaves.pnid', [2, 3])
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
            )->orderBy('leaves.id')->get();
        $leaveListAllow = Leave::join('users', 'users.emid', '=', 'leaves.emid')
            ->join('department', 'department.id', '=', 'leaves.ladepartment')
            ->where('leaves.emid', [Auth::user()->emid])
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
        $leaveListNot = Leave::join('users', 'users.emid', '=', 'leaves.emid')
            ->join('department', 'department.id', '=', 'leaves.ladepartment')
            ->where('leaves.emid', [Auth::user()->emid])
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
        $departList = Department::get();
        // $leavstatus->full_name = $leaveListAll[0]->fullname;

        return view('user.history', compact('leaveListAll', 'departList', 'leaveListAllow', 'leaveListNot', 'leavstatus',));
    }
    public function history1()
    {
        $leaveListAll = Leave::join('users', 'users.emid', '=', 'leaves.emid')
            ->join('department', 'department.id', '=', 'leaves.ladepartment')
            ->where('leaves.emid', [Auth::user()->emid])
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
        $leaveListAllow = Leave::join('users', 'users.emid', '=', 'leaves.emid')
            ->join('department', 'department.id', '=', 'leaves.ladepartment')
            ->where('leaves.emid', [Auth::user()->emid])
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
        $leaveListNot = Leave::join('users', 'users.emid', '=', 'leaves.emid')
            ->join('department', 'department.id', '=', 'leaves.ladepartment')
            ->where('leaves.emid', [Auth::user()->emid])
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
        $departList = Department::get();
        return view('user.history1', compact('leaveListAll', 'departList', 'leaveListAllow', 'leaveListNot'));
    }
    public function updateuse(Request $request)
    {
        // dd($request->all());
        $student = Leave::find($request->input('id'));
        $student->pnid = $request->input('pnid');
        $student->update();
        Alert::success('บันทึกเรียบร้อย');
        return response()->json();
        // dd($request->all());
        // return redirect()->back()->with('status', 'Student Updated Successfully');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeuse(Request $request)
    {
        //
        try {
            DB::beginTransaction();
            $table = new Leave();
            $table->emid =  $request->emid;
            $table->user_id =  $request->user_id;
            $table->pnid =  2;
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
            $day1 = $arry1[2] - 543;
            $table->daystartla = $day1 . '-' . $arry1[1] . '-' . $arry1[0];
            $dayendla = $request->dayendla;
            $arry = explode("/", $dayendla);
            $year = $arry[2] - 543;
            $table->dayendla = $year . '-' . $arry[1] . '-' . $arry[0];
            $table->reasonla =  $request->reasonla;
            $table->save();
            // $user = Leave::join('users', 'users.id', '=', 'leaves.user_id')->select('users.fullname')->first();
            // dd($user);
            // $arr_name = $request->user_id;

            $user_id = request()->user_id;
            $user = User::where('id', $user_id)->first();
            $user_fullname = $user->fullname;
            $time = date('Y-m-d H:i');
            $typeleave = request()->typeleave;

            $notify = new Notify;
            $notify->user_id = Auth::user()->id;
            $notify->type = $typeleave;
            $notify->save();

            event(new Adminevent($typeleave, $notify->user_leave->fullname, $notify->created_at));

            DB::commit();
            Alert::success('บันทึกเรียบร้อย');
            // DB::commit();
            return redirect()->route('history')->with('success', 'เพิ่มสำเสร็จ');
            // return response()->json([
            //     'successful' => true
            // ]);
            // DB::commit();
        } catch (\Throwable $th) {
            // DB::rollback();
            // // dd($th->getMessage());
            // return response()->json([
            //     'successful' => False,
            //     'msg' => $th->getMessage()
            // ]);
            return redirect()->back()->with('error', 'ไม่สำเร็จ');
        }
    }
    public function show()
    {
        $data = NotifyUser::select('notify_users.user_id', 'notify_users.pnid', 'notify_users.type', 'notify_users.created_at')
        ->where([['status_read', '0'], ['user_id', Auth::user()->id]])
        ->get();
        // dd($data);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        NotifyUser::where('status_read', 0)->where('user_id',Auth::user()->id)->update(['status_read' => 1]);
        return response()->json([
            'success' => true
        ]);
    }
}

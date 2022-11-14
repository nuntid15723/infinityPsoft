<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Roundsalary;
use App\Models\Salary;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Foreach_;
use RealRashid\SweetAlert\Facades\Alert;

class salaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $users = User::all();
        $users = User::whereNotIn('roleid', [2])->get();
        // $sum_salary = $users->sum('salary');
        $lastatus = Roundsalary::orderBy('id', 'DESC')->first();
        $roundhistory = Roundsalary::get();
        foreach ($roundhistory as $key => $value) {
            $showsalary = Salary::where('roundsalaries_id', $value->id)->sum('amount');
            $downsalary = Salary::where('roundsalaries_id', $value->id)->sum('sumdown');
            $roundhistory[$key]['round_salary'] = $showsalary;
            $roundhistory[$key]['round_salarydown'] = $downsalary;
        }
        // dd($roundhistory);
        // dd($lastatus->rlname);
        $sum_salary = 0;
        $amount_sum = 0;
        $amount_salary = 0;
        $roundsum_salary = 0;
        $roundamount_sum = 0;
        if (!empty($lastatus)  && $lastatus->rlstatus == 0) {
            $showsalary = Salary::where('roundsalaries_id', $lastatus->id)->get();
            $lastatus->roundstart = Carbon::parse($lastatus->roundstart)->thaidate('j M Y');
            $lastatus->roundend = Carbon::parse($lastatus->roundend)->thaidate('j M Y');
            $lastatus->rounddate = Carbon::parse($lastatus->rounddate)->thaidate('j M Y');
            // dd( $lastatus->rounddate);
            $sum_salary = $showsalary->sum('salary');
            $amount_sum = $showsalary->sum('sumdown');
            $count_salary = 0;
            foreach ($showsalary as $salary_sum) {
                $count_salary += $salary_sum->salary;
            }
            $count_salaryfall = 0;
            foreach ($showsalary as $salaryfall) {
                $count_salaryfall += $salaryfall->sumdown;
            }
            $amount_salary = ($count_salary - $count_salaryfall);
            // dd( $showsalary);
        } elseif (!empty($lastatus)) {
            $showsalary = Salary::where('roundsalaries_id', $value->id)->get();
            $roundsum_salary = $showsalary->sum('salary');
            $roundamount_sum = $showsalary->sum('sumdown');
            // dd($showsalary);
        } else {
            $showsalary = NULL;
        }
        return view('admin.salary', compact('users', 'sum_salary', 'lastatus', 'showsalary', 'amount_salary', 'amount_sum', 'roundhistory', 'roundsum_salary', 'roundamount_sum'));
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
        $data = Salary::find($id);
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
    public function update(Request $request)
    {
        $student = Salary::find($request->input('id'));
        $student->tax = $request->input('tax');
        $student->taxfall = str_replace(",", "", $request->input('taxfall'));
        $student->leave_muchfall = str_replace(",", "", $request->input('leave_muchfall'));
        $student->leave_much = str_replace(",", "", $request->input('leave_much'));
        $student->work_latefall = str_replace(",", "", $request->input('work_latefall'));
        $student->work_late = str_replace(",", "", $request->input('work_late'));
        $student->not_workfall = str_replace(",", "", $request->input('not_workfall'));
        $student->not_work = str_replace(",", "", $request->input('not_work'));
        $student->sumdown = str_replace(",", "", $request->input('sumdown'));
        $student->note = $request->input('note');
        $student->amount = str_replace(",", "", $request->input('amount'));
        $student->update();
        Alert::success('บันทึกเรียบร้อย');
        return redirect()->back()->with('status', 'Student Updated Successfully');
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

    public function addsalary(Request $request)
    {
        // dd($request->roundstart);

        $round = new Roundsalary;


        // $round->roundstart = date('Y-m-d', strtotime($request->roundstart));
        $roundstart = $request->roundstart;
        $arry1 = explode("/", $roundstart);
        $day1 = $arry1[2] - 543;
        $round->roundstart = $day1 . '-' . $arry1[1] . '-' . $arry1[0];

        // $round->roundend = date('Y-m-d', strtotime($request->roundend));
        $roundend = $request->roundend;
        $arry1 = explode("/", $roundend);
        $day1 = $arry1[2] - 543;
        $round->roundend = $day1 . '-' . $arry1[1] . '-' . $arry1[0];

        // $round->rounddate = date('Y-m-d', strtotime($request->rounddate));
        $rounddate = $request->rounddate;
        $arry1 = explode("/", $rounddate);
        $day1 = $arry1[2] - 543;
        $round->rounddate = $day1 . '-' . $arry1[1] . '-' . $arry1[0];

        $date = "วัน " . Carbon::parse($round->roundstart)->thaidate('j M Y') . " ถึง " . Carbon::parse($round->roundend)->thaidate('j M Y');
        $round->rlstatus = 0;
        $round->rlname = $date;

        $round->save();
        $users = User::whereNotIn('roleid', [0, 2])->get();
        // dd($users);
        foreach ($users as $key => $value) {
            $salary = new Salary;
            $salary->emid = $value->id;
            $salary->fullname = $value->fullname;
            $salary->payment = $value->bankname;
            $salary->salary = $value->salary;
            $salary->sumdown = 0;
            $salary->roundsalaries_id = $round->id;
            $salary->save();
        }
        $showsalary = Salary::where('roundsalaries_id', $round->id)->get();
        $viewModel = [
            'successful'    =>  true,
            'data'  =>  $showsalary
        ];
        return response()->json($viewModel);
    }
}

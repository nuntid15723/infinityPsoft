<?php

namespace App\Http\Controllers;

use App\Mail\Mail as MailMail;
use App\Models\Department;
use App\Models\Roundsalary;
use App\Models\Slip;
use App\Models\User;
use App\Models\Salary;
use Illuminate\Support\Facades\DB;
use PDF;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    //
    public function slip($id)
    {
        // dd($id);
        // $user = User::find($id);
        // dd($user);
        $slip = Slip::get();
        // $roundsalary = Roundsalary::get();
        $showsalary = Salary::where('salaries.id', '=', $id)
            ->join('users', 'users.id', '=', 'salaries.emid')
            ->join('department', 'department.id', '=', 'users.department')
            ->join('roundsalaries', 'roundsalaries.id', '=', 'roundsalaries_id')
            ->select(
                'users.fullname',
                'users.email',
                'department.dpname',
                'roundsalaries.roundend',
                'roundsalaries.roundstart',
                'roundsalaries.rounddate',
                'salaries.id',
                'salaries.salary',
                'salaries.tax',
                'salaries.taxfall',
                'salaries.leave_much',
                'salaries.work_late',
                'salaries.not_work',
                'salaries.sumdown',
            )->first();

        // ->select('salaries.*', 'users.fullname as use_name')->orderBy('salaries.id', 'DESC')->first();
        // dd($showsalary);
        // $pdf = PDF::loadView('PDF/simple')->setPaper('A4', 'landscape');
        $data = [
            // 'user' => $user,
            'slip' => $slip,
            'showsalary' => $showsalary,
            // 'roundsalary' => $roundsalary,
        ];
        // dd($data);
        $pdf = PDF::loadView('PDF/simple', $data)->setPaper('A4');
        $pdf->getDomPDF()->set_option("enable_php", true);
        // Storage::put('PDF/ใบแจ้งเงินเดือน_' . $showsalary->fullname . '_' . date('Y-m-d') . '.pdf', $pdf->output());

        return $pdf->stream('PDF/ใบแจ้งเงินเดือน_' . $showsalary->fullname . '_' . date('Y-m-d') . '.pdf');
        // return $pdf->download('ใบแจ้งเงินเดือน_' . $showsalary->fullname . '_' . date('Y-m-d') . '.pdf'); // download
        // return $pdf->save('PDF/ใบแจ้งเงินเดือน_' . $showsalary->fullname . '_' . date('Y-m-d') . '.pdf'); // save

        // return view('PDF.simple', compact('department', 'slip', 'showsalary'));
    }

    public function sendMail($id)
    {
        try {
            $round = Roundsalary::find($id);
            $salary = Salary::select('salaries.id','users.fullname','users.email','users.fullname')
           ->join('users','salaries.emid','users.id')
            ->where('roundsalaries_id',$round->id)
            ->get();
            // dd($salary);
            foreach ($salary as $key => $value) {
                $data = [
                    'salary_id' => $value->id,
                    'email' => $value->email,
                    'name' => $value->fullname
                ];

                Mail::to($value->email)->send(new MailMail($data));
                sleep(0);
            }

            $round->rlstatus = 1;
            $round->save();

            return response()->json([
                'success'   =>  true
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

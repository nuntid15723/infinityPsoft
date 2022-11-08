<?php

namespace App\Http\Controllers;

use App\Exports\LeaveExport;
use App\Imports\LeaveImport;
use App\Models\Leave;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LeaveExportController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        $users = Leave::get();

        return view('users', compact('users'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new LeaveExport, 'leave.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        Excel::import(new LeaveImport, request()->file('file'));

        return back();
    }
}

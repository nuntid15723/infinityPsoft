<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller

{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        $users = User::get();

        return view('users', compact('users'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new UsersExport, 'employee.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        Excel::import(new UsersImport, request()->file('file'));

        return back();
    }
}

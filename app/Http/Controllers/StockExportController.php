<?php

namespace App\Http\Controllers;

use App\Exports\StockExport;
use App\Models\Stock;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StockExportController extends Controller

{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        $users = Stock::get();

        return view('users', compact('users'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new StockExport, 'Stock.xlsx');
    }

}

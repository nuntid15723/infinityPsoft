<?php

namespace App\Exports;

use App\Models\Inventory;
use App\Models\Stock;
use Faker\Core\Color;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use function PHPSTORM_META\type;

// class StockExport implements FromCollection, AfterSheet, Worksheet, ShouldAutoSize
// {
//     /**
//      * @return \Illuminate\Support\Collection
//      */
//     public function collection()
//     {
//         return Stock::select("emid", "fullname",  "phonenumber", "email", "salary")->get();
//     }

//     public function headings(): array
//     {
//         return [" รหัสพนักงาน", "ชื่อ-นามสกุล", "เบอร์โทรศัพท์", " อีเมล", " เงินเดือน"];
//     }
//     public function registerEvents(): array
//     {
//         return [
//             AfterSheet::class    => function (AfterSheet $event) {

//                 $event->sheet->getDelegate()->getStyle('A1:AG1')
//                     ->getAlignment()
//                     ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
//             },
//         ];
//     }

//     public function styles(Worksheet $sheet)
//     {
//         $sheet->getStyle('A1:AG1')->getFont()->setBold(true);
//     }
// }


class StockExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $data = Stock::join('inventories', 'inventories.id', '=', 'stocks.sttype')
            ->select(
                "stocks.*",
                'inventories.stname as inventory_name',
            )->get();
        $array = [];
        foreach ($data as  $value) {
            if ($value->ststatus == 0) {
                $status = 'ใช้งานอยู่';
            } elseif ($value->ststatus == 1) {
                $status = 'พักใช้งาน';
            } elseif ($value->ststatus == 2) {
                $status = 'เลิกใช้งานอยู่';
            }

            $type = [
                'stid' => $value->stid,
                'stdaystart' => $value->stdaystart,
                'stname' => $value->stname,
                'sttype' => $value->inventory_name,
                'stprice' => $value->stprice,
                'ststatus' => $status,
            ];
            array_push($array, $type);
        }
        return view('admin.Inventory.stockex', [
            'users' => $array
        ]);
    }
    // public function export()
    // {
    //     return Excel::download(new UsersExport, 'employee.xlsx');
    // }
}

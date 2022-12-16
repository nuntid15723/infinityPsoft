<?php

namespace App\Exports;

use App\Models\Department;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

// class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
// {

//     /**
//      * @return \Illuminate\Support\Collection
//      */
//     public function collection()
//     {
//         return User::select("emid", "fullname",  "phonenumber", "email", "salary")->get();
//     }

//     /**
//      * Write code on Method
//      *
//      * @return response()
//      */
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


class UsersExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('admin.employee.employeeex', [
            'users' => User::whereNotIn('roleid',[0,2])->get()
            // 'users' => User::all()
        ]);
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'employee.xlsx');
    }
    // public function view(): View
    // {


    //     $data = User::whereNotIn('roleid', [0, 2])->get();
    //     $array = [];
    //     foreach ($data as  $value) {
    //         if ($value->emtype == 1) {
    //             $emtype = 'แอดมิน';
    //         } elseif ($value->emtype == 0) {
    //             $emtype = 'พนักงาน';
    //         }

    //         $type = [
    //             'emid' => $value->emid,
    //             'fullname' => $value->fullname,
    //             'phonenumber' => $value->phonenumber,
    //             'email' => $value->email,
    //             'salary' => $value->salary,
    //             'emtype' => $emtype,
    //         ];
    //         array_push($array, $type);
    //     }
    //     return view('admin.employee.employeeex', [
    //         'users' => $array
    //     ]);
    // }
}

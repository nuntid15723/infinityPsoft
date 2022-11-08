<?php

namespace App\Exports;

use App\Models\Leave;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Department;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

// use Illuminate\Support\Carbon;

class LeaveExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $user = User::where('roleid', '!=', 2)->get();
        $lastdate = date('t'); // วันสุดท้ายของเดือน
        $data = [];
        $set_data = collect();
        foreach ($user  as $key => $value) {

            $leave = Leave::where([['emid', $value->emid], ['pnid', 1]])->get();
            $checkdate = collect();
            foreach ($leave as $e => $val) {
                $period = new DatePeriod(
                    new DateTime(date('Y-m-d', strtotime($val->daystartla))),
                    new DateInterval('P1D'),
                    new DateTime(date('Y-m-d', strtotime($val->dayendla . '+1 day')))
                );
                foreach ($period as $k => $perdate) {
                    // dump($perdate->format('Y-m-d'));
                    $checkdate->push([
                        'perdate' => $perdate->format('Y-m-d'),
                        'type' => $val->typeleave,
                        'timestart' => $val->timestart,
                        'timeend' => $val->timeend
                    ]);
                }
            }

            // $datemonth = collect(); // สร้าง collection เปล่าๆ (มันก็คือ array เปล่า)
            for ($i = 1; $i <= $lastdate; $i++) {
                $date = date('Y-m-' . $i);
                if ($i < 10) {
                    $date = date('Y-m-0' . $i);
                }
                // type 1 ลากิจ 2 ลาพักร้อน 3 ลาป่วย
                $check = $checkdate->where('perdate', $date)->first();
                $type = $check == null ? null : $check['type'];
                $timestart = $check == null ? null : $check['timestart'];
                $timeend = $check == null ? null : $check['timeend'];

                if ($check == null) {
                    $type = null;
                } else if ($check['type'] == 1) {
                    if ($timestart == 1) {
                        $type = 'ลากิจ(ทั้งวัน)';
                    } elseif ($timestart == 2) {
                        if ($timeend == 0) {
                            $type = 'ลากิจ(ครึ่งบ่าย,ลาเต็ม)';
                        } elseif ($timeend == 1) {
                            $type = 'ลากิจ(ครึ่งบ่าย,1 ชั่วโมง)';
                        } elseif ($timeend == 2) {
                            $type = 'ลากิจ(ครึ่งบ่าย,2 ชั่วโมง)';
                        } elseif ($timeend == 3) {
                            $type = 'ลากิจ(ครึ่งบ่าย,3 ชั่วโมง)';
                        }
                    } elseif ($timestart == 3) {
                        // $type = 'ลากิจ,ครึ่งบ่าย';
                        if ($timeend == 0) {
                            $type = 'ลากิจ(ครึ่งบ่าย,ลาเต็ม)';
                        } elseif ($timeend == 1) {
                            $type = 'ลากิจ(ครึ่งบ่าย,1 ชั่วโมง)';
                        } elseif ($timeend == 2) {
                            $type = 'ลากิจ(ครึ่งบ่าย,2 ชั่วโมง)';
                        } elseif ($timeend == 3) {
                            $type = 'ลากิจ(ครึ่งบ่าย,3 ชั่วโมง)';
                        }
                    } else {
                        $type = 'ลากิจ';
                    }
                } else if ($check['type'] == 2) {
                    if ($timestart == 1) {
                        $type = 'ลาพักร้อน(ทั้งวัน)';
                    } elseif ($timestart == 2) {
                        if ($timeend == 0) {
                            $type = 'ลาพักร้อน(ครึ่งบ่าย,ลาเต็ม)';
                        } elseif ($timeend == 1) {
                            $type = 'ลาพักร้อน(ครึ่งบ่าย,1 ชั่วโมง)';
                        } elseif ($timeend == 2) {
                            $type = 'ลาพักร้อน(ครึ่งบ่าย,2 ชั่วโมง)';
                        } elseif ($timeend == 3) {
                            $type = 'ลาพักร้อน(ครึ่งบ่าย,3 ชั่วโมง)';
                        }
                    } elseif ($timestart == 3) {
                        // $type = 'ลาพักร้อน,ครึ่งบ่าย';
                        if ($timeend == 0) {
                            $type = 'ลาพักร้อน(ครึ่งบ่าย,ลาเต็ม)';
                        } elseif ($timeend == 1) {
                            $type = 'ลาพักร้อน(ครึ่งบ่าย,1 ชั่วโมง)';
                        } elseif ($timeend == 2) {
                            $type = 'ลาพักร้อน(ครึ่งบ่าย,2 ชั่วโมง)';
                        } elseif ($timeend == 3) {
                            $type = 'ลาพักร้อน(ครึ่งบ่าย,3 ชั่วโมง)';
                        }
                    } else {
                        $type = 'ลาพักร้อน';
                    }
                } else if ($check['type'] == 3) {
                    if ($timestart == 1) {
                        $type = 'ลาป่วย(ทั้งวัน)';
                    } elseif ($timestart == 2) {
                        if ($timeend == 0) {
                            $type = 'ลาป่วย(ครึ่งเช้า,ลาเต็ม)';
                        } elseif ($timeend == 1) {
                            $type = 'ลาป่วย(ครึ่งเช้า,1 ชั่วโมง)';
                        } elseif ($timeend == 2) {
                            $type = 'ลาป่วย(ครึ่งเช้า,2 ชั่วโมง)';
                        } elseif ($timeend == 3) {
                            $type = 'ลาป่วย(ครึ่งเช้า,3 ชั่วโมง)';
                        }
                    } elseif ($timestart == 3) {
                        if ($timeend == 0) {
                            $type = 'ลาป่วย,ครึ่งบ่าย,ลาเต็ม';
                        } elseif ($timeend == 1) {
                            $type = 'ลาป่วย,ครึ่งบ่าย,1 ชั่วโมง';
                        } elseif ($timeend == 2) {
                            $type = 'ลาป่วย,ครึ่งบ่าย,2 ชั่วโมง';
                        } elseif ($timeend == 3) {
                            $type = 'ลาป่วย,ครึ่งบ่าย,3 ชั่วโมง';
                        }
                    } else {
                        $type = 'ลาป่วย';
                    }
                }
                // push ข้อมูลเข้าไปเก็บไว้ใน array
                $datemonth[$date] = $type;
            }
            $set_data->push([
                'name' => $value->fullname,
                'type' => $datemonth,
            ]);
        }

        foreach ($set_data as $k => $vals) {
            $typeleave[$k][] = $vals['name'];
            foreach ($vals['type'] as $e => $veal) {
                $typeleave[$k][] = $veal;
            }
        }
        $test2 = collect();
        foreach ($typeleave as $y => $yal) {
            $test2->push($yal);
        }

        return $test2;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        $lastdate = date('t'); // วันสุดท้ายของเดือน
        $date[] = 'ชื่อ';
        for ($i = 1; $i <= $lastdate; $i++) {
            $t = date('Y-m-' . $i);
            if ($i < 10) {
                $t = date('Y-m-0' . $i);
            }
            $car = Carbon::parse($t)->thaidate('j M y');
            $date[] = $car;
        }
        // dd($date);
        // return [" รหัสพนักงาน", "ชื่อ-นามสกุล", "เบอร์โทรศัพท์", " อีเมล", " เงินเดือน", " รหัสพนักงาน", "ชื่อ-นามสกุล"];
        return $date;
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:AG1')
                    ->getAlignment()
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:AG1')->getFont()->setBold(true);
    }
}

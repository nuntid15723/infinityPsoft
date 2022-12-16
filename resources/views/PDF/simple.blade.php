<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0%"> --}}
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <link rel="stylesheet" href="{{ asset('css/pdf.css') }}" /> --}}
    <title>Pay slip</title>
    <style>
        @page {
            margin: 50px 50px;
            margin-top: 0px;
        }

        .footer {
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
            height: 300px;

        }

        .header {
            grid-template-columns: 30% 70%;
            ;
        }
    </style>
</head>

<body>
    @php
        use Illuminate\Support\Carbon;
    @endphp
    {{-- <script type="text/php">
        if (isset($pdf)) {
            $text = "หน้า {PAGE_NUM}/{PAGE_COUNT}";
            $size = 10;
            $font = $fontMetrics->getFont("THSarabunNew");
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = ($pdf->get_width() - $width) / 2;
            $y = $pdf->get_height() - 35;
            $pdf->page_text($x, $y, $text, $font, $size);

            $text = "จัดเตรียมโดย The Chalotte";
            $size = 10;
            $font = $fontMetrics->getFont("THSarabunNew");
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = 500;
            $y = $pdf->get_height() - 35;
            $pdf->page_text($x, $y, $text, $font, $size);
        }
    </script> --}}
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
        }


        /* table,
        th,
        td {
            border: 1px solid;
        } */
    </style>
    @php
        //แปลงตัวเลขเป็นตัวอักษร
        function convertAmountToLetter($number)
        {
            if (empty($number)) {
                return '';
            }
            $number = strval($number);
            $txtnum1 = ['ศูนย์', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า', 'สิบ'];
            $txtnum2 = ['', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน'];
            $number = str_replace(',', '', $number);
            $number = str_replace(' ', '', $number);
            $number = str_replace('บาท', '', $number);
            $number = explode('.', $number);
            if (sizeof($number) > 2) {
                return '';
                exit();
            }
            $strlen = strlen($number[0]);
            $convert = '';
            for ($i = 0; $i < $strlen; $i++) {
                $n = substr($number[0], $i, 1);
                if ($n != 0) {
                    if ($i == $strlen - 1 && $n == 1) {
                        $convert .= 'เอ็ด';
                    } elseif ($i == $strlen - 2 && $n == 2) {
                        $convert .= 'ยี่';
                    } elseif ($i == $strlen - 2 && $n == 1) {
                        $convert .= '';
                    } else {
                        $convert .= $txtnum1[$n];
                    }
                    $convert .= $txtnum2[$strlen - $i - 1];
                }
            }
            $convert .= 'บาท';
            if (sizeof($number) == 1) {
                $convert .= 'ถ้วน';
            } else {
                if ($number[1] == '0' || $number[1] == '00' || $number[1] == '') {
                    $convert .= 'ถ้วน';
                } else {
                    $number[1] = substr($number[1], 0, 2);
                    $strlen = strlen($number[1]);
                    for ($i = 0; $i < $strlen; $i++) {
                        $n = substr($number[1], $i, 1);
                        if ($n != 0) {
                            if ($i > 0 && $n == 1) {
                                $convert .= 'เอ็ด';
                            } elseif ($i == 0 && $n == 2) {
                                $convert .= 'ยี่';
                            } elseif ($i == 0 && $n == 1) {
                                $convert .= '';
                            } else {
                                $convert .= $txtnum1[$n];
                            }
                            $convert .= $i == 0 ? $txtnum2[1] : '';
                        }
                    }
                    $convert .= 'สตางค์';
                }
            }
            return $convert;
        }
    @endphp
    <table width="100%">
        <tr>
            <td>
                <div>
                    {{-- <img src="{{ asset('infinityV2.png') }}" alt="" srcset="" style="width: 150px; margin-top: 50px; margin-right: 0px;"> --}}
                </div>
            </td>
            <td>
                <div style="font-size: 25px; font-weight: bold; margin-top: 0px; margin-top: 50px; " align="center">
                    {{-- <img src="{{ public_path('image.png') }}" style="width: 150px; height: 150px"> --}}
                    <img id="stImg" src="./imguse/1669113167.png" class="img-fluid"
                        style="max-width: 200px; max-height: 200px;border-radius: 10px;border: 0px solid #d9d9d9;" />
                </div>
                @foreach ($slip as $slip)
                    <div style="font-size: 25px; font-weight: bold; margin-top: 0px; margin-top: 25px; color: #0153b7 "
                        align="center">
                        {{-- {{ $slip->pay_company }} --}}

                        {{ $slip->pay_company }}

                    </div>
                    <div style="font-size: 16px; margin-top: 0px; margin-bottom: 1rem;" align="center">
                        {{ $slip->pay_address }}

                        {{-- address --}}
                    </div>
                    <div style="font-size: 20px; margin-top: -20px; margin-bottom: 1rem;" align="center">
                        เลขประจำตัวผู้เสียภาษี : {{ $slip->pay_id }}

                        {{-- address --}}
                    </div>
                @endforeach
            </td>
        </tr>
    </table>

    {{-- <div style="border-bottom: 1px solid black;"></div> --}}

    <table width="100%">
        <tr>
            <td align="center">
                <div style="font-size: 25px; font-weight: bold; margin-top: -20px;">
                    ใบแจ้งเงินเดือน / Pay Slip</div>
            </td>
        </tr>
    </table>

    <table width="100%">

        <tr>
            {{-- <td width="5%" align="center">
                <div style="font-size: 18px; margin: 0px;">

                </div>
            </td> --}}
            <td style="width: 60%">
                <div style="font-size: 22px; font-weight: bold;">
                    ชื่อพนักงาน :<t style="color: #0153b7"> {{ $showsalary->fullname }}</t>
                </div>
            </td>
            <td>
                <div style="font-size: 22px; font-weight: bold;">
                </div>
            </td>
            <td style="width: 40%">
                {{-- @foreach ($roundsalary as $date)
                @endforeach --}}
                <div style="font-size: 22px; font-weight: bold; margin-left:15px" align="center">
                    {{-- งวดที่จ่าย: {{ $ck->conclusion_salaray_name }} --}}
                    วันที่เริ่มต้น/Start date : {{ Carbon::parse($showsalary->roundstart)->thaidate('j M Y') }}
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div style="font-size: 22px; font-weight: bold;">
                    แผนก/ฝ่าย : <t style="color: #0153b7">{{ $showsalary->dpname }}</t>
                </div>
            </td>
            <td>
                <div style="font-size: 22px; font-weight: bold;">
                </div>
            </td>
            <td>
                <div style="font-size: 22px; font-weight: bold; margin-left:10px" align="center">
                    {{-- เลชที่ธนาคาร: {{ $ck->bankNumber }} --}}
                    วันที่สิ้นสุด/End date : {{ Carbon::parse($showsalary->roundend)->thaidate('j M Y') }}
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div style="font-size: 22px; font-weight: bold;">
                </div>
            </td>
            <td>
                <div style="font-size: 22px; font-weight: bold;">
                </div>
            </td>
            <td>
                <div style="font-size: 22px; font-weight: bold; margin-left:15px" align="center">
                    วันที่จ่าย/Pay Slip date: {{ Carbon::parse($showsalary->rounddate)->thaidate('j M Y') }}
                </div>
            </td>

        </tr>
    </table>

    <main>
        <table style="border-collapse: collapse; width: 100%">
            <tr>
                <td width="25%" align="center" style="border: 1px solid black;">
                    <span style="font-size: 18px; margin: 0px;">
                        รายได้ (Income)
                    </span>
                </td>
                <td width="15%" align="center" style="border: 1px solid black;">
                    <div style="font-size: 18px; margin: 0px;">
                        จำนวน (Amount)
                    </div>
                </td>
                <td width="25%" align="center" style="border: 1px solid black;">
                    <div style="font-size: 18px; margin: 0px;">
                        รายการหัก (Deduction)
                    </div>
                </td>
                <td width="15%" align="center" style="border: 1px solid black;">
                    <div style="font-size: 18px; margin: 0px;">
                        จำนวน (Amount)
                    </div>
                </td>
            </tr>

            <tr>
                <td width="25%" align="left" style=" border-left: 1px solid black;">
                    <div style="font-size: 18px; margin-left: 0.5rem;">
                        เงินเดือน

                    </div>
                </td>
                <td width="15%" align="right" style=" border-left: 1px solid black;">
                    <div style="font-size: 18px; margin-right:15px;">
                        {{ number_format($showsalary->salary == null ? $showsalary->salary : $showsalary->salary, 2) }}
                    </div>
                </td>
                <td width="25%" align="left" style=" border-left: 1px solid black;">
                    <div style="font-size: 18px; margin-left: 0.5rem;">
                        @if ($showsalary->tax != 0.0)
                            ประกันสังคม
                        @endif
                    </div>
                </td>
                <td width="15%" align="right" style=" border-left: 1px solid black; border-right: 1px solid black;">
                    <div style="font-size: 18px; margin-right:15px;">
                        @if ($showsalary->taxfall != 0.0)
                            {{ number_format($showsalary->taxfall, 2) }}
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <td width="25%" align="left" style=" border-left: 1px solid black;">
                    {{-- <div style="font-size: 18px; margin-left: 0.5rem;">
                        @if ($ck->value_ot != 0.0)
                        ค่าล่วงเวลา
                        @endif
                        uhohu
                    </div> --}}
                </td>
                <td width="15%" align="right" style=" border-left: 1px solid black;">
                    {{-- <div style="font-size: 18px; margin-right:15px;">
                        @if ($ck->value_ot != 0.0)
                        {{ number_format($ck->value_ot,2) }}
                        @endif
                        kugbiuk
                    </div> --}}
                </td>
                <td width="25%" align="left" style=" border-left: 1px solid black;">
                    <div style="font-size: 18px; margin-left: 0.5rem;">
                        @if ($showsalary->leave_much != 0.0)
                            หักลาเกิน,เข้างานสาย,อื่นๆ
                        @elseif ($showsalary->work_late != 0.0)
                            หักลาเกิน,เข้างานสาย,อื่นๆ
                        @elseif ($showsalary->not_work != 0.0)
                            หักลาเกิน,เข้างานสาย,อื่นๆ
                        @endif
                    </div>
                </td>
                <td width="15%" align="right" style=" border-left: 1px solid black; border-right: 1px solid black;">
                    <div style="font-size: 18px; margin-right:15px;">
                        @if ($showsalary->sumdown != 0.0)
                            {{ number_format($showsalary->sumdown, 2) }}
                        @endif
                    </div>
                </td>
            </tr>

            <?php for ($i=0; $i < 8; $i++) { ?>
            <tr>
                <td width="25%" align="center" style="border-left: 1px solid black; padding-top: 15px;">
                </td>
                <td width="15%" align="center" style="border-left: 1px solid black;">
                </td>
                <td width="25%" align="center" style="border-left: 1px solid black;">
                </td>
                <td width="15%" align="center" style="border-left: 1px solid black; border-right: 1px solid black;">
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="1" align="center"
                    style="border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                    <div style="font-size: 18px; margin-right: 20px;">
                        รวมรายได้ (Total Income)
                    </div>
                </td>
                <td colspan="1" align="center"
                    style="border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                    <div style="font-size: 18px;">
                        {{-- {{ number_format(($ck->salary == null ? $ck->salaryP : $ck->salary) + $ck->value_ot,2) }} --}}
                        {{ number_format($showsalary->salary, 2) }}
                    </div>
                </td>
                <td colspan="1" align="center"
                    style="border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                    <div style="font-size: 18px;">
                        รวมรายการหัก (Total Deduction)
                    </div>
                </td>
                <td colspan="1" align="center"
                    style="border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                    <div style="font-size: 18px;">
                        {{ number_format($showsalary->salary - $showsalary->sumdown, 2) }}
                    </div>
                </td>
            </tr>
            {{-- <tr>
                <td colspan="2"align="center">
                    <div style="font-size: 20px; margin-left: 35.0rem; font-weight: bold; margin-top:10px">
                        ({{ convertAmountToLetter(number_format($showsalary->salary - $showsalary->sumdown, 2)) }})
                    </div>
                    <div style="font-size: 20px;margin-left: 20.0rem; margin-top:25px"> Signature :
                    </div>
                </td>
                <td colspan="1">
                    <div style="font-size: 20px; margin-top:100px"> Signature :</div>
                </td>
                <td colspan="1" align="center">
                    <div
                        style="font-size: 20px; font-weight: bold;width: 100%; border-bottom: 1px solid black; margin-top:100px">
                        ({{ convertAmountToLetter(number_format($showsalary->salary - $showsalary->sumdown, 2)) }})
                        ({{ convertAmountToLetter(number_format((($ck->salary == null ? $ck->salaryP : $ck->salary) + $ck->value_ot) - ($sumsocialSecurity + $sumOther),2)) }})
                    </div>
                </td>
            </tr> --}}
        </table>
        <table width="100%">
            <tr>
                <td colspan="1" style="width: 40%">
                    <div style="font-size: 20px; font-weight: bold; margin-top:10px">
                </td>
                <td colspan="1" style="width: 30%">
                    <div style="font-size: 20px;font-weight: bold; margin-left: 4.0rem; margin-top: 18px">เงินได้สุทธิ
                        / Net to Pay</div>
                <td colspan="3" align="center" style="width: 30%">
                    <div style="font-size: 22px; font-weight: bold; margin-top:18px">
                        {{ number_format($showsalary->salary - $showsalary->sumdown, 2) }}
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="1" style="width: 40%">
                    <div style="font-size: 20px; font-weight: bold; margin-top:-10.0rem">
                </td>
                <td colspan="1" style="width: 30%">
                    <div style="font-size: 20px; font-weight: bold; margin-top:10px">
                </td>
                <td colspan="3" align="center" style="width: 30%">
                    <div style="font-size: 22px; font-weight: bold; margin-top:-1.0rem">
                        ({{ convertAmountToLetter(number_format($showsalary->salary - $showsalary->sumdown, 2)) }})
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="1" style="width: 40%">
                    <div style="font-size: 20px;"> </div>
                </td>
                <td colspan="1" style="width: 30%">
                    {{-- <div style="font-size: 20px;font-weight: bold; margin-left: 8.0rem; margin-top: 10px">
                        ลงชื่อผู้รับเงิน</div>
                    <div style="font-size: 20px;font-weight: bold; margin-left: 8.6rem; margin-top: -10px"> Signature
                    </div> --}}
                    <div style="font-size: 20px;font-weight: bold; margin-left: 3.0rem; margin-top: 10px">
                        ลงชื่อผู้รับเงิน/Signature :</div>
                </td>
                <td colspan="3" style="width: 30%" align="center">
                    <div style="font-size: 20px; font-weight: bold; border-bottom: 1px solid black; margin-top:30px">
                    </div>
                </td>
            </tr>
        </table>
        {{-- <table width="100%" style="margin-top: 15px; margin-left: 75px; border-collapse: collapse;"> --}}
        <table width="100%" style="margin-top: 15px;border-collapse: collapse;">
            {{-- <tr>
                <td width="5%" align="center">
                    <div style="font-size: 18px; margin: 0px;">

                    </div>
                </td>
                <td width="40%" align="center" style="border: 1px solid black;">
                    <div style="font-size: 18px; margin: 0px;">
                        วันที่จ่าย/Pay slip date
                        kugyftdr
                    </div>
                </td>
                <td width="5%" align="center">
                    <div style="font-size: 18px; margin: 0px;">
                    </div>
                </td>
                <td width="40%" align="center" style="border: 1px solid black;">
                    <div style="font-size: 18px; margin: 0px;">
                        เงินได้สุทธิ/Net to pay
                        kjhgfdfgh
                    </div>
                </td>
                <td width="5%" align="center">
                    <div style="font-size: 18px; margin: 0px;">

                    </div>
                </td>
                <td width="40%" align="center" style="border: 1px solid black;">
                    <div style="font-size: 18px; margin: 0px;">
                        ลงชื่อผู้รับ/Signature
                        Signature:fhgjklk;
                    </div>
                </td>
            </tr> --}}
            {{-- <tr>
                <td width="40%" align="center">
                    <div style="font-size: 18px; margin-left: 0.5rem;">
                    </div>
                </td>
                <td width="5%" align="center"
                    style="border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                    <div style="font-size: 18px; margin-left: 0.5rem;">
                        {{ date('d/m/Y') }}
                    </div>
                </td>
                <td width="5%" align="center">
                    <div style="font-size: 18px; margin-left:5px">
                    </div>
                </td>
                <td width="5%" align="center"
                    style="border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                    <div style="font-size: 18px; margin-left:5px">
                        dfghjkl;
                        {{ number_format((($ck->salary == null ? $ck->salaryP : $ck->salary) + $ck->value_ot) - ($sumsocialSecurity + $sumOther),2) }}
                    </div>
                </td>
                <td width="5%" align="center">
                    <div style="font-size: 18px; margin-left:5px">
                    </div>
                </td>
                <td width="40%" align="center"
                    style="border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                    <div style="font-size: 18px;">

                    </div>
                </td>
            </tr> --}}

        </table>
    </main>

</body>

</html>

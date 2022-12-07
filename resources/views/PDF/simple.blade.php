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

                    {{-- <img src="data:image/png;base64,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" /> --}}

                    <img id="stImg" src="./imguse/1669113167.png" class="img-fluid"
                        style="max-width: 200px; max-height: 200px;border-radius: 10px;border: 1px solid #d9d9d9;" />
                    {{-- <img src="{{ asset('/infinityV2.png') }}" alt="" srcset="" style="width: 150px; margin-top: 50px; margin-right: 0px;"> --}}
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

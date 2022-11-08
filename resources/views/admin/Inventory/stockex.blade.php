@php
use Illuminate\Support\Carbon;
@endphp
<table>
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>รหัสทรัพย์สิน</th>
            <th>วันที่เริ่มใช้งาน</th>
            <th>ชื่อทรัพย์สิน</th>
            <th>ประเภททรัพย์สิน</th>
            <th>มูลค่าทรัพย์สิน</th>
            <th>สถานะทรัพย์สิน</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp
        @foreach ($users as $cus)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $cus['stid'] }}</td>
                <td>{{ Carbon::parse($cus['stdaystart'])->thaidate('j M Y') }}</td>
                <td>{{ $cus['stname'] }}</td>
                <td>{{ $cus['sttype'] }}</td>
                <td>{{ number_format($cus['stprice']) }}</td>
                <td>{{ $cus['ststatus'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

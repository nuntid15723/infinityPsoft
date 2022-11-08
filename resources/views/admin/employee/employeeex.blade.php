<table>
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>รหัสพนักงาน</th>
            <th>ชื่อ-นามสกุล</th>
            <th>เบอร์โทรศัพท์</th>
            <th>อีเมล</th>
            <th>เงินเดือน</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 0;
        @endphp
        @foreach ($users as $cus)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $cus->emid }}</td>
                <td>
                    {{ $cus->fullname }}
                </td>
                <td>{{ $cus->phonenumber }}</td>
                <td>{{ Str::limit($cus->email, '20', '..') }}</td>
                <td>{{ number_format($cus->salary) }}
                </td>
                <td>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

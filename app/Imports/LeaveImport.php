<?php

namespace App\Imports;

use App\Models\Leave;
use Maatwebsite\Excel\Concerns\ToModel;
use Hash;

class LeaveImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Leave([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
    }
}

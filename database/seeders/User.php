<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'roleid' => '1',
                'emtype' => '2',
                'emid' => 'IP001',
                'pnid'=>'0000000000000',
                'fullname'  => 'superAdmin',
                'salary'=>'0',
                'email' =>  'superAdmin@admin.com',
                'Phonenumber' => '0123456789',
                'password' => Hash::make('123456'),
                'created_at'    =>  Carbon::now(),
                'updated_at'    =>  Carbon::now()
            ]
        ];
        foreach ($users as $users) {
            ModelsUser::create($users);
        }
        // $this->call(FishsTableSeeder::class);
    }
}

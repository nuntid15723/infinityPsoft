<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Slip extends Model
{
    use HasFactory;
    use Notifiable;


    protected $guarded = [];
    protected $table = 'slips';


    protected $fillable = [
        'id',
        'pay_id		',
        'pay_company',
        'pay_address',
        'pay_imglogo',
        'salaries_id',
    ];
}

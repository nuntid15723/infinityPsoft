<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Stock extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $guarded = [];
    protected $table = 'stocks';


    protected $fillable = [
        'id',
        'stimg',
        'stid',
        'stnumber',
        'stamount',
        'stunit',
        'stname',
        'sttype',
        'stdaybuy',
        'stdescription',
        'stdaystart',
        'stprice',
        'stageuse',
        'stmath',
        'ststatus',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Leave extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'leaves';


    protected $fillable = [
        'id',
        'emid',
        'user_id',
        'pnid',
        'ladepartment',
        'email',
        'typeleave',
        'laimg',
        'timestart	',
        'timeend	',
        'daystartla',
        'dayendla',
        'reasonla',
    ];
}

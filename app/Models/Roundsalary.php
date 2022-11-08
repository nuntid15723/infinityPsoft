<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Roundsalary extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $guarded = [];
    protected $table = 'roundsalaries';


    protected $fillable = [
        'id',
        'rlname	',
        'rlstatus',
        'roundstart',
        'roundend',
        'rounddate',
    ];
}

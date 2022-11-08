<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class History_repair extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'history_repairs';

    protected $fillable = [
        'id',
        'repair_stid',
        'repair_name',
        'repair_place',
        'repair_start',
        'repair_end',
        'repair_cost',
    ];
}

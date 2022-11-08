<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Salary extends Model
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'salaries';


    protected $fillable = [
        'id',
        'emid		',
        'fullname',
        'payment',
        'salary',
        'tax',
        'leave_muchfall',
        'work_latefall',
        'not_workfall',
        'leave_much',
        'work_late',
        'not_work',
        'sumdown',
        'amount',
        'note',
        'roundsalaries_id',
    ];

    /**
     * Get the user that owns the Salary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_slary()
    {
        return $this->belongsTo(User::class, 'emid', 'id');
    }
}

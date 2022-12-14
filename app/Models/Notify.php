<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Notify
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_leave()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

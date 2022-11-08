<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifyUser extends Model
{
    use HasFactory;
    /**
     * Get the user that owns the NotifyUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_leave()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

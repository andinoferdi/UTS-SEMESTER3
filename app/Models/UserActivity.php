<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'diskripsi', 'status', 'stand', 'delete_mark'
    ];

    /**
     * Relationship dengan model User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

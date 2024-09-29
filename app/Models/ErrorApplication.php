<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorApplication extends Model
{
    use HasFactory;

    protected $table = 'error_application';

    protected $fillable = [
        'user_id',
        'module',
        'controller',
        'function',
        'error_message',
        'status',
        'create_time',
        'delete_mark',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

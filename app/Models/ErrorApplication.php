<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorApplication extends Model
{
    use HasFactory;

    protected $table = 'error_application';

    protected $fillable = [
        'controller',
        'message',
        'stack_trace',
        'url',
        'method',
        'ip_address',
    ];
}

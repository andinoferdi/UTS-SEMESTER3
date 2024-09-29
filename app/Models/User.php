<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = [
         'name', 'email', 'no_hp', 'wa', 'pin', 'password', 'foto', 'create_by', 'create_date', 'update_by', 'update_date', 'status_user', 'jenis_user_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jenisUser()
    {
        return $this->belongsTo(JenisUser::class);
    }
}

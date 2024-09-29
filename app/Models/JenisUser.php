<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUser extends Model
{
    use HasFactory;

    protected $fillable = ['nama_jenis_user'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

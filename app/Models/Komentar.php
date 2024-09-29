<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'postingan_id',
        'user_id',
        'gambar_komentar',
        'nama_komentar',
    ];

    public function postingan()
    {
        return $this->belongsTo(Postingan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

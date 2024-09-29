<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPesan extends Model
{
    use HasFactory;

    protected $table = 'kategori_pesan';

    protected $fillable = [
        'nama_kategori',
    ];

    /**
     * Get the pesan for the kategori_pesan.
     */
    public function pesan()
    {
        return $this->hasMany(Pesan::class, 'kategori_pesan_id');
    }
}

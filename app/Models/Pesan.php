<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $table = 'pesan';

    protected $fillable = [
        'pengirim',
        'nama_pesan',
        'kategori_pesan_id',
        'file',
        'penerima',
    ];

    /**
     * Get the kategori_pesan that owns the pesan.
     */
    public function kategoriPesan()
    {
        return $this->belongsTo(KategoriPesan::class, 'kategori_pesan_id');
    }
}

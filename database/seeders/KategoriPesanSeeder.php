<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriPesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        DB::table('kategori_pesan')->delete();

        DB::table('kategori_pesan')->insert([
            [ 'nama_kategori' => 'umum'],
            [ 'nama_kategori' => 'penting'],
            [ 'nama_kategori' => 'pemberitahuan'],
        ]);
    }
}

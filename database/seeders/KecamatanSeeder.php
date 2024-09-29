<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menghapus semua data di tabel kecamatans sebelum menginsert data baru
        DB::table('kecamatans')->delete();

        // Menginsert data kecamatan baru
        DB::table('kecamatans')->insert([
            ['nama_kecamatan' => 'Dukuh Pakis'],
            ['nama_kecamatan' => 'Gayungan'],
            ['nama_kecamatan' => 'Jambangan'],
            ['nama_kecamatan' => 'Karang Pilang'],
            ['nama_kecamatan' => 'Sawahan'],
            ['nama_kecamatan' => 'Wiyung'],
            ['nama_kecamatan' => 'Wonocolo'],
            ['nama_kecamatan' => 'Wonokromo'],
            ['nama_kecamatan' => 'Gubeng'],
            [ 'nama_kecamatan' => 'Gunung Anyar'],
            [ 'nama_kecamatan' => 'Mulyorejo'],
            [ 'nama_kecamatan' => 'Rungkut'],
            [ 'nama_kecamatan' => 'Sukolilo'],
            [ 'nama_kecamatan' => 'Tambaksari'],
            [ 'nama_kecamatan' => 'Tenggilis Mejoyo'],
            [ 'nama_kecamatan' => 'Bubutan'],
            [ 'nama_kecamatan' => 'Genteng'],
            [ 'nama_kecamatan' => 'Simokerto'],
            [ 'nama_kecamatan' => 'Tegalsari'],
            [ 'nama_kecamatan' => 'Bulak'],
            [ 'nama_kecamatan' => 'Kenjeran'],
            [ 'nama_kecamatan' => 'Krembangan'],
            [ 'nama_kecamatan' => 'Pabean Cantian'],
            [ 'nama_kecamatan' => 'Semampir'],
            [ 'nama_kecamatan' => 'Asemrowo'],
            [ 'nama_kecamatan' => 'Benowo'],
            [ 'nama_kecamatan' => 'Lakarsantri'],
            [ 'nama_kecamatan' => 'Pakal'],
            [ 'nama_kecamatan' => 'Sambikerep'],
            [ 'nama_kecamatan' => 'Sukomanunggal'],
            [ 'nama_kecamatan' => 'Tandes'],
        ]);
    }
}

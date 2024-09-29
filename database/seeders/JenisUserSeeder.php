<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_users')->delete();

        DB::table('jenis_users')->insert([
            [ 'nama_jenis_user' => 'admin'],
            [ 'nama_jenis_user' => 'user'],
            [ 'nama_jenis_user' => 'mahasiswa'],
        ]);
    }
}

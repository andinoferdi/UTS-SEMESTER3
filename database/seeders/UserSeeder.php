<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin',
            'password' => bcrypt('admin@admin'),
            'no_hp' => '081359528944',
            'wa' => '081359528944',
            'pin' => 'PIN',
            'jenis_user_id' => 1,
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@user',
            'password' => bcrypt('user@user'),
            'no_hp' => '081359528945',
            'wa' => '081359528945',
            'pin' => 'PIN',
            'jenis_user_id' => 2,
        ]);

        User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@mahasiswa',
            'password' => bcrypt('mahasiswa@mahasiswa'),
            'no_hp' => '081359528946',
            'wa' => '081359528946',
            'pin' => 'PIN',
            'jenis_user_id' => 3,
        ]);
    }
}

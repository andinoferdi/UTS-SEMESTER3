<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('menus')->insert([
            [
                'id' => 1,
                'nama_menu' => 'Menu',
                'link_menu' => 'menu',
                'icon_menu' => 'bi bi-tablet'
            ],
            [
                'id' => 2,
                'nama_menu' => 'Setting Menu',
                'link_menu' => 'setting_menus',
                'icon_menu' => 'bi bi-gear'
            ],
            [
                'id' => 3,
                'nama_menu' => 'User',
                'link_menu' => 'user',
                'icon_menu' => 'bi bi-person'
            ],
            [
                'id' => 4,
                'nama_menu' => 'Jenis User',
                'link_menu' => 'jenis_user',
                'icon_menu' => 'bi bi-person'
            ],
            [
                'id' => 5,
                'nama_menu' => 'Satuan',
                'link_menu' => 'satuan',
                'icon_menu' => 'bi bi-shift'
            ],
            [
                'id' => 6,
                'nama_menu' => 'Kecamatan',
                'link_menu' => 'kecamatan',
                'icon_menu' => 'bi bi-justify'
            ],
            [
                'id' => 7,
                'nama_menu' => 'Kategori Buku',
                'link_menu' => 'kategori_buku',
                'icon_menu' => 'bi bi-book-fill'
            ],
            [
                'id' => 8,
                'nama_menu' => 'Buku',
                'link_menu' => 'buku',
                'icon_menu' => 'bi bi-book'
            ],
            [
                'id' => 9,
                'nama_menu' => 'Mahasiswa',
                'link_menu' => 'mahasiswa',
                'icon_menu' => 'bi bi-collection'
            ],
            [
                'id' => 10,
                'nama_menu' => 'Aktivitas User',
                'link_menu' => 'aktivitas/user',
                'icon_menu' => 'bi bi-stopwatch'
            ],
            [
                'id' => 11,
                'nama_menu' => 'Error Aplikasi',
                'link_menu' => 'aktivitas/error_aplikasi',
                'icon_menu' => 'bi bi-exclamation-octagon'
            ],
            [
                'id' => 12,
                'nama_menu' => 'Profile',
                'link_menu' => 'settings/profile',
                'icon_menu' => 'bi bi-gear'
            ],
            [
                'id' => 13,
                'nama_menu' => 'Pesan',
                'link_menu' => 'inbox',
                'icon_menu' => 'bi bi-envelope'
            ],
             [
                'id' => 14,
                'nama_menu' => 'Kirim Pesan',
                'link_menu' => 'sent',
                'icon_menu' => 'bi bi-envelope-open'
            ],

                [
                'id' => 15,
                'nama_menu' => 'Postingan',
                'link_menu' => 'postingan',
                'icon_menu' => 'fa fa-comment'
            ],
        ]);
    }
}

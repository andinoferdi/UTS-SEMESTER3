<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Menu;

class MenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Menggunakan View Composer untuk sidebar tertentu
        View::composer('layouts.sidebar', function ($view) {
            // Dapatkan jenis user
            $jenis_user_id = auth()->check() ? auth()->user()->jenis_user_id : null;

            // Ambil menu berdasarkan jenis_user_id
            $menus = Menu::whereHas('settingMenus', function ($query) use ($jenis_user_id) {
                $query->where('jenis_user_id', $jenis_user_id);
            })->orderBy('urutan_menu', 'asc')->get();

            // Bagikan ke view
            $view->with('menus', $menus);
        });
    }

    public function register()
    {
        //
    }
}

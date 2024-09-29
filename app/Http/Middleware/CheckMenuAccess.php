<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SettingMenu;

class CheckMenuAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        $menuId = $this->getMenuIdFromRoute($request);

        if ($menuId) {
            $hasAccess = SettingMenu::where('jenis_user_id', $user->jenis_user_id)
                ->where('menu_id', $menuId)
                ->exists();

            if (!$hasAccess) {
                return redirect()->route('dashboard')->with('error', 'You do not have access to this menu.');
            }
        }

        return $next($request);
    }

    private function getMenuIdFromRoute(Request $request)
    {

        $routeMenuMapping = [
            'menu.index' => 1,
            'menu.edit' => 1,
            'menu.create' => 1,

            'setting_menus.index' => 2,
            'setting_menus.edit' => 2,
            'setting_menus.create' => 2,

            'user.index' => 3,
            'user.edit' => 3,
            'user.create' => 3,

            'jenis_user.index' => 4,
            'jenis_user.edit' => 4,
            'jenis_user.create' => 4,

            'satuan.index' => 5,
            'satuan.edit' => 5,
            'satuan.create' => 5,

            'kecamatan.index' => 6,

            'kategori_buku.index' => 7,
            'kategori_buku.edit' => 7,
            'kategori_buku.create' => 7,

            'buku.index' => 8,
            'buku.edit' => 8,
            'buku.create' => 8,

            'mahasiswa.index' => 9,
            'mahasiswa.edit' => 9,
            'mahasiswa.create' => 9,

            'aktivitas.user.index' => 10,

            'aktivitas.error_aplikasi.index' => 11,

            'settings.profile' => 12,

            'email.inbox' => 13,
            'email.edit' => 13,
            'email.create' => 13,
            'email.show' => 13,

            'email.sent' => 14,

            'postingan.index' => 15,
            'postingan.edit' => 15,
            'postingan.create' => 15,

            'informasi.index' => 16,
        ];

        $routeName = $request->route()->getName();

        return $routeMenuMapping[$routeName] ?? null;
    }
}

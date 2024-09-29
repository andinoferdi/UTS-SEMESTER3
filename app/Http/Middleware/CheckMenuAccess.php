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
            'setting_menus.index' => 2,
            'users.index' => 3,
            'jenis_user.index' => 4,
            'satuan.index' => 5,
            'kecamatan.index' => 6,
            'kategori_buku.index' => 7,
            'buku.index' => 8,
            'mahasiswa.index' => 9,
            'aktivitas.user.index' => 10,
            'aktivitas.error_aplikasi.index' => 11,
            'settings.profile.index' => 12,
        ];

        $routeName = $request->route()->getName();

        return $routeMenuMapping[$routeName] ?? null;
    }
}

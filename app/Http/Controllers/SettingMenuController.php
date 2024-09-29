<?php

namespace App\Http\Controllers;

use App\Models\SettingMenu;
use App\Models\JenisUser;
use App\Models\Menu;
use Illuminate\Http\Request;

class SettingMenuController extends Controller
{
    public function index()
{
    $jenis_user = JenisUser::all();
    $menus = Menu::all();
    $settingMenus = SettingMenu::with('menu', 'jenisUser')->get();
    return view('dashboard.setting_menus.index', compact('jenis_user', 'menus', 'settingMenus'));
}

    public function create()
{

    $jenisUsers = JenisUser::all();
    $menus = Menu::all();

    return view('dashboard.setting_menus.create', compact('jenisUsers', 'menus'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'jenis_user_id' => 'required|exists:jenis_users,id',
        'menu_id' => 'required|array',
        'menu_id.*' => 'exists:menus,id',
    ]);

    foreach ($validated['menu_id'] as $menuId) {
        SettingMenu::create([
            'jenis_user_id' => $validated['jenis_user_id'],
            'menu_id' => $menuId,
        ]);
    }

    return redirect()->route('setting_menus.index')->with('success', 'Setting Menu berhasil ditambahkan');
}


public function edit($id)
{
    $settingMenu = SettingMenu::where('jenis_user_id', $id)->get();

    $jenisUsers = JenisUser::all();
    $menus = Menu::all();

    $selectedMenus = $settingMenu->pluck('menu_id')->toArray();

    return view('dashboard.setting_menus.edit', compact('settingMenu', 'jenisUsers', 'menus', 'selectedMenus'));
}



    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jenis_user_id' => 'required',
            'menu_id' => 'required|array',
        ]);

        SettingMenu::where('jenis_user_id', $id)->delete(); // Hapus semua setting menu lama

        foreach ($validated['menu_id'] as $menuId) {
            SettingMenu::create([
                'jenis_user_id' => $validated['jenis_user_id'],
                'menu_id' => $menuId,
            ]);
        }

        return redirect()->route('setting_menus.index')->with('success', 'Setting Menu berhasil diupdate');
    }

    public function destroy($id)
    {
        SettingMenu::where('jenis_user_id', $id)->delete();
        return redirect()->route('setting_menus.index')->with('success', 'Setting Menu berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\JenisUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
   public function index(Request $request)
{
    $activities = UserActivity::with('user')->get();
    $users = User::all();
    $menus = Menu::all();
    $jenis_user = JenisUser::all();
    return view('dashboard.index', compact('users', 'activities', 'menus','jenis_user')); // Tambahkan menus ke compact
}
   public function indexsettingsprofile(Request $request)
{
    $user = Auth::user();
    $menus = Menu::all();
    return view('dashboard.settings.profile', compact('user', 'menus')); // Tambahkan menus ke compact
}


public function updateprofile(Request $request, User $user)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'no_hp' => 'nullable|string|max:15',
        'wa' => 'nullable|string|max:15',
        'pin' => 'nullable|string|max:6',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $fotoPath = $user->foto;

    if ($request->has('avatar_remove') && $request->avatar_remove == "1") {
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }
        $user->foto = null;
    } elseif ($request->file('foto')) {
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }
        $fotoPath = $request->file('foto')->store('fotos', 'public');
        $user->foto = $fotoPath;
    }

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'wa' => $request->wa,
        'pin' => $request->pin,
        'update_by' => auth()->user() ? auth()->user()->name : 'system',
        'update_date' => now('Asia/Jakarta'),
    ]);

    return redirect()->route('profile')->with('success', 'Profile updated successfully.');
}


}

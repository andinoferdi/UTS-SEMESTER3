<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserActivity;
use App\Models\Menu;
use App\Models\JenisUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
 public function index(Request $request)
{
    $geoapifyApiKey = 'b2bdd070d6974161897dd9d70cebe142'; // API Geoapify

    // Ambil data gempa dari API BMKG
    $gempaResponse = file_get_contents('https://data.bmkg.go.id/DataMKG/TEWS/autogempa.json');
    $gempaData = json_decode($gempaResponse, true);
    $gempa = $gempaData['Infogempa']['gempa'] ?? null;

    // Ambil data cuaca dari API BMKG
    $cuacaResponse = file_get_contents('https://api.bmkg.go.id/publik/prakiraan-cuaca?adm4=35.78.08.1003');
    $cuacaData = json_decode($cuacaResponse, true);
    $cuaca = $cuacaData['data'][0]['cuaca'][0][0] ?? null; // Cuaca terkini
$users = User::all();
    $activities = UserActivity::with('user')->get();
    return view('dashboard.index', compact('gempa','users' , 'activities', 'geoapifyApiKey', 'cuaca'));
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

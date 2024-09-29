<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JenisUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user = Auth::user();
        return view('dashboard.user.index', compact('users', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $jenis_user = JenisUser::all();
        return view('dashboard.user.create', compact('user','jenis_user'));
    }

    public function store(Request $request)
    {
       $request->validate([
    'name' => 'required',
    'email' => 'required|email|unique:users,email,' . ($user->id ?? ''),
    'no_hp' => 'nullable|string|max:15',
    'wa' => 'nullable|string|max:15',
    'pin' => 'nullable|string|max:6',
    'password' => 'required|string|min:8',
    'jenis_user_id' => 'required|exists:jenis_users,id',
    'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);

        $fotoPath = $request->file('foto') ? $request->file('foto')->store('fotos', 'public') : 'assets/media/avatars/blank.png';

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'wa' => $request->wa,
            'pin' => $request->pin,
            'password' => bcrypt($request->password),
            'jenis_user_id' => $request->jenis_user_id,
            'foto' => $fotoPath,
        ]);

        $user->create_by = auth()->user() ? auth()->user()->name : 'system';
        $user->create_date = now('Asia/Jakarta');
        $user->status_user = false;
        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $jenis_user = JenisUser::all();
        return view('dashboard.user.edit', compact('user' ,'jenis_user'));
    }

    public function update(Request $request, User $user)
    {
       $request->validate([
    'name' => 'required',
    'email' => 'required|email|unique:users,email,' . ($user->id ?? ''),
    'no_hp' => 'nullable|string|max:15',
    'wa' => 'nullable|string|max:15',
    'pin' => 'nullable|string|max:6',
    'password' => 'required|string|min:8',
    'jenis_user_id' => 'required|exists:jenis_users,id',
    'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);

        if ($request->has('avatar_remove') && $request->avatar_remove == "1") {
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            $user->foto = 'assets/media/avatars/blank.png';
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
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'jenis_user_id' => $request->jenis_user_id,
            'foto' => $user->foto,
            'update_by' => auth()->user() ? auth()->user()->name : 'system',
            'update_date' => now('Asia/Jakarta'),
        ]);

        return redirect()->route('user.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }
        $user->delete();
        return redirect()->route('user.index')
            ->with('success', 'User deleted successfully.');
    }
}

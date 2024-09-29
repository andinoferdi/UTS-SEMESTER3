<?php

namespace App\Http\Controllers;

use App\Models\JenisUser;
use Illuminate\Http\Request;

class JenisUserController extends Controller
{
    public function index()
    {
        $jenis_users = JenisUser::all();
        return view('dashboard.jenis_user.index', compact('jenis_users'));
    }

    public function create()
    {
        return view('dashboard.jenis_user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_user' => 'required',
        ]);

        JenisUser::create($request->all());

        return redirect()->route('jenis_user.index');
    }

    public function edit(JenisUser $jenis_user)
    {
        return view('dashboard.jenis_user.edit', compact('jenis_user'));
    }

    public function update(Request $request, JenisUser $jenis_user)
    {
        $request->validate([
            'nama_jenis_user' => 'required',
        ]);

        $jenis_user->update($request->all());

        return redirect()->route('jenis_user.index');
    }

    public function destroy(JenisUser $jenis_user)
    {
        $jenis_user->delete();
        return redirect()->route('jenis_user.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;
use Illuminate\Support\Facades\Auth;


class SatuanController extends Controller
{
    public function index()
    {
         $user = Auth::user();
        $satuans = Satuan::all();
        return view('dashboard.satuan.index', compact('satuans','user'));
    }

    public function create()
    {
         $user = Auth::user();
        return view('dashboard.satuan.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_satuan' => 'required',
        ]);
        Satuan::create($request->all());

        return redirect()->route('satuan')
            ->with('success', 'Satuan created successfully.');
    }


    public function edit(Satuan $satuan)
    {
         $user = Auth::user();
        return view('dashboard.satuan.edit',compact('satuan','user'));
    }

    public function update(Request $request, Satuan $satuan)
    {
        $request->validate([
            'nama_satuan' => 'required',
        ]);

        $satuan->update($request->all());

        return redirect()->route('satuan')
                        ->with('success','Satuan updated successfully');
    }

    public function destroy(Satuan $satuan)
    {
        $satuan->delete();

        return redirect()->route('satuan')
                        ->with('success','Satuan deleted successfully');
    }
}

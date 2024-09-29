<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        return view('dashboard.buku.index', compact('buku'));
    }

    public function create()
    {
        $kategori_buku = KategoriBuku::all();
        return view('dashboard.buku.create', compact('kategori_buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required|unique:buku',
            'judul' => 'required',
            'pengarang' => 'required',
            'kategori_buku_id' => 'required|exists:kategori_buku,id',
        ]);

        Buku::create($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit(Buku $buku)
    {
        $kategori_buku = KategoriBuku::all();
        return view('dashboard.buku.edit', compact('buku', 'kategori_buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'kode_buku' => 'required|unique:buku,kode_buku,' . $buku->id,
            'judul' => 'required',
            'pengarang' => 'required',
            'kategori_buku_id' => 'required|exists:kategori_buku,id',
        ]);

        $buku->update($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}

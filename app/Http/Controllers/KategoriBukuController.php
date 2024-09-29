<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    public function index()
    {
        $kategori_buku = KategoriBuku::all();
        return view('dashboard.kategori_buku.index', compact('kategori_buku'));
    }

    public function create()
    {
        return view('dashboard.kategori_buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_buku',
        ]);

        KategoriBuku::create($request->all());
        return redirect()->route('kategori_buku.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(KategoriBuku $kategori_buku)
    {
        return view('dashboard.kategori_buku.edit', compact('kategori_buku'));
    }

    public function update(Request $request, KategoriBuku $kategori_buku)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_buku,nama_kategori,' . $kategori_buku->id,
        ]);

        $kategori_buku->update($request->all());
        return redirect()->route('kategori_buku.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(KategoriBuku $kategori_buku)
    {
        $kategori_buku->delete();
        return redirect()->route('kategori_buku.index')->with('success', 'Kategori berhasil dihapus');
    }
}

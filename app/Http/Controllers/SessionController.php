<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class SessionController extends Controller
{
    public function index_mahasiswa(Request $request)

    {
         $user = Auth::user();
        $mahasiswas = $request->session()->get('mahasiswas', []);
        return view('dashboard.session.index_mahasiswa', compact('user'), ['mahasiswas' => $mahasiswas]);
    }

    public function store_mahasiswa(Request $request)
    {
        $mahasiswas = $request->session()->get('mahasiswas', []);
        $mahasiswa = [
            'nama_mahasiswa' => $request->get('nama_mahasiswa'),
            'nim' => $request->get('nim'),
        ];
        array_push($mahasiswas, $mahasiswa);
        $request->session()->put('mahasiswas', $mahasiswas);
        return redirect('/dashboard/mahasiswa');
    }

    public function update_mahasiswa(Request $request, $id)
{
    $mahasiswas = $request->session()->get('mahasiswas');
    $mahasiswa = [
        'nama_mahasiswa' => $request->get('nama_mahasiswa'),
        'nim' => $request->get('nim'),
    ];
    $mahasiswas[$id] = $mahasiswa;
    $request->session()->put('mahasiswas', $mahasiswas);
    return redirect('/dashboard/mahasiswa');
}


     public function index_ruangan(Request $request)

    {
         $user = Auth::user();
        $ruangans = $request->session()->get('ruangans', []);
        return view('dashboard.session.index_ruangan', compact('user'), ['ruangans' => $ruangans]);
    }

    public function store_ruangan(Request $request)
    {
        $ruangans = $request->session()->get('ruangans', []);
        $ruangan = [
            'nama_ruangan' => $request->get('nama_ruangan'),
        ];
        array_push($ruangans, $ruangan);
        $request->session()->put('ruangans', $ruangans);
        return redirect('/dashboard/ruangan');
    }




}

<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Http\Requests\StoreKecamatanRequest;
use App\Http\Requests\UpdateKecamatanRequest;
use Illuminate\Support\Facades\Auth;


class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   $user = Auth::user();
        $kecamatans = Kecamatan::all();
        return view('dashboard.kecamatan.index', compact('kecamatans','user'));
    }
}

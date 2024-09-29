<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PolosanController extends Controller
{
   public function index(Request $request)

    {
        $user = Auth::user();
     return view('dashboard.polosan.index', compact('user'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ErrorApplication;

class ErrorApplicationController extends Controller
{

  public function index()
{
    $errors = ErrorApplication::with('user')->where('delete_mark', 'N')->get();
    return view('dashboard.aktivitas.error_aplikasi', compact('errors'));
}


    public function show($id)
    {
        $error = ErrorApplication::findOrFail($id);
        return view('errors.show', compact('error'));
    }


    public function destroy($id)
    {
        $error = ErrorApplication::findOrFail($id);
        $error->delete_mark = 'Y';
        $error->save();

        return redirect()->route('errors.index')->with('success', 'Error marked as deleted.');
    }
}

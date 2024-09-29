<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserActivityController extends Controller
{
    public function index()
    {
        $activities = UserActivity::with('user')->get(); // Mengambil semua data aktivitas beserta data user
        return view('dashboard.aktivitas.user', ['activities' => $activities]);
    }

    public static function logActivityStatic($userId, $description, $status)
    {
        UserActivity::create([
            'user_id' => $userId,
            'diskripsi' => $description,
            'status' => $status,
            'stand' => now(),
            'delete_mark' => 'N',
        ]);
    }

    public function logActivity($description, $status)
    {
        $userId = Auth::id();
        self::logActivityStatic($userId, $description, $status);
    }

    public function someAction(Request $request)
    {

        $this->logActivity('User melakukan aksi tertentu', 'A');
        return response()->json(['message' => 'Aksi berhasil dicatat.']);
    }
}

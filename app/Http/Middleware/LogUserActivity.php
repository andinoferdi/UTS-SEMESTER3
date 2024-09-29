<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserActivityController;

class LogUserActivity
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (Auth::check()) {
            $userId = Auth::id();
            $description = 'User mengakses URL: ' . $request->url();
            $status = 'Online';
            UserActivityController::logActivityStatic($userId, $description, $status);
        }

        return $response;
    }
}


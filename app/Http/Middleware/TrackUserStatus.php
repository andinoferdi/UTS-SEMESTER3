<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Pastikan Anda mengimpor model User yang benar

class TrackUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user instanceof User) {
                $user->status_user = true;
                $user->update_date = now();
                $user->save();
            } else {
                Log::error('User instance is not valid User model.');
            }
        }

        return $next($request);
    }
}

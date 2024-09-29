<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\ErrorApplication;
use Illuminate\Support\Facades\Auth;

class LogApplicationError
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */public function handle(Request $request, Closure $next)
{
    try {
        return $next($request);
    } catch (\Exception $e) {
        ErrorApplication::create([
            'user_id' => Auth::id(),
            'module' => $request->route()->getAction('namespace'),
            'controller' => $request->route()->getAction('controller'),
            'function' => $request->route()->getActionMethod(),
            'error_message' => $e->getMessage(),
            'status' => '1',
        ]);
        throw $e;
    }
}
}

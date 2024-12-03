<?php

namespace App\Http\Middleware;

use App\Models\ErrorApplication;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class LogErrorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            return $next($request);
        } catch (Throwable $exception) {
            ErrorApplication::create([
                'controller'    => $request->route()->getController() ? class_basename($request->route()->getController()) : 'Unknown Controller',
                'method'        => $request->route()->getActionMethod(),
                'message' => $exception->getMessage(),
                'stack_trace'   => $exception->getTraceAsString(),
                'url'           => $request->fullUrl(),
                'ip_address'    => $request->ipAddress(),
            ]);
            throw $exception;
        }
    }
}

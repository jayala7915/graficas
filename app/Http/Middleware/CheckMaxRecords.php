<?php

namespace App\Http\Middleware;

use App\Models\SeccionMedia;
use Closure;

class CheckMaxRecords
{
    public function handle($request, Closure $next)
    {
        if (!SeccionMedia::canCreateMore()) {
            if ($request->ajax()) {
                return response()->json(['error' => 'No se pueden crear más de 3 registros'], 403);
            }
            return redirect()->route('seccion-media.index')
                            ->with('error', 'No se pueden crear más de 3 registros');
        }

        return $next($request);
    }
}

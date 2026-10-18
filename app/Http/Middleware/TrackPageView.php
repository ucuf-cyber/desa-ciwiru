<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageView
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        try {
            if ($request->isMethod('GET') && !$request->is('admin*') && !$request->is('login*') && !$request->is('storage/*')) {
                PageView::create([
                    'url' => $request->path(),
                    'ip' => $request->ip(),
                    'user_agent' => substr((string) $request->userAgent(), 0, 250),
                    'viewed_at' => now(),
                ]);
            }
        } catch (\Throwable $e) {
            // silent
        }

        return $response;
    }
}

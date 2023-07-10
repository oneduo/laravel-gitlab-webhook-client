<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AcceptJsonMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}

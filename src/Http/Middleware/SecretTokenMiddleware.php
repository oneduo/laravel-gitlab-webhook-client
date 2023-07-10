<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class SecretTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $secret = config('gitlab-webhook-client.secret_token');

        if ($secret === null) {
            return $next($request);
        }

        $headerName = 'x-gitlab-token';

        if ($request->header($headerName) === $secret) {
            return $next($request);
        }

        throw new AuthorizationException('Invalid secret token provided', 403);
    }
}

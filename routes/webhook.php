<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Oneduo\LaravelGitlabWebhookClient\Http\Controllers\WebhookController;
use Oneduo\LaravelGitlabWebhookClient\Http\Middleware\AcceptJsonMiddleware;
use Oneduo\LaravelGitlabWebhookClient\Http\Middleware\SecretTokenMiddleware;

if (config('gitlab-webhook-client.route_enabled')) {
    Route::post(config('gitlab-webhook-client.route_path'), WebhookController::class)
        ->middleware([AcceptJsonMiddleware::class, SecretTokenMiddleware::class])
        ->name(config('gitlab-webhook-client.route_name'));
}

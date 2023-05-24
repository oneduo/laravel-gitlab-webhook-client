<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Oneduo\LaravelGitlabWebhookClient\Http\Controllers\WebhookController;

if (config('gitlab-webhook-client.route_enabled')) {
    Route::post('gitlab-webhook', [WebhookController::class, 'handle'])
        ->name('gitlab-webhook');
}

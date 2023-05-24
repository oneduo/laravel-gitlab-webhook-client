<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Tests;

use Oneduo\LaravelGitlabWebhookClient\LaravelGitlabWebhookClientServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\LaravelData\LaravelDataServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelGitlabWebhookClientServiceProvider::class,
            LaravelDataServiceProvider::class,
        ];
    }
}

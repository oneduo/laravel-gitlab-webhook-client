<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelGitlabWebhookClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-gitlab-webhook-client')
            ->hasRoute('webhook')
            ->hasConfigFile();
    }
}

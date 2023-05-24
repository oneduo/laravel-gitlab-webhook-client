<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Contracts;

interface WebhookEventContract
{
    public static function build(string $uuid, array $payload, array $headers): self;
}

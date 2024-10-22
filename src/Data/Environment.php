<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Data;

class Environment extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $action,
        public readonly ?string $deployment_tier,
    ) {}
}

<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Data;

class Repository extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $url,
        public readonly ?string $description,
        public readonly ?string $homepage,
    ) {
    }
}

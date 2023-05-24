<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Data;

class Repository extends Data
{
    public function __construct(
        public string $name,
        public string $url,
        public string $description,
        public string $homepage,
    ) {
    }
}

<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Data;

class Author extends Data
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
    ) {}
}

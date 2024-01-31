<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Data;

class CiVariable extends Data
{
    public function __construct(
        public readonly string $key,
        public readonly ?string $value = null,
    ) {
    }
}

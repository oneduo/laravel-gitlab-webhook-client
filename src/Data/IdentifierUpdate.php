<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Data;

class IdentifierUpdate extends Data
{
    public function __construct(
        public readonly ?int $previous,
        public readonly ?int $current,
    ) {
    }
}

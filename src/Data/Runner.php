<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Data;

class Runner extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $description,
        public readonly string $runner_type,
        public readonly bool $active,
        public readonly bool $is_shared,
        /** @var array<string> */
        public readonly ?array $tags,
    ) {
    }
}

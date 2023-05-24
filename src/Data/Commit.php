<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class Commit extends Data
{
    public function __construct(
        public string $id,
        public string $message,
        public string $title,
        #[WithCast(DateTimeInterfaceCast::class)]
        public Carbon $timestamp,
        public string $url,
        public Author $author,
        public ?array $added,
        public ?array $modified,
        public ?array $removed,
    ) {
    }
}

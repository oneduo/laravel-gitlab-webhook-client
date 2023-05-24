<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class Label extends Data
{
    public function __construct(
        public int $id,
        public string $title,
        public string $color,
        public int $project_id,
        #[WithCast(DateTimeInterfaceCast::class)]
        public Carbon $created_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public Carbon $updated_at,
        public bool $template,
        public string $description,
        public string $type,
        public int $group_id,
    ) {
    }
}

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
        public readonly int $id,
        public readonly int $project_id,
        public readonly bool $template,
        public readonly string $title,
        public readonly ?int $group_id,
        public readonly ?string $color,
        public readonly ?string $description,
        public readonly ?string $type,
        #[WithCast(DateTimeInterfaceCast::class)]
        public readonly Carbon $created_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public readonly ?Carbon $updated_at,
    ) {
    }
}

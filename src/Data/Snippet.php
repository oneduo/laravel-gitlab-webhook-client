<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Carbon\Carbon;
use Oneduo\LaravelGitlabWebhookClient\Data\Casts\GitlabUTCDatetimeCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class Snippet extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly int $author_id,
        public readonly int $project_id,
        public readonly string $url,
        public readonly ?int $visibility_level,
        public readonly ?string $content,
        public readonly ?string $file_name,
        public readonly ?string $title,
        public readonly ?string $type,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly ?Carbon $created_at,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly ?Carbon $updated_at,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly ?Carbon $expires_at,
    ) {
    }
}

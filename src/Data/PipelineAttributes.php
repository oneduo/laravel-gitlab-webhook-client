<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Carbon\Carbon;
use Oneduo\LaravelGitlabWebhookClient\Data\Casts\GitlabUTCDatetimeCast;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class PipelineAttributes extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly int $iid,
        public readonly ?string $name,
        public readonly ?string $ref,
        public readonly bool $tag,
        public readonly ?string $sha,
        public readonly ?string $before_sha,
        public readonly ?string $source,
        public readonly ?string $status,
        public readonly ?string $detailed_status,
        /** @var array<string> */
        public readonly ?array $stages,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly Carbon $created_at,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly Carbon $finished_at,
        public readonly int $duration,
        public readonly int $queued_duration,
        #[DataCollectionOf(CiVariable::class)]
        public readonly ?DataCollection $variables,
        public readonly ?string $url,
    ) {
    }
}

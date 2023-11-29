<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Carbon\Carbon;
use Oneduo\LaravelGitlabWebhookClient\Data\Casts\GitlabUTCDatetimeCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class Job extends Data
{
    public function __construct(
        public readonly int $id,
        public readonly string $stage,
        public readonly string $name,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly Carbon $created_at,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly ?Carbon $started_at,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly ?Carbon $finished_at,
        public readonly ?float $duration,
        public readonly ?float $queued_duration,
        public readonly ?string $failure_reason,
        public readonly string $when,
        public readonly bool $manual,
        public readonly bool $allow_failure,
        public readonly User $user,
        public readonly Runner $runner,
        public readonly ArtifactsFile $artifacts_file,
        public readonly ?Environment $environment,
    ) {
    }
}

<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Carbon\Carbon;
use Oneduo\LaravelGitlabWebhookClient\Data\Casts\GitlabUTCDatetimeCast;
use Oneduo\LaravelGitlabWebhookClient\Enums\NotableType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class Note extends Data
{
    public function __construct(
        public readonly Project $project,
        public readonly Repository $repository,
        public readonly User $user,
        public readonly ?Commit $commit,
        public readonly ?MergeRequest $merge_request,
        public readonly ?Snippet $snippet,

        public readonly int $id,
        public readonly ?int $noteable_id,
        public readonly NotableType $noteable_type,
        public readonly int $author_id,
        public readonly int $project_id,
        public readonly ?string $note,
        public readonly ?string $attachment,
        public readonly ?string $line_code,
        public readonly ?string $commit_id,
        public readonly ?bool $system,
        public readonly ?StDiff $st_diff,
        public readonly string $url,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly Carbon $created_at,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly ?Carbon $updated_at,
    ) {}
}

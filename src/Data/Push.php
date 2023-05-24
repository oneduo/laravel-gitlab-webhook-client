<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class Push extends Data
{
    public function __construct(
        public readonly Project $project,
        public readonly Repository $repository,
        #[DataCollectionOf(Commit::class)]
        public readonly DataCollection $commits,

        public readonly string $before,
        public readonly string $after,
        public readonly string $ref,
        public readonly string $checkout_sha,
        public readonly ?string $message,
        public readonly int $user_id,
        public readonly ?string $user_name,
        public readonly ?string $user_username,
        public readonly ?string $user_email,
        public readonly ?string $user_avatar,
        public readonly int $project_id,
        public readonly int $total_commits_count,
        public readonly ?array $push_options,
    ) {
    }
}

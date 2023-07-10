<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Carbon\Carbon;
use Oneduo\LaravelGitlabWebhookClient\Data\Casts\GitlabUTCDatetimeCast;
use Oneduo\LaravelGitlabWebhookClient\Enums\IssueAction;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class Issue extends Data
{
    public function __construct(
        public readonly User $user,
        public readonly Project $project,
        public readonly Repository $repository,
        #[DataCollectionOf(Label::class)]
        public readonly ?DataCollection $labels,
        #[DataCollectionOf(User::class)]
        public readonly ?DataCollection $assignees,
        public readonly ?User $assignee,
        public readonly ?IssueChanges $changes,

        public readonly int $id,
        public readonly int $iid,
        public readonly IssueAction $action,
        public readonly int $author_id,
        public readonly int $project_id,
        public readonly string $title,
        public readonly string $url,
        public readonly ?array $assignee_ids,
        public readonly ?array $escalation_policy,
        public readonly ?bool $confidential,
        public readonly ?bool $discussion_locked,
        public readonly ?int $assignee_id,
        public readonly ?int $duplicated_to_id,
        public readonly ?int $last_edited_by_id,
        public readonly ?int $milestone_id,
        public readonly ?int $moved_to_id,
        public readonly ?int $relative_position,
        public readonly ?int $state_id,
        public readonly ?int $time_change,
        public readonly ?int $time_estimate,
        public readonly ?int $total_time_spent,
        public readonly ?int $updated_by_id,
        public readonly ?int $weight,
        public readonly ?string $description,
        public readonly ?string $escalation_status,
        public readonly ?string $health_status,
        public readonly ?string $human_time_change,
        public readonly ?string $human_time_estimate,
        public readonly ?string $human_total_time_spent,
        public readonly ?string $severity,
        public readonly ?string $state,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly Carbon $created_at,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly ?Carbon $updated_at,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly ?Carbon $last_edited_at,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly ?Carbon $due_date,
    ) {
    }
}

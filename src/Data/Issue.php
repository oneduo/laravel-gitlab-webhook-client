<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class Issue extends Data
{
    public function __construct(
        public readonly User $user,
        public readonly Project $project,
        public readonly Repository $repository,
        #[DataCollectionOf(Label::class)]
        public readonly DataCollection $labels,
        #[DataCollectionOf(User::class)]
        public readonly DataCollection $assignees,
        public readonly User $assignee,
        public readonly IssueChanges $changes,

        public readonly int $id,
        public readonly string $title,
        public readonly array $assignee_ids,
        public readonly int $assignee_id,
        public readonly int $author_id,
        public readonly int $project_id,
        #[WithCast(DateTimeInterfaceCast::class)]
        public readonly Carbon $created_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public readonly Carbon $updated_at,
        public readonly ?int $updated_by_id,
        public readonly ?string $last_edited_at,
        public readonly ?int $last_edited_by_id,
        public readonly int $relative_position,
        public readonly ?string $description,
        public readonly ?int $milestone_id,
        public readonly int $state_id,
        public readonly bool $confidential,
        public readonly bool $discussion_locked,
        #[WithCast(DateTimeInterfaceCast::class)]
        public readonly ?Carbon $due_date,
        public readonly ?int $moved_to_id,
        public readonly ?int $duplicated_to_id,
        public readonly int $time_estimate,
        public readonly int $total_time_spent,
        public readonly int $time_change,
        public readonly ?string $human_total_time_spent,
        public readonly ?string $human_time_estimate,
        public readonly ?string $human_time_change,
        public readonly ?int $weight,
        public readonly string $health_status,
        public readonly int $iid,
        public readonly string $url,
        public readonly string $state,
        public readonly string $action,
        public readonly string $severity,
        public readonly string $escalation_status,
        public readonly array $escalation_policy,
    ) {
    }
}

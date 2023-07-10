<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Carbon\Carbon;
use Oneduo\LaravelGitlabWebhookClient\Enums\MergeRequestAction;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class MergeRequest extends Data
{
    public function __construct(
        public readonly User $user,
        public readonly Project $project,
        public readonly Repository $repository,
        #[DataCollectionOf(Label::class)]
        public readonly ?DataCollection $labels,
        public readonly ?MergeRequestChanges $changes,
        #[DataCollectionOf(User::class)]
        public readonly ?DataCollection $assignees,

        public readonly Project $source,
        public readonly Project $target,
        public readonly ?Commit $last_commit,

        public readonly int $id,
        public readonly int $iid,
        public readonly MergeRequestAction $action,
        public readonly int $author_id,
        public readonly int $source_project_id,
        public readonly int $target_project_id,
        public readonly string $title,
        public readonly string $merge_status,
        public readonly string $url,
        public readonly ?array $assignee_ids,
        public readonly ?array $reviewer_ids,
        public readonly ?bool $blocking_discussions_resolved,
        public readonly ?bool $first_contribution,
        public readonly ?bool $work_in_progress,
        public readonly ?int $assignee_id,
        public readonly ?int $last_edited_by_id,
        public readonly ?int $milestone_id,
        public readonly ?int $state_id,
        public readonly ?int $time_change,
        public readonly ?int $total_time_spent,
        public readonly ?string $description,
        public readonly ?string $human_time_change,
        public readonly ?string $human_time_estimate,
        public readonly ?string $human_total_time_spent,
        public readonly ?string $source_branch,
        public readonly ?string $state,
        public readonly ?string $target_branch,
        #[WithCast(DateTimeInterfaceCast::class)]
        public readonly Carbon $created_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public readonly ?Carbon $updated_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public readonly ?Carbon $last_edited_at,
    ) {
    }
}

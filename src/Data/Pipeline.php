<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class Pipeline extends Data
{
    public function __construct(
        public readonly PipelineAttributes $attributes,
        public readonly ?MergeRequest $merge_request,
        public readonly User $user,
        public readonly Project $project,
        public readonly ?Commit $commit,
        #[DataCollectionOf(Job::class)]
        public readonly ?DataCollection $jobs,
    ) {}
}

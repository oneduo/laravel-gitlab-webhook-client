<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Oneduo\LaravelGitlabWebhookClient\Contracts\WebhookEventContract;
use Oneduo\LaravelGitlabWebhookClient\Data\MergeRequest;

class MergeRequestEvent implements WebhookEventContract
{
    use Dispatchable;

    public function __construct(
        public readonly string $uuid,
        public readonly array $headers,
        public readonly MergeRequest $mergeRequest,
    ) {
    }

    public static function build(string $uuid, array $payload, array $headers): self
    {
        return new self(
            uuid: $uuid,
            headers: $headers,
            mergeRequest: MergeRequest::from([
                'user' => data_get($payload, 'user'),
                'project' => data_get($payload, 'project'),
                'repository' => data_get($payload, 'repository'),
                'reviewers' => data_get($payload, 'reviewers'),
                'assignees' => data_get($payload, 'assignees'),
                'labels' => data_get($payload, 'labels'),
                'changes' => data_get($payload, 'changes'),
                ...data_get($payload, 'object_attributes', []),
            ]),
        );
    }
}

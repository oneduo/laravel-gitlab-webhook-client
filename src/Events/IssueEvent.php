<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Oneduo\LaravelGitlabWebhookClient\Contracts\WebhookEventContract;
use Oneduo\LaravelGitlabWebhookClient\Data\Issue;

class IssueEvent implements WebhookEventContract
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public readonly string $uuid,
        public readonly array $headers,
        public readonly Issue $issue,
    ) {
    }

    public static function build(string $uuid, array $payload, array $headers): self
    {
        return new self(
            uuid: $uuid,
            headers: $headers,
            issue: Issue::from([
                'user' => data_get($payload, 'user'),
                'project' => data_get($payload, 'project'),
                'repository' => data_get($payload, 'repository'),
                'assignee' => data_get($payload, 'assignee'),
                'assignees' => data_get($payload, 'assignees'),
                'labels' => data_get($payload, 'labels'),
                'changes' => data_get($payload, 'changes'),
                ...data_get($payload, 'object_attributes', []),
            ]),
        );
    }
}
<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Oneduo\LaravelGitlabWebhookClient\Contracts\WebhookEventContract;
use Oneduo\LaravelGitlabWebhookClient\Data\Pipeline;

class PipelineEvent implements WebhookEventContract
{
    use Dispatchable;

    public function __construct(
        public readonly string $uuid,
        public readonly array $headers,
        public readonly Pipeline $push,
    ) {
    }

    public static function build(string $uuid, array $payload, array $headers): self
    {
        return new self(
            uuid: $uuid,
            headers: $headers,
            push: Pipeline::from([
                'attributes' => data_get($payload, 'object_attributes'),
                'merge_request' => [
                    'user' => data_get($payload, 'user'),
                    'project' => data_get($payload, 'project'),
                    ...data_get($payload, 'merge_request'),
                ],
                'user' => data_get($payload, 'user'),
                'project' => data_get($payload, 'project'),
                'commit' => data_get($payload, 'commit'),
                'jobs' => data_get($payload, 'builds'),
            ]),
        );
    }
}

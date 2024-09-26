<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Oneduo\LaravelGitlabWebhookClient\Contracts\WebhookEventContract;
use Oneduo\LaravelGitlabWebhookClient\Data\Push;

class PushEvent implements WebhookEventContract
{
    use Dispatchable;

    public function __construct(
        public readonly string $uuid,
        public readonly array $headers,
        public readonly Push $push,
    ) {}

    public static function build(string $uuid, array $payload, array $headers): self
    {
        return new self(
            uuid: $uuid,
            headers: $headers,
            push: Push::from([
                'project' => data_get($payload, 'project'),
                'repository' => data_get($payload, 'repository'),
                'commits' => data_get($payload, 'commits'),
                ...$payload,
            ]),
        );
    }
}

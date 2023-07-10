<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Oneduo\LaravelGitlabWebhookClient\Contracts\WebhookEventContract;
use Oneduo\LaravelGitlabWebhookClient\Data\Note;

class NoteEvent implements WebhookEventContract
{
    use Dispatchable;

    public function __construct(
        public readonly string $uuid,
        public readonly array $headers,
        public readonly Note $note,
    ) {
    }

    public static function build(string $uuid, array $payload, array $headers): self
    {
        return new self(
            uuid: $uuid,
            headers: $headers,
            note: Note::from([
                'project' => data_get($payload, 'project'),
                'repository' => data_get($payload, 'repository'),
                'commit' => data_get($payload, 'commits'),
                'merge_request' => data_get($payload, 'merge_request'),
                'issue' => data_get($payload, 'issue'),
                'snippet' => data_get($payload, 'snippet'),
                'user' => data_get($payload, 'user'),
                ...data_get($payload, 'object_attributes', []),
            ]),
        );
    }
}

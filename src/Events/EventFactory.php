<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Events;

use Oneduo\LaravelGitlabWebhookClient\Contracts\WebhookEventContract;
use Oneduo\LaravelGitlabWebhookClient\Enums\EventType;

class EventFactory
{
    public static function create(string $uuid, array $payload, array $headers): ?WebhookEventContract
    {
        /** @var class-string<\Oneduo\LaravelGitlabWebhookClient\Contracts\WebhookEventContract>|null $class */
        $class = match (EventType::tryFrom(data_get($payload, 'object_kind'))) {
            EventType::ISSUE => IssueEvent::class,
            EventType::MERGE_REQUEST => MergeRequestEvent::class,
            EventType::NOTE => NoteEvent::class,
            EventType::PIPELINE => PipelineEvent::class,
            EventType::PUSH => PushEvent::class,
            default => null,
        };

        if ($class === null) {
            return null;
        }

        return $class::build($uuid, $payload, $headers);
    }
}

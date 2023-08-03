<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Enums;

enum EventType: string
{
    case ISSUE = 'issue';
    case MERGE_REQUEST = 'merge_request';
    case NOTE = 'note';
    case PIPELINE = 'pipeline';
    case PUSH = 'push';
}

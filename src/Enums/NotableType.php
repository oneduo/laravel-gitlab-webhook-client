<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Enums;

enum NotableType: string
{
    case ISSUE = 'Issue';
    case MERGE_REQUEST = 'MergeRequest';
    case COMMIT = 'Commit';
    case SNIPPET = 'Snippet';
}

<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Enums;

enum IssueAction: string
{
    case OPEN = 'open';
    case CLOSE = 'close';
    case REOPEN = 'reopen';
    case UPDATE = 'update';
}

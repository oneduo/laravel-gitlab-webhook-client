<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Enums;

enum MergeRequestAction: string
{
    case OPEN = 'open';
    case CLOSE = 'close';
    case REOPEN = 'reopen';
    case UPDATE = 'update';
    case APPROVED = 'approved';
    case UNAPPROVED = 'unapproved';
    case APPROVAL = 'approval';
    case UNAPPROVAL = 'unapproval';
    case MERGE = 'merge';
}

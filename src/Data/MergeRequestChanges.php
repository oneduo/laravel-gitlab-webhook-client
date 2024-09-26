<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Data;

class MergeRequestChanges extends Data
{
    public function __construct(
        public readonly ?IdentifierUpdate $updated_by_id,
        public readonly ?TimeUpdate $updated_at,
        public readonly ?LabelUpdate $labels,
        public readonly ?TimeUpdate $last_edited_at,
        public readonly ?IdentifierUpdate $last_edited_by_id,
    ) {}
}

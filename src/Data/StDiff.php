<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Data;

class StDiff extends Data
{
    public function __construct(
        public readonly ?bool $deleted_file,
        public readonly ?bool $new_file,
        public readonly ?bool $renamed_file,
        public readonly ?string $a_mode,
        public readonly ?string $b_mode,
        public readonly ?string $diff,
        public readonly ?string $new_path,
        public readonly ?string $old_path,
    ) {
    }
}

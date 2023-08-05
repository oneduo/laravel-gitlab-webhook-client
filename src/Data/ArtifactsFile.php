<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Data;

class ArtifactsFile extends Data
{
    public function __construct(
        public readonly ?string $filename,
        public readonly ?string $size,
    ) {
    }
}

<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Carbon\Carbon;
use Oneduo\LaravelGitlabWebhookClient\Data\Casts\GitlabUTCDatetimeCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class TimeUpdate extends Data
{
    public function __construct(
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly ?Carbon $previous,
        #[WithCast(GitlabUTCDatetimeCast::class)]
        public readonly ?Carbon $current,
    ) {
    }
}

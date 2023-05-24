<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data\Casts;

use Carbon\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class GitlabUTCDatetimeCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): ?Carbon
    {
        $value = is_string($value) ? str_replace('UTC', '', $value) : null;

        return $value ? Carbon::parse($value) : null;
    }
}

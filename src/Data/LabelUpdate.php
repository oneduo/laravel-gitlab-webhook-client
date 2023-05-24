<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class LabelUpdate extends Data
{
    public function __construct(
        #[DataCollectionOf(Label::class)]
        public readonly DataCollection $previous,
        #[DataCollectionOf(Label::class)]
        public readonly DataCollection $current,
    ) {
    }
}

<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Event;
use Oneduo\LaravelGitlabWebhookClient\Events\MergeRequestEvent;

it('dispatches an event for MergeRequestEvent', function () {
    Event::fake();

    sendWebhook(__DIR__.'/../Fixtures/mr.json')
        ->assertNoContent();

    Event::assertDispatched(MergeRequestEvent::class);
});

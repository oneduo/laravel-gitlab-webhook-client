<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Event;
use Oneduo\LaravelGitlabWebhookClient\Events\IssueEvent;
use Oneduo\LaravelGitlabWebhookClient\Events\MergeRequestEvent;

it('does not dispatch an event when push type event_type is unknown', function () {
    Event::fake([
        IssueEvent::class,
        MergeRequestEvent::class,
    ]);

    sendWebhook(__DIR__.'/../fixtures/unknown.json')
        ->assertServerError();

    Event::assertNothingDispatched();
});

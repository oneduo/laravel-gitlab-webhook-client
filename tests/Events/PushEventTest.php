<?php

use Illuminate\Support\Facades\Event;
use Oneduo\LaravelGitlabWebhookClient\Events\PushEvent;

it('dispatches an event for IssueEvent', function () {
    Event::fake();

    sendWebhook(__DIR__.'/../Fixtures/push.json')
        ->assertNoContent();

    Event::assertDispatched(PushEvent::class);
});

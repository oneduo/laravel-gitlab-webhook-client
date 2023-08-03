<?php

use Illuminate\Support\Facades\Event;
use Oneduo\LaravelGitlabWebhookClient\Events\IssueEvent;

it('dispatches an event for IssueEvent', function () {
    Event::fake();

    sendWebhook(__DIR__.'/../Fixtures/issue.json')
        ->assertNoContent();

    Event::assertDispatched(IssueEvent::class);
});

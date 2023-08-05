<?php

use Illuminate\Support\Facades\Event;
use Oneduo\LaravelGitlabWebhookClient\Events\PipelineEvent;

it('dispatches an event for PipelineEvent', function () {
    Event::fake();

    sendWebhook(__DIR__.'/../Fixtures/pipeline.json')
        ->assertNoContent();

    Event::assertDispatched(PipelineEvent::class);
});

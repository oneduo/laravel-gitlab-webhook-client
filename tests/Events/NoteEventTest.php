<?php

use Illuminate\Support\Facades\Event;
use Oneduo\LaravelGitlabWebhookClient\Events\NoteEvent;

it('dispatches an event for NoteEvent', function () {
    Event::fake();

    sendWebhook(__DIR__.'/../Fixtures/note.json')
        ->assertNoContent();

    Event::assertDispatched(NoteEvent::class);
});

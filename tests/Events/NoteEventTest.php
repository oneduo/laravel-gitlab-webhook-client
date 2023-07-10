<?php

use Illuminate\Support\Facades\Event;
use Oneduo\LaravelGitlabWebhookClient\Events\NoteEvent;

it('dispatches an event for NoteEvent', function () {
    $this->withoutExceptionHandling();

    Event::fake();

    sendWebhook(__DIR__.'/../fixtures/note.json')
        ->assertNoContent();

    Event::assertDispatched(NoteEvent::class);
});

<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Oneduo\LaravelGitlabWebhookClient\Events\EventFactory;

class WebhookController extends Controller
{
    public function __invoke(Request $request): Response|JsonResponse
    {
        /** @var \Oneduo\LaravelGitlabWebhookClient\Contracts\WebhookEventContract $object */
        $object = EventFactory::create(
            uuid: $request->header('x-gitlab-event-uuid'),
            payload: $request->input(),
            headers: collect($request->headers->all())
                ->keys()
                ->filter(fn (string $key) => str_starts_with($key, 'x-gitlab'))
                ->mapWithKeys(fn (string $header) => [$header => $request->header($header)])
                ->toArray(),
        );

        event($object);

        return response()->noContent();
    }
}

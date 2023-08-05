<?php

use Illuminate\Testing\TestResponse;
use Oneduo\LaravelGitlabWebhookClient\Tests\TestCase;
use function Pest\Laravel\postJson;

uses(TestCase::class)->in(__DIR__);

function sendWebhook(string|array $data, array $headers = [], ?string $hookName = 'Gitlab'): TestResponse
{
    return postJson(
        uri: route(config('gitlab-webhook-client.route_name')),
        data: is_string($data) ? json_decode(file_get_contents($data), true) : $data,
        headers: [
            'X-Gitlab-Event-UUID' => fake()->uuid(),
            'X-Gitlab-Event' => "$hookName Hook",
            'X-Gitlab-Instance' => 'https://gitlab.com',
            ...$headers,
        ],
    );
}

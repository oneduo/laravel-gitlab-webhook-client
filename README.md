# A client to handle incoming Gitlab webhook requests

[![Latest Version on Packagist](https://img.shields.io/packagist/v/oneduo/laravel-gitlab-webhook-client.svg?style=flat-square)](https://packagist.org/packages/oneduo/laravel-gitlab-webhook-client)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/oneduo/laravel-gitlab-webhook-client/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/oneduo/laravel-gitlab-webhook-client/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/oneduo/laravel-gitlab-webhook-client/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/oneduo/laravel-gitlab-webhook-client/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/oneduo/laravel-gitlab-webhook-client.svg?style=flat-square)](https://packagist.org/packages/oneduo/laravel-gitlab-webhook-client)

This a tiny client that allows you to listen to Gitlab webhooks in your Laravel application. You may use the events
dispatched and use the data they provide to perform actions in your application.

## Webhook types supported:

- [x] [Push Events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#push-events)
- [ ] [Tag Events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#tag-events)
- [x] [Issue Events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#issue-events)
- [x] [Comments Events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#comment-events)
- [x] [Merge request Events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#merge-request-events)
- [ ] [Wiki page Events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#wiki-page-events)
- [x] [Pipeline Events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#pipeline-events)
- [ ] [Job Events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#job-events)
- [ ] [Deployment Events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#deployment-events)
- [ ] [Release Events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#group-member-events)
- [ ] [Subgroup Events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#subgroup-events)
- [ ] [Feature flag Events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#feature-flag-events)
- [ ] [Release events](https://docs.gitlab.com/ee/user/project/integrations/webhook_events.html#release-events)

## Installation

You can install the package via composer:

```bash
composer require oneduo/laravel-gitlab-webhook-client
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="gitlab-webhook-client-config"
```

This is the contents of the published config file:

```php
<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Webhook route
    |--------------------------------------------------------------------------
    |
    | Here you may choose to enable the default webhook route provided by
    | the package. If you decide to disable this, you should manually register
    | the route in your application and implement the event dispatching logic
    | within your route.
    |
    | This registers the following route: POST /gitlab-webhook
    |
    | default: true
    */
    'route_enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Secret Token Middleware
    |--------------------------------------------------------------------------
    |
    | You may set the value of the secret token defined in Gitlab.
    | The package will validate all incoming requests against this given token,
    | and reject all unauthorized requests.
    |
    | Set the value to NULL to disable the middleware.
    |
    | default: null
    */
    'secret_token' => env('GITLAB_WEBHOOK_SECRET_TOKEN'),
];

```

## Usage

### Setting up Gitlab

To get started, you must first set up a webhook in your Gitlab project.  
You may follow the official documentation provided
here https://docs.gitlab.com/ee/user/project/integrations/webhooks.html.

### Setting up the webhook url

By default, when the `route_enabled` config is set to true, the package automatically registers a route to handle all
incoming webhook requests.  
It is registered as `POST /gitlab-webhook` and you may inspect your routes using the `php artisan route:list` command.

> **Note** If you wish to implement your own route, please take a look at the `WebhookController` to implement a similar
> logic to
> dispatch events.

When Gitlab sends a webhook request to your application, the package will dispatch an event based on the type of webhook
received.

For instance, if Gitlab sends a `merge request` webhook, the package will dispatch a `MergeRequestEvent` event.

You may register your own listener like this:

```php
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        MergeRequestEvent::class => [
            MergeRequestEventListener::class,
        ],
    ];
}
```

All the events are type-hinted to provide easy access to the event attributes and data:

```php
<?php

declare(strict_types=1);

namespace App;

use App\Gitlab\Events\MergeRequestEvent;

class MergeRequestEventListener
{
    public function handle(MergeRequestEvent $event): void
    {
        logger()->info('New merge request event received');
        logger()->info($event->mergeRequest->title);
        logger()->info('By: ' . $event->mergeRequest->last_commit->author->email);
    }
}
```

> **Note** You may use individual event listeners for each event type or use a single listener that listens
> to `WebhookEventContract` that will catch all events dispatched.

> **Note** Please note that some attributes and data is considered **nullable**, and you must implement the necessary
> null checks on these values.

### Deduplication

Webhook deduplication is not guaranteed by Gitlab. You may use the `uuid` property on each event to handle deduplication
within your application.

### Security

Each event exposes the headers provided by Gitlab. You may use the `X-Gitlab-Token` header to verify the request
authenticity against the secret token you have set in your Gitlab project settings.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Charaf Rezrazi](https://github.com/Rezrazi)
- [Mikaël Popowicz](https://github.com/mikaelpopowicz)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

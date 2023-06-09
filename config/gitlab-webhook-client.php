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
    | Default: true
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
    | Default: null
    */
    'secret_token' => env('GITLAB_WEBHOOK_SECRET_TOKEN'),
];

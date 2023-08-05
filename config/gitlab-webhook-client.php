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
    | See "route_path" and "route_name" config options for further customisation.
    |
    | Default: true
    */
    'route_enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | Webhook route's path
    |--------------------------------------------------------------------------
    |
    | Here you may choose path under which webhook route is registered.
    |
    | This registers the route with POST method under specified path.
    | Leading path is not required.
    |
    | Default: gitlab-webhook
    */
    'route_path' => env('GITLAB_WEBHOOK_ROUTE_PATH', 'gitlab-webhook'),

    /*
    |--------------------------------------------------------------------------
    | Webhook route's name (alias)
    |--------------------------------------------------------------------------
    |
    | Here you may choose name (alias) under which webhook route is registered.
    |
    | Default: gitlab-webhook
    */
    'route_name' => env('GITLAB_WEBHOOK_ROUTE_NAME', 'gitlab-webhook'),

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

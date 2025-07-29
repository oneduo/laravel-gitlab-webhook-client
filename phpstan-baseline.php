<?php

declare(strict_types=1);

$ignoreErrors = [];
$ignoreErrors[] = [
    'message' => '#^Called \'env\' outside of the config directory which returns null when the config is cached, use \'config\'\\.$#',
    'identifier' => 'larastan.noEnvCallsOutsideOfConfig',
    'count' => 3,
    'path' => __DIR__.'/config/gitlab-webhook-client.php',
];
$ignoreErrors[] = [
    'message' => '#^Call to an undefined method Pest\\\\PendingCalls\\\\TestCall\\:\\:expect\\(\\)\\.$#',
    'identifier' => 'method.notFound',
    'count' => 1,
    'path' => __DIR__.'/tests/ArchTest.php',
];

return ['parameters' => ['ignoreErrors' => $ignoreErrors]];

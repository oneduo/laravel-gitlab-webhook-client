<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Data;

class Project extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $name,
        public ?string $description,
        public ?string $web_url,
        public ?string $avatar_url,
        public ?string $git_ssh_url,
        public ?string $git_http_url,
        public ?string $namespace,
        public ?int $visibility_level,
        public ?string $path_with_namespace,
        public ?string $default_branch,
        public ?string $ci_config_path,
        public ?string $homepage,
        public ?string $url,
        public ?string $ssh_url,
        public ?string $http_url,
    ) {
    }
}

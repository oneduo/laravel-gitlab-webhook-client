<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Data;

use Spatie\LaravelData\Data;

class Project extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?string $name,
        public readonly ?string $url,
        public readonly ?string $description,
        public readonly ?string $web_url,
        public readonly ?string $avatar_url,
        public readonly ?string $git_ssh_url,
        public readonly ?string $git_http_url,
        public readonly ?string $namespace,
        public readonly ?int $visibility_level,
        public readonly ?string $path_with_namespace,
        public readonly ?string $default_branch,
        public readonly ?string $ci_config_path,
        public readonly ?string $homepage,
        public readonly ?string $ssh_url,
        public readonly ?string $http_url,
    ) {}
}

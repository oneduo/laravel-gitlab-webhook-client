<?php

declare(strict_types=1);

namespace Oneduo\LaravelGitlabWebhookClient\Enums;

/**
 * @see https://docs.gitlab.com/ee/api/merge_requests.html#merge-status
 * @see https://gitlab.com/gitlab-org/gitlab/-/blob/master/app/graphql/types/merge_requests/detailed_merge_status_enum.rb
 */
enum DetailedMergeStatus: string
{
    case APPROVALS_SYNCING = 'approvals_syncing';
    case BLOCKED_STATUS = 'blocked_status';
    case BROKEN_STATUS = 'broken_status';
    case CHECKING = 'checking';
    case CI_MUST_PASS = 'ci_must_pass';
    case CI_STILL_RUNNING = 'ci_still_running';
    case COMMITS_STATUS = 'commits_status';
    case CONFLICT = 'conflict';
    case DISCUSSIONS_NOT_RESOLVED = 'discussions_not_resolved';
    case DRAFT_STATUS = 'draft_status';
    case EXTERNAL_STATUS_CHECKS = 'external_status_checks';
    case JIRA_ASSOCIATION_MISSING = 'jira_association_missing';
    case LOCKED_PATHS = 'locked_paths';
    case LOCKED_LFS_FILES = 'locked_lfs_files';
    case MERGEABLE = 'mergeable';
    case MERGE_REQUEST_BLOCKED = 'merge_request_blocked';
    case MERGE_TIME = 'merge_time';
    case NEED_REBASE = 'need_rebase';
    case NOT_APPROVED = 'not_approved';
    case NOT_OPEN = 'not_open';
    case POLICIES_DENIED = 'policies_denied';
    case PREPARING = 'preparing';
    case REQUESTED_CHANGES = 'requested_changes';
    case SECURITY_POLICIES_EVALUATING = 'security_policy_evaluation';
    case UNCHECKED = 'unchecked';
}

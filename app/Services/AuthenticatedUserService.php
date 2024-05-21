<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\Identity\Role;
use App\Jobs\Workspaces\CreateMembership;
use App\Jobs\Workspaces\SubscribeToDefaultChannel;
use App\Models\Workspace;
use Illuminate\Bus\Dispatcher;

final readonly class AuthenticatedUserService
{
    public function __construct(
        private Dispatcher $queue,
    ) {
    }

    public function completeOnboarding(Workspace $workspace): void
    {
        $this->queue->chain(
            jobs: [
                $this->createAdminMembership(
                    workspace: $workspace,
                ),
                $this->subscribeUserToChannels(
                    workspace: $workspace,
                    user: $workspace->user_id,
                    role: Role::Admin,
                ),
            ],
        )->dispatch();
    }

    public function createAdminMembership(Workspace $workspace): CreateMembership
    {
        return new CreateMembership(
            workspace: $workspace->id,
            user: $workspace->user_id,
            role: Role::Admin,
        );
    }

    public function subscribeUserToChannels(Workspace $workspace, string $user, Role $role): SubscribeToDefaultChannel
    {
        return new SubscribeToDefaultChannel(
            workspace: $workspace,
            user: $user,
            role: $role,
        );
    }
}

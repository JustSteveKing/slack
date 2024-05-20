<?php

declare(strict_types=1);

namespace App\Observers;

use App\Enums\Identity\Role;
use App\Jobs\Workspaces\CreateDefaultChannels;
use App\Jobs\Workspaces\CreateMembership;
use App\Models\Workspace;
use Illuminate\Contracts\Bus\Dispatcher;

final readonly class WorkspaceObserver
{
    public function __construct(
        private Dispatcher $bus,
    ) {
    }

    public function created(Workspace $workspace): void
    {
        $this->bus->dispatch(
            command: new CreateMembership(
                workspace: $workspace->id,
                user: $workspace->user_id,
                role: Role::Admin,
            ),
        );

        $this->bus->dispatch(
            command: new CreateDefaultChannels(
                workspace: $workspace,
            ),
        );
    }
}

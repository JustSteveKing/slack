<?php

declare(strict_types=1);

namespace App\Observers;

use App\Enums\Identity\Role;
use App\Jobs\Workspaces\CreateDefaultChannels;
use App\Jobs\Workspaces\CreateMembership;
use App\Models\Workspace;
use App\Services\AuthenticatedUserService;
use Illuminate\Contracts\Bus\Dispatcher;

final readonly class WorkspaceObserver
{
    public function __construct(
        private AuthenticatedUserService $service,
    ) {
    }

    public function created(Workspace $workspace): void
    {
        $this->service->completeOnboarding(
            workspace: $workspace,
        );
    }
}

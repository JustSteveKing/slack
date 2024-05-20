<?php

declare(strict_types=1);

namespace App\Jobs\Workspaces;

use App\Enums\Identity\Role;
use App\Models\Membership;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\DatabaseManager;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class CreateMembership implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly string $workspace,
        public readonly string $user,
        public readonly Role $role,
    ) {
    }

    public function handle(DatabaseManager $database): void
    {
        $database->transaction(
            callback: fn () => Membership::query()->create(
                attributes: [
                    'role' => $this->role,
                    'user_id' => $this->user,
                    'workspace_id' => $this->workspace,
                ],
            ),
            attempts: 3,
        );
    }
}

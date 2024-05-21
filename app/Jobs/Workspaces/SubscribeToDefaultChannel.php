<?php

declare(strict_types=1);

namespace App\Jobs\Workspaces;

use App\Enums\Identity\Role;
use App\Enums\Workspace\Visibility;
use App\Factories\DefaultChannelFactory;
use App\Models\Channel;
use App\Models\User;
use App\Models\Workspace;

use function array_filter;

use function array_map;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\DatabaseManager;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class SubscribeToDefaultChannel implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly Workspace $workspace,
        public readonly string $user,
        public readonly Role $role = Role::Member,
    ) {
    }

    public function handle(DatabaseManager $database): void
    {
        /** @var User $user */
        $user = User::query()->findOrFail(
            id: $this->user,
        );

        $database->transaction(
            callback: fn () => array_map(
                callback: fn (array $channel) => $user->channels()->save(
                    model: Channel::query()->where(
                        column: 'reference',
                        operator: '=',
                        value: $channel['reference'],
                    )->where(
                        column: 'workspace_id',
                        operator: '=',
                        value: $this->workspace->id,
                    )->first(),
                ),
                array: array_filter(
                    array: DefaultChannelFactory::get(),
                    callback: function (array $channel) {
                        if (Role::Admin !== $this->role) {
                            return Visibility::Public === $channel['visibility'];
                        }

                        return $channel;
                    },
                ),
            ),
            attempts: 3,
        );
    }
}

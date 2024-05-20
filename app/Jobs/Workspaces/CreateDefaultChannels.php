<?php

declare(strict_types=1);

namespace App\Jobs\Workspaces;

use App\Factories\DefaultChannelFactory;
use App\Models\Channel;
use App\Models\Workspace;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\DatabaseManager;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use function array_map;
use function array_merge;

final class CreateDefaultChannels implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public readonly Workspace $workspace,
    ) {
    }

    public function handle(DatabaseManager $database): void
    {
        $database->transaction(
            callback: fn () => array_map(
                callback: fn (array $channel) => Channel::query()->create(
                    attributes: array_merge(
                        $channel,
                        [
                            'workspace_id' => $this->workspace->id,
                            'user_id' => $this->workspace->user_id,
                        ],
                    ),
                ),
                array: DefaultChannelFactory::get(),
            ),
            attempts: 3,
        );
    }
}

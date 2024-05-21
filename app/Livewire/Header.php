<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Livewire\Concerns\HasUser;
use App\Livewire\Concerns\HasWorkspace;
use App\Models\Channel;
use App\Models\Workspace;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;

use function is_string;

use Livewire\Component;

final class Header extends Component
{
    use HasUser;
    use HasWorkspace;

    public Channel|Model $channel;

    public function mount(string|Channel $channel): void
    {
        if (is_string($channel)) {
            $this->channel = Channel::query()->where(
                column: 'reference',
                operator: '=',
                value: $channel,
            )->where(
                column: 'workspace_id',
                operator: '=',
                value: $this->workspace()->id,
            )->first();

            return;
        }

        $this->channel = $channel;
    }

    public function render(Factory $factory): View
    {
        return $factory->make(
            view: 'livewire.header',
        );
    }
}

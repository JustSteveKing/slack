<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Livewire\Concerns\HasUser;
use App\Livewire\Concerns\HasWorkspace;
use App\Models\Channel;
use App\Models\Workspace;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

final class ChannelList extends Component
{
    use HasUser;
    use HasWorkspace;

    #[Computed]
    public function channels(): Collection
    {
        return Channel::query()->whereHas(
            relation: 'users',
            callback: fn (Builder $builder): Builder => $builder->where(
                column: 'user_id',
                operator: '=',
                value: $this->user()->id,
            ),
        )->get();
    }

    public function render(Factory $factory): View
    {
        return $factory->make(
            view: 'livewire.channel-list',
        );
    }
}

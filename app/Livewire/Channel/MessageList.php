<?php

declare(strict_types=1);

namespace App\Livewire\Channel;

use App\Enums\Workspace\Visibility;
use App\Livewire\Concerns\HasWorkspace;
use App\Models\Channel;
use App\Models\Message;
use App\Models\Workspace;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

final class MessageList extends Component
{
    use HasWorkspace;

    public Channel $channel;

    #[Computed]
    public function messages(): Collection
    {
        return Message::query()->with(
            relations: ['user'],
        )->where(
            column: 'channel_id',
            operator: '=',
            value: $this->channel->id,
        )->get();
    }

    #[Computed]
    public function channels(): Collection
    {
        return $this->workspace()->channels->filter(
            callback: fn (Channel $channel) => $channel->id !== $this->channel->id && Visibility::Private !== $channel->visibility,
        );
    }

    public function render(Factory $factory): View
    {
        return $factory->make(
            view: 'livewire.channel.message-list',
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Channel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class ChatInput extends Component
{
    public Channel $channel;

    public string $message = '';

    public bool $open = false;

    public function submit(): void
    {
        // send message to channel.
    }

    public function updatedMessage(string $event): void
    {
        if (mb_strlen($this->message) >= 2) {
            return;
        }

        if ('/' !== $event) {
            return;
        }

        $this->open = true;
        // parse message and do stuff.
    }

    public function render(Factory $factory): View
    {
        return $factory->make(
            view: 'livewire.chat-input',
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Livewire\Concerns\HasUser;
use App\Models\Workspace;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

final class WorkspaceList extends Component
{
    use HasUser;

    #[Computed]
    public function workspaces(): Collection
    {
        return Workspace::query()->get();
    }

    public function render(Factory $factory): View
    {
        return $factory->make(
            view: 'livewire.workspace-list',
        );
    }
}

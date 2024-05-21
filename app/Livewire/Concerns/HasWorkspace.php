<?php

declare(strict_types=1);

namespace App\Livewire\Concerns;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;

trait HasWorkspace
{
    #[Computed]
    public function workspace(): Workspace|Model
    {
        return Workspace::query()->firstWhere(
            column: 'id',
            operator: '=',
            value: Auth::user()->current_workspace_id,
        );
    }
}

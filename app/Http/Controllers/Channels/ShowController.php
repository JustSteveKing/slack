<?php

declare(strict_types=1);

namespace App\Http\Controllers\Channels;

use App\Http\Controllers\Concerns\HasView;
use App\Models\Channel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class ShowController
{
    use HasView;

    public function __invoke(Request $request, string $reference): View
    {
        return $this->factory->make(
            view: 'pages.channels.show',
            data: [
                'channel' => Channel::query()->where(
                    column: 'reference',
                    operator: '=',
                    value: $reference,
                )->where(
                    column: 'workspace_id',
                    operator: '=',
                    value: Auth::user()->current_workspace_id,
                )->firstOrFail(),
            ],
        );
    }
}

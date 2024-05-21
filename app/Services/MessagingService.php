<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Auth\AuthManager;
use Illuminate\Database\DatabaseManager;

final readonly class MessagingService
{
    public function __construct(
        private AuthManager $auth,
        private DatabaseManager $database,
    ) {
    }

    public function send(NewMessage $message): void
    {
        // does this message contain any links?
        // does this message reference a channel?
        // does this message mention anyone?
        // does this message interact with an app?
        return;
    }
}

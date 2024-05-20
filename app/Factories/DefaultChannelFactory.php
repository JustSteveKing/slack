<?php

declare(strict_types=1);

namespace App\Factories;

use App\Enums\Workspace\Visibility;

final class DefaultChannelFactory
{
    public static function get(): array
    {
        return [
            [
                'name' => 'General',
                'reference' => 'general',
                'description' => 'This is your general channel.',
                'visibility' => Visibility::Public,
            ]
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Enums\Workspace;

enum Visibility: string
{
    case Public = 'public';
    case Private = 'private';
}

<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Identity\Role;
use App\Models\Membership;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

final class MembershipFactory extends Factory
{
    /** @var class-string<Model> */
    protected $model = Membership::class;

    /** @return array<string,mixed> */
    public function definition(): array
    {
        return [
            'role' => Role::Member,
            'user_id' => User::factory(),
            'workspace_id' => Workspace::factory(),
        ];
    }
}

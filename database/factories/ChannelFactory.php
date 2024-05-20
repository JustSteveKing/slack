<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Workspace\Visibility;
use App\Models\Channel;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

final class ChannelFactory extends Factory
{
    /** @var class-string<Model> */
    protected $model = Channel::class;

    /** @return array<string,mixed> */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'reference' => $this->faker->uuid(),
            'description' => $this->faker->sentence(),
            'visibility' => Visibility::Public,
            'user_id' => User::factory(),
            'workspace_id' => Workspace::factory(),
        ];
    }
}

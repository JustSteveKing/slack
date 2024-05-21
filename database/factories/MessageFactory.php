<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Channel;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

final class MessageFactory extends Factory
{
    /** @var class-string<Model> */
    protected $model = Message::class;

    /** @return array<string,mixed> */
    public function definition(): array
    {
        return [
            'content' => $this->faker->realText(
                maxNbChars: 900,
            ),
            'meta' => null,
            'channel_id' => Channel::factory(),
            'user_id' => User::factory(),
        ];
    }
}

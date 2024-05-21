<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Identity\Provider;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property string $id
 * @property string $name
 * @property string $handle
 * @property string $email
 * @property string $avatar
 * @property Provider $provider
 * @property string $provider_id
 * @property bool $onboarded
 * @property null|string $current_workspace_id
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property null|CarbonInterface $deleted_at
 * @property Workspace $workspace
 * @property Collection<Workspace> $workspaces
 * @property Collection<Membership> $memberships
 * @property Collection<Channel> $channels
 * @property Collection<Message> $messages
 */
final class User extends Authenticatable
{
    use HasFactory;
    use HasUlids;
    use Notifiable;
    use SoftDeletes;

    /** @var array<int,string> */
    protected $fillable = [
        'name',
        'handle',
        'email',
        'avatar',
        'provider',
        'provider_id',
        'onboarded',
        'current_workspace_id',
    ];

    /** @return BelongsTo<Workspace> */
    public function workspace(): BelongsTo
    {
        return $this->belongsTo(
            related: Workspace::class,
            foreignKey: 'current_workspace_id',
        );
    }

    /** @return HasMany<Workspace> */
    public function workspaces(): HasMany
    {
        return $this->hasMany(
            related: Workspace::class,
            foreignKey: 'user_id',
        );
    }

    /** @return HasMany<Membership> */
    public function memberships(): HasMany
    {
        return $this->hasMany(
            related: Membership::class,
            foreignKey: 'user_id',
        );
    }

    /** @return BelongsToMany<Channel> */
    public function channels(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Channel::class,
            table: 'channel_user',
        );
    }

    /** @return HasMany<Message> */
    public function messages(): HasMany
    {
        return $this->hasMany(
            related: Message::class,
            foreignKey: 'user_id',
        );
    }

    /** @return array<string,string|class-string> */
    protected function casts(): array
    {
        return [
            'onboarded' => 'boolean',
            'provider' => Provider::class,
        ];
    }
}

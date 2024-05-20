<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Workspace\Visibility;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $id
 * @property string $name
 * @property string $reference
 * @property null|string $description
 * @property Visibility $visibility
 * @property string $user_id
 * @property string $workspace_id
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property User $owner
 * @property Workspace $workspace
 * @property Collection<User> $users
 */
final class Channel extends Model
{
    use HasFactory;
    use HasUlids;

    /** @var array<int,string> */
    protected $fillable = [
        'name',
        'reference',
        'description',
        'visibility',
        'user_id',
        'workspace_id',
    ];

    /** @return BelongsTo<User> */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    /** @return BelongsTo<Workspace> */
    public function workspace(): BelongsTo
    {
        return $this->belongsTo(
            related: Workspace::class,
            foreignKey: 'workspace_id',
        );
    }

    /** @return BelongsToMany<User> */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            related: User::class,
            table: 'channel_user',
        );
    }

    /** @return array<string,string|class-string> */
    protected function casts(): array
    {
        return [
            'visibility' => Visibility::class,
        ];
    }
}

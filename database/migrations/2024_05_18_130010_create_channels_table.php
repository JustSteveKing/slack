<?php

declare(strict_types=1);

use App\Enums\Workspace\Visibility;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('channels', static function (Blueprint $table): void {
            $table->ulid('id')->primary();

            $table->string('name');
            $table->string('reference');
            $table->string('description')->nullable();
            $table->string('visibility')->default(Visibility::Public->value);

            $table
                ->foreignUlid('user_id')
                ->index()
                ->constrained('users')
                ->cascadeOnDelete();

            $table
                ->foreignUlid('workspace_id')
                ->index()
                ->constrained('workspaces')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['reference', 'workspace_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};

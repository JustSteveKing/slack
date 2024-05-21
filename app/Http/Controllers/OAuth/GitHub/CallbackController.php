<?php

declare(strict_types=1);

namespace App\Http\Controllers\OAuth\GitHub;

use App\Enums\Identity\Provider;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

final readonly class CallbackController
{
    public function __construct(
        private AuthManager $auth,
    ) {
    }

    public function __invoke(Request $request): RedirectResponse
    {
        $user = Socialite::driver(
            driver: Provider::GitHub->value,
        )->user();

        /** @var User $authUser */
        $authUser = User::query()->updateOrCreate(
            attributes: [
                'provider' => Provider::GitHub,
                'provider_id' => $user->getId(),
            ],
            values: [
                'name' => $user->getName(),
                'handle' => $user->getNickname(),
                'email' => $user->getEmail(),
                'avatar' => $user->getAvatar(),
            ],
        );

        $this->auth->loginUsingId(
            id: $authUser->id,
        );

        return new RedirectResponse(
            url: route('pages:home'),
        );
    }
}

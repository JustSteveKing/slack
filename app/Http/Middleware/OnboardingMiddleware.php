<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final readonly class OnboardingMiddleware
{
    public function __construct(
        private AuthManager $auth,
    ) {
    }

    public function handle(Request $request, Closure $next): Response
    {
        if ( ! $this->auth->check()) {
            return new RedirectResponse(
                url: route('pages:auth:login'),
            );
        }

        if ( ! $this->auth->user()->onboarded) {
            return new RedirectResponse(
                url: route('pages:auth:onboarding'),
            );
        }

        return $next($request);
    }
}

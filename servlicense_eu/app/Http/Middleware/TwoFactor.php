<?php

namespace App\Http\Middleware;
use App\Models\User;
use Closure;

class TwoFactor
{
    public function handle($request, Closure $next, $guard = null)
    {
        $user = $this->user();
        if($user && $user->has2FactorActivated() && $request->route()->uri() != 'licensor/twofactor')
            return session()->has('two-factor') ? $next($request) : redirect('licensor/twofactor');
        return $next($request);
//        $authenticator = app(Authenticator::class)->boot($request);
//        if ($authenticator->isAuthenticated()) {
//            return $next($request);
//        }
//        return $authenticator->makeRequestOneTimePasswordResponse();
    }

    public function user(): User
    {
        return auth()->user();
    }

}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if ($this->auth->guest()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthorized.'], 401);
            } else {
                return redirect()->guest('/login');
            }
        }

        // Logout if user not active
        if ($this->auth->check() && !$this->auth->user()->is_active) {
            $this->auth->logout();
            return redirect('/login')->withErrors('Sorry, this user account is blocked please contact the admin.');
        }

        return $next($request);
    }
}

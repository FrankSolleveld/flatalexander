<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
Use App\Admin;

class MustBeAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user && $user->isAdmin == true) {
            return $next($request);
        }

        return abort(403, "You do not have the power!");

    }
}

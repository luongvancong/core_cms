<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->userHasAccessTo($request))
        {
            view()->share('currentUser', $request->user());
            return $next($request);
        }
        return response()->view('errors/403');
    }

    public function userHasAccessTo($request)
    {
        $user = $request->user();
        if ($user->can("root:root")) {
            return true;
        }

        $action = $request->route()->getAction();

        $permissions = isset($action['permissions']) ? explode('|', $action['permissions']) : null;

        return $user->can($permissions);
    }
}

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
        if ($this->userHasAccessTo($request) || $request->user()->hasRole('root') || $request->user()->getId() == 1)
        {
            view()->share('currentUser', $request->user());
            return $next($request);
        }
        return response()->view('errors/403');
    }

    public function userHasAccessTo($request)
    {
        $action = $request->route()->getAction();

        $roles = isset($action['roles']) ? explode('|', $action['roles']) : null;
        $permissions = isset($action['permissions']) ? explode('|', $action['permissions']) : null;

        // Nếu không set quyền thì cứ vào thoải mái
        if(is_null($permissions)) return true;

        return $request->user()->ability($roles, $permissions);
    }
}

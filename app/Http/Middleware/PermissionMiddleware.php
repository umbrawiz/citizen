<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware
{
    public function handle($request, Closure $next, $permission)
    {
        $params = explode(':', $permission);

        $permission = $params[0];

        if (auth()->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);


        foreach ($permissions as $permission) {
            foreach (auth()->user()->getAllPermissions()->toArray() as $key => $value) {
                if ($value['name'] == $permission) {
                    return $next($request);
                }
            }
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
}

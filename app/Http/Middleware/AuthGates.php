<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthGates
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
        $admin_user = Auth::guard('admin');

        if(!app()->runningInConsole() && $admin_user) {
            $roles = Role::with('permissions')->get();
            $permissionsArray = [];

            foreach($roles as $role) {
                foreach($role->permissions as $permissions) {
                    $permissionsArray[$permissions->slug][] = $role->id;
                }
            }

            foreach ($permissionsArray as $slug => $roles) {
                Gate::define($slug, function (\App\Models\Admin $admin_user) use ($roles) {
                    return count(array_intersect($admin_user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }
        return $next($request);
    }
}

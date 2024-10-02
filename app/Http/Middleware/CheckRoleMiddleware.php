<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $roleIds = [];

        $staticRoutes = [
            '/api/v1/pengetahuan',
            '/api/v1/addOrUpdatePengetahuan',
            '/api/v1/listKategori',
            '/api/v1/listSubKategori',
            '/api/v1/listUser',
            '/api/v1/dashboard',
            '/api/v1/dashboardVerifikator'
        ];

        $dynamicRoutes = [
            '/api/v1/revisi/{id}',
            '/api/v1/publish/{id}',
            '/api/v1/komentar/{id}',
        ];

        $path = $request->getPathInfo();
    
        if (in_array($path, $staticRoutes)) {
            $roleIds = ['type.user' => 'role:user', 'type.admin' => 'role:admin', 'type.operator' => 'role:operator'];
        }

        foreach ($dynamicRoutes as $route) {
            $pattern = '#^' . preg_replace('/\{[^}]+\}/', '[^/]+', $route) . '$#';
            if (preg_match($pattern, $path)) {
                $roleIds = ['type.user' => 'role:user', 'type.admin' => 'role:admin', 'type.operator' => 'role:operator'];
                break;
            }
        }

        $allowedRoleIds = [];
        foreach ($roles as $role) {
            if (isset($roleIds[$role])) {
                $allowedRoleIds[] = $roleIds[$role];
            }
        }
        $allowedRoleIds = array_unique($allowedRoleIds);

        if (auth()->user()) {
            if (in_array(auth()->user()->currentAccessToken()->getAttributeValue('abilities')[0], $allowedRoleIds)) {
                return $next($request);
            }
        }

        return response()->json(['message' => 'You are not allowed to access this route'], 405);
    }
}

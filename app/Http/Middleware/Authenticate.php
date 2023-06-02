<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Illuminate\Support\Facades\Route; // ここを追加

class Authenticate extends Middleware
{
    // ここから追加

    protected $admin_route = 'admin.login';
    
    // ここまで追加
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
             // ここから追加
             if (Route::is('admin.*')) {
                return route($this->admin_route);
            } else {
                return route('login');
            }
            // ここまで追加
        }
    }
}

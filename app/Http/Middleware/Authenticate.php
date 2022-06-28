<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
			if (Route::is('member.*')) {
				// memberディレクトリのログイン画面へリダイレクト
				$route = $request->route();
				return route('member.login', ['member_dir' => $route->member_dir]);
			} elseif (Route::is('user.*')) {
				// userディレクトリのログイン画面へリダイレクト
				return route('user.login');
			}

            return route('login');
        }
    }
}

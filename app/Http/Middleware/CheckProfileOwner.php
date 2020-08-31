<?php

namespace App\Http\Middleware;

use Closure;

class CheckProfileOwner
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
        /* If user is authenticated and is the profile owner change the url */
        $requestedRoute = $request->route()->action['as'];
        if (auth()->check() && $request->route('user')->id === auth()->user()->id && $requestedRoute === 'users.index'){
            return redirect()->route('me.index', ['user' => $request->route('user')->alias]);
        }
        else if((!auth()->check() || auth()->check() && $request->route('user')->id !== auth()->user()->id) && $requestedRoute === 'me.index'){
            return redirect()->route('users.index', ['user' => $request->route('user')->alias]);
        }
        
        return $next($request);
    }
}

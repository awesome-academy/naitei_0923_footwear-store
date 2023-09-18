<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class CheckAccessForGuestAndVerifiedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $redirectToRoute = null)
    {
        if (Auth::check()) {
            if ($request->user() instanceof MustVerifyEmail && !$request->user()->hasVerifiedEmail()) {
                return $request->expectsJson()
                    ? abort(403, __('Your email address is not verified.'))
                    : Redirect::guest(URL::route($redirectToRoute ?: 'verification.notice'));
            } else {
                return $next($request);
            }
        } else {
            return $next($request);
        }
    }
}

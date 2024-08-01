<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Log;

class LogEmailVerification
{
    public function handle(Request $request, Closure $next)
    {
        if ($request instanceof EmailVerificationRequest) {
            Log::info('Email verification request for user: ' . $request->user()->email);
        }

        return $next($request);
    }
}

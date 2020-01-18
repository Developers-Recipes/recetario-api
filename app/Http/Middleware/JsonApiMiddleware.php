<?php

namespace App\Http\Middleware;

use Closure;

class JsonApiMiddleware
{
    const PARSED_METHODS = [
        'POST', 'PUT', 'PATCH'
    ];

    /**
     * Take the json of the request, decode it and include it in the same request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (in_array($request->getMethod(), self::PARSED_METHODS) && $request['json']) {
            $request->merge(json_decode($request['json'], true));
            unset($request['json']);
        }

        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
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
        $data = [
            ['name' => 'kenta', 'mail' => 'kenta@com'],
            ['name' => 'pori', 'mail' => 'pori@com'],
            ['name' => 'FUJI', 'mail' => 'FUJI@com'],
            ['name' => 'anesan', 'mail' => 'anesan@com'],
        ];
        $request->merge([
            'data' => $data
        ]);
        return $next($request);
    }
}

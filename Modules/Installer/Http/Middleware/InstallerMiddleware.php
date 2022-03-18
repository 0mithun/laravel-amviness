<?php

namespace Modules\Installer\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InstallerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $fileexits = file_exists(base_path('storage/app/installed'));

        if ($fileexits) {
            return $next($request);
        } else {
            return redirect(route('installer.index'));
        }
    }
}

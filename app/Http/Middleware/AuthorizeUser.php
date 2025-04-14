<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = ''): Response
    {
        $user = $request->user(); // ambil data user yang login
                                // fungsi user() diambil dari uUserModel.php
        if ($user->hasRole($role)) { // cek apakah user punya role yang diinginkan
            return $next($request);
        }
        // jika tidak punya role, maka tampilkan eror 403
        abort(403, 'forbidden. Kamu tidak punya akses ke halaman ini');    }
}

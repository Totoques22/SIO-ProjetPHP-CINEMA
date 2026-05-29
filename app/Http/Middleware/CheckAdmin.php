<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // On vérifie si l'utilisateur est connecté ET s'il n'est PAS admin
        if (auth()->check() && auth()->user()->role !== 'admin') {
            abort(403, 'Accès refusé : vous n\'avez pas les droits d\'administration.');
        }

        return $next($request);
    }
}

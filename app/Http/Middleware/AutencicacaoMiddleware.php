<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class AutencicacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao)
    {
        
        session_start();

        if(isset($_SESSION['user_key']) && $_SESSION['user_key'] !=  '')
        {
            return $next($request);
        }else{
            return redirect()->route('login-page', ['error' => 2]);
        }

    }
}

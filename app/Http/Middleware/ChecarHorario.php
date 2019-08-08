<?php

namespace App\Http\Middleware;

use Closure;

//classe de validação que restringe acesso em rotas
class ChecarHorario
{
     
    public function handle($request, Closure $next)
    {
        
        date_default_timezone_set('America/Sao_Paulo');
        if(date('H')<=23){
            return redirect('/');
        }

        return $next($request);
    }
}

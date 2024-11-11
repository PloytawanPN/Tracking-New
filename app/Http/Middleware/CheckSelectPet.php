<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class CheckSelectPet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $code = $request->route('code');
        $codeSession = Session::get('pet-code');
        if($codeSession){
            if($code==$codeSession){
                return $next($request);
            }else{
                return redirect()->route('portal.user');
            }
        }else{
            return redirect()->route('portal.user');
        }

        
    }
}

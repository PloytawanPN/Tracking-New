<?php

namespace App\Http\Middleware;

use App\Models\Pet;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Crypt;

class CheckPath
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $code = Crypt::decrypt($request->route('code'));
            $data = Pet::where('pet_code', $code)->get();
            if (count($data) == 1) {
                return $next($request);
            } else {
                return redirect()->route('notFound.user');
            }
        } catch (\Throwable $th) {
            return redirect()->route('notFound.user');
        }



    }
}

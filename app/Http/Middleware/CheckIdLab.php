<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Laboratory ;
class CheckIdLab
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lab = Laboratory::find( $request ->  id )  ;
        if  ( $lab ) {
            return $next($request);

        } else {
            return   redirect('dashboard') ;
        }
         
    }
}

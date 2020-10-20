<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User ;
class LoginMiddleware
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
        if($request->input('token')){
            $check=User::where('api_token',$request->input('token'))->first();
            if(!$check){
                return response()->json('token tidak valid', 401);
            }else{
                return $next($request);
            }
        }else{
            return response()->json('masukkan token', 401);
        }
        
        // Pre-Middleware Action
        
        //$response = $next($request);

        // Post-Middleware Action

        //return $response;
    }
}
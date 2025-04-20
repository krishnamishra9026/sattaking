<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProfileStep
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()) {
            // Check if the user has completed the profile step
            $user = $request->user();
            if ($user->info && $user->info->step) {
                if($user->info->step < 6) {
                    if($user->info->step == 1){
                        return redirect()->route('profile.setup.one');
                    }else if($user->info->step == 2){
                        return redirect()->route('profile.setup.two');
                    }else if($user->info->step == 3){
                        return redirect()->route('profile.setup.three');
                    }else if($user->info->step == 4){
                        return redirect()->route('profile.setup.four');
                    }else if($user->info->step == 5){
                        return redirect()->route('profile.setup.five');
                    }
                   

                }
            }else{
                return redirect()->route('profile.setup.one');
            }
        }
        return $next($request);
    }
}

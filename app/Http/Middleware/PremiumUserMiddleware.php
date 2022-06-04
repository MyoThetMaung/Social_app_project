<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PremiumUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //using database relation
        $authorId = Post::find($request->id)->user_id;

        if(Auth::user()->isPremium == '1' || Auth::user()->isAdmin == '1' || Auth::user()->id == $authorId){
            return $next($request);
        }else{
            return redirect()->route('index')->with('error','You are not authorized to do this action');
        }
    }
}

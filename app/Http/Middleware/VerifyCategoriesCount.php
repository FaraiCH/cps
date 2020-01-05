<?php

namespace App\Http\Middleware;

use App\Category;

use Closure;

class VerifyCategoriesCount
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
        if(Category::all()->count()===0){

            session()->flash('danger', 'You need to have categories to post');
            return redirect(route('categories.create')) ;
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class Checkrole
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
      if(Auth::user()->role == 1){
          // return redirect('Backend/add/categories_topics');
      }
      else if(Auth::user()->role == 2){
        return redirect('Dashboard/student');
      }
      else if(Auth::user()->role == 3){
        return redirect('Dashboard/tutore');
      }
      else{
        return redirect('/');
      }
        return $next($request);

    }
}

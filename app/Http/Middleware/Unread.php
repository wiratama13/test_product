<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Unread
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request , Closure $next)
    {
        $question = Question::first();

        if($question->sudah_dibaca == "0") {
            return $next($request);
            $question::updateOrInsert(
                ['sudah_dibaca' => '1']
            );
            $question->save();
        }

    }
}

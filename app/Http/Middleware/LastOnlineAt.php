<?php

namespace App\Http\Middleware;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Closure;

class LastOnlineAt
{
    public function handle($request, Closure $next)
    {
        if (auth()->guest()) {
            return $next($request);
        }

        if (auth()->user()->last_online_at->diffInMinutes(now()) !== 0)
        {
            if (auth()->user()->gender == User::GENDER_FEMALE && auth()->user()->last_online_at
                < Carbon::now()->startOfDay()) {
                if (auth()->user()->vip)
                    auth()->user()->rating += 2;
                else
                    auth()->user()->rating++;
                auth()->user()->save();
            }
            DB::table("users")
                ->where("id", auth()->user()->id)
                ->update(["last_online_at" => now()]);
        }
        return $next($request);
    }
}

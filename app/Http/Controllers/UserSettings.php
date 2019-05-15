<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSettings extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $user = auth()->user();
        $user_ip = geoip($user->registration_ip);

        Carbon::setLocale($user_ip->iso_code);

        return view('me.profile', ['user' => $user, 'user_ip' => $user_ip]);
    }
}

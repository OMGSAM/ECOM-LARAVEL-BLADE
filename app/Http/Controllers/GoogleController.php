<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;

class GoogleController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->email)->first();

        if(!$user){

            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => bcrypt(uniqid())
            ]);

        }

        Auth::login($user);

        return redirect('/dashboard');

    }
}

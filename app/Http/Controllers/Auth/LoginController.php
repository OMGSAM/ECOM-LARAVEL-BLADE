<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


public function logout(){
    Auth::logout();
    return to_route('homepage');
}


    public function login(Request $request)
{
    $credentials = $request->only('email', 'password','is_adm');

    $user = User::where('email', $credentials['email'])->first();

    // Comparaison SANS hash (dangereux)
    if ($user && $user->password === $credentials['password']) {
        Auth::login($user);

        if ($user->is_adm == 1){
            return redirect()->intended('dashboard');

        }
        else {
                      return to_route('homepage');

        }
        
    }

    return back()->withErrors([
        'email' => 'Identifiants incorrects.',
    ]);
}

}

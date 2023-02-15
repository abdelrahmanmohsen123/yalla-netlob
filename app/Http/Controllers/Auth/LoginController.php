<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
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
        // $this->middleware('guest')->except('logout');
    }


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @param string $provider
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $authUser = Socialite::driver('google')->user();
        // Use the user information to create or update your user model
        $user = User::where("email", $authUser->email)->get();
        //  dump($authUser,'<=Auth');

        if (!$user->first()) {
            # code...
            $user = User::create([
                'name' => $authUser->name,
                'email' => $authUser->email,
                'token' => $authUser->token,
                'logged_with_id'=>$authUser->id
            ]);
            // dd($user,'<=IN created IF=>',$user->attributes);
            Auth::login($user);
        }
        // dd(Auth::user() , ">>>",User::where("email", $authUser->email)->get()->first());
        // Log the user in
        Auth::login($user->first());

        return redirect()->to('/home');
    }
}

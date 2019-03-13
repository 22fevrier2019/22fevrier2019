<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Socialite;
use App\User;

class AuthenticationController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }



    public function AuthenticateUser($provider)
    {
        $user = Socialite::with($provider)->user();
        $authUser = User::where('provider_id', $user->id)->where('provider',$provider)->first();
        if ($authUser) {
            Auth::login($authUser);
            return redirect('/#');
        }
        $authUser =  User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
        Auth::login($authUser);
        return redirect('/#');
    }
}

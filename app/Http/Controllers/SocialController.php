<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;

class SocialController extends Controller
{

    //FACEBOOK
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();


            if($isUser){
                if($isUser->banned !=1){
                    Auth::login($isUser);
                    return redirect()->route('home');
                }
                if($isUser->banned ==1){
                    return redirect()->route('banned');
                }
//1
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123'),
                    'email_verified_at' => now(),
                ]);
                Auth::login($createUser);
                return redirect()->route('home');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}

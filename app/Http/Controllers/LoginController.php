<?php

namespace App\Http\Controllers;

use Google\Service\Oauth2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Google\Client as GoogleClient;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use TCG\Voyager\Models\User;

class LoginController extends Controller
{
    //


    public function create()
    {
        return view('auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function redirectToGoogle()
    {
        $googleClient = new GoogleClient();
        $googleClient->setClientId(config('services.google.client_id'));
        $googleClient->setClientSecret(config('services.google.client_secret'));
        $googleClient->setRedirectUri(config('services.google.redirect'));
        $googleClient->addScope('email');
        $googleClient->addScope('profile');

        return redirect($googleClient->createAuthUrl());
    }

    public function handleGoogleCallback()
    {
        $googleClient = new GoogleClient();
        $googleClient->setClientId(config('services.google.client_id'));
        $googleClient->setClientSecret(config('services.google.client_secret'));
        $googleClient->setRedirectUri(config('services.google.redirect'));

        $token = $googleClient->fetchAccessTokenWithAuthCode(request('code'));
        Log::info('token:'. implode($token));
        // Use the obtained token to retrieve user details and authenticate the user in your Laravel application
        $googleClient->setAccessToken($token);
        $oauth2 = new Oauth2($googleClient);
        $userInfo = $oauth2->userinfo->get();

        $email = $userInfo->getEmail();
        $firstName = $userInfo->getGivenName();
        $lastName = $userInfo->getFamilyName();
        $pictureUrl = $userInfo->getPicture();
        $user = User::where('email', $email)->first();
        Log::info('$firstName: '. $firstName);
        Log::info('$lastName: '. $lastName);
        Log::info('$email: '. $email);
        Log::info('$pictureUrl: '. $pictureUrl);
        if (!$user) {
            // User doesn't exist, create a new user
            $user = new User();
            $user->name = $firstName . ' ' . $lastName;
            $user->email = $email;
            $user->avatar = $pictureUrl;
            $user->password = 'GOOGLE';
            $user->save();
        }

        // Authenticate the user
        Auth::login($user);

        // Redirect the user to the desired page
        return redirect()->route('home');

    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // Retrieve user details
        $name = $user->getName();
        $email = $user->getEmail();
        $avatar = $user->getAvatar();
        $user = User::where('email', $email)->first();
        Log::info('$name: '. $name);
        Log::info('$email: '. $email);
        Log::info('$avatar: '. $avatar);
        if (!$user) {
            // User doesn't exist, create a new user
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->avatar = $avatar;
            $user->password = 'FACEBOOK';
            $user->save();
        }

        // Authenticate the user
        Auth::login($user);

        // Redirect the user to the desired page
        return redirect()->route('home');

    }
}

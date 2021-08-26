<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $emailDomainOnly = preg_replace('/.+@/', '', $user->email);

            if ($emailDomainOnly !== 'krenovate.com' ) {
                return redirect()->route('home')->with('info', 'Only users from Krenovate can signup.');
            }

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::login($finduser);

                if (count(Auth::user()->roles) === 0) {
                    Auth::user()->syncRoles('sales-associate');
                }

                return redirect()->route('dashboard');

            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);

                if (count(Auth::user()->roles) === 0) {
                    Auth::user()->syncRoles('sales-associate');
                }

                return redirect()->route('dashboard');
            }

        } catch (Exception $e) {
            // dd($e->getMessage());
        }
    }
}

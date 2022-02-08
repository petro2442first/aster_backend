<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request, User $user)
    {
        // session([
        //     'name' => $request->name,
        //     'lastname' => $request->lastname,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'password' => $request->password,
        //     'password_confirmation' => $request->password_confirmation,
        //     'process_data' => $request->process_data,
        // ]);
        return $user->hasVerifiedEmail()
                    ? /* redirect()->intended(RouteServiceProvider::HOME) */
                    redirect()->route('about')
                    : view('auth.verify-email', [
                        'no_profile' => 'true'
                        ]);
    }
}

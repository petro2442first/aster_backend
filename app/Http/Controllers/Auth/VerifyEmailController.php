<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        // Auth::login($request->user());
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('profile');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }


        // $user_id = session('user_id') ?? null;
        // $user = 
        // if($user_id !== null) {
        //     $user = User::find($user_id);
        //     Auth::login($user);
        // } else 
        return redirect()->route('profile');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request, $ref = '')
    {
        return view('auth.register', [
            'ref' => $ref
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
    //    dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->phone_code = User::generatePhoneCode();
        $user->login = '';
        $user->password = Hash::make($request->password);
        $user->confirmed_personal_processing = $request->process_data == 'on' ? true : false;
        $user->last_profit = Carbon::now();
//        Referral init
        $user->referral_link = User::create_referral_link();
        $user->find_referral($request->ref_link !== null ? $request->ref_link : null );
        $user->last_login = Carbon::now();
        $user->ip = $request->ip();
        $user->saveOrFail();
//        ---------------
        event(new Registered($user));

        Auth::login($user);
        // session(['user_id' => $user->id]);
        // return redirect()->route('verification.notice')
        // ->with([
        //     'user' => $user
        // ]);
        return redirect()->route('profile');
    }

}

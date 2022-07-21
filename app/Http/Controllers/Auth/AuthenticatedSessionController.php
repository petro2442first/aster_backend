<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();
        $request->session()->regenerate();
        $user = Auth::user();
        $user->last_login = Carbon::now('+2:00')->isoFormat('H:m D.M.Y');

        $user->saveOrFail();
        if(Auth::user()->is_admin == 1) {
            return redirect()->route('admin');
        }

        return redirect()->route('profile');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $user->last_login = (string)Carbon::now('+2:00')->isoFormat('H:m D.M.Y');
        // dd($user->last_login);
        $user->saveOrFail();
        Auth::guard('web')->logout();
        $locale = session('locale');
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        session(['locale' => $locale]);
        return redirect('/');
    }

    public function cancelRegistration()
    {
        $user = Auth::user();
        $user->delete();
    //   Auth::guard('web')->logout();
       return redirect()->route('register');
    }
}

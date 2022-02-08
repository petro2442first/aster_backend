<?php

namespace App\Http\Controllers;

use App\Models\TariffPlan;
use charlesassets\LaravelPerfectMoney\PerfectMoney;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class PagesController extends Controller
{
    static public function sessionHandle(Request $request) {
        // if(session('start') == null or session('started') == '') {
        //     session([
        //         'started' => false,
        //         'count' => 1
        //     ]);
        // }
        // if(session('count') > 1) {
        //     session(['started' => true]);
        // }
        // session()->increment('count');
    }

    function index(Request $request)
    {
        $user_id = session('user_id');
        $user = User::find($user_id);
        if($user != null) {
                Auth::login($user);
                return redirect()->route('profile');
        }
        self::sessionHandle($request);
        return view('static.main.index', [
            'title' => ''
        ]);
    }
    function about(Request $request)
    {
        self::sessionHandle($request);
        return view('static.about.index', [
            'title' => 'О нас'
        ]);
    }
    function tariffs(Request $request)
    {
        self::sessionHandle($request);
        $user = Auth::user();
        if($user !== null) {
            list($available_tariffs, $acquired_tariffs) = TariffPlan::getSortedTariffs($user);
            $confirmed = $user->confirmed;
        } else {
            $available_tariffs = TariffPlan::all();
            $confirmed = 0;
        }
        return view('static.tariffs.index', [
            'title' => 'Тарифы',
            'available_tariffs' => $available_tariffs,
            'confirmed' => $confirmed
        ]);
    }
    function faq(Request $request)
    {
        self::sessionHandle($request);
        return view('static.faq.index', [
            'title' => 'FAQ'
        ]);
    }
    function contacts(Request $request)
    {
        self::sessionHandle($request);
        return view('static.contacts.index', [
            'title' => 'Контакты'
        ]);
    }
    public function login() {
        return view('auth.login');
    }
    public function setLocale($locale = 'ru') {
        session(['locale' => $locale]);
        // App::setLocale($locale);
        return redirect()->back();
    }
}

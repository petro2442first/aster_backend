<?php

namespace App\Http\Controllers;

use App\Models\PaymentCurrency;
use App\Models\PaymentRequest;
use App\Models\TariffPlan;
use App\Models\Transfer;
use App\Models\User;
use charlesassets\LaravelPerfectMoney\PerfectMoney;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function tariff(Request $request, string $title, $admin = '')
    {
        $user = Auth::user();
        if($user->confirmed === 0) return redirect()->route('payment-error', ['no-confirmed']);
        $tariff = TariffPlan::all()->where('title', $title)->first();
        return view('payment.tariff', [
            'tariff' => $tariff,
            'admin' => $admin
        ]);
    }
    public function tariff_post(Request $request, $admin = '')
    {
        $user = Auth::user();
        $user = User::find($user->id);
        $payment = PaymentCurrency::all()->where('title', 'USD')->first();
        $route_success = $admin == 'admin'
        ? route('payment-success', [
            'payment' => (double)$request->amount,
            'tariff_id' => TariffPlan::all()->where('title', Str::headline($request->tariff))->first()->id,
            'admin' => $admin
        ])
        : route('payment-success', [
            'payment' => (double)$request->amount,
            'tariff_id' => TariffPlan::all()->where('title', Str::headline($request->tariff))->first()->id
        ]);
        $route_error = $admin == 'admin'
        ? route('profile.index-admin')
        : route('profile');
        // dd($route_success, $route_error);
        // PaymentController::success($request, $request->amount, $request->tariff);
        return view('payment.tariff_post', [
            'payment' => $payment,
            'amount' => $request->amount,
            'tariff_id' => TariffPlan::all()->where('title', Str::headline($request->tariff))->first()->id,
            'success_url' => $route_success,
            'error_url' => $route_error
        ]);
        return redirect()->route('profile');
    }
    public function deposit(string $admin = '')
    {
        $user = Auth::user();
        if($user->confirmed === 0) return redirect()->route('payment-error', ['no-confirmed']);
        return view('payment.deposit', [
            'admin' => $admin
        ]);

    }
    public function deposit_post(Request $request, string $admin = '')
    {
        $this::success($request, $request->payment);
        $payment = PaymentCurrency::all()->where(
            'title',
           'USD')
            ->first();
        $route_success = $admin == 'admin' ? route('profile.index-admin', [
            'payment' => $request->amount,
            'currency' => $payment->title
        ]) : route('profile', [
            'payment' => $request->amount,
            'currency' => $payment->title
        ]);
        $route_error = $admin == 'admin' ? route('profile.index-admin', [
            'payment' => $request->amount,
            'currency' => $payment->title
        ]) : route('payment-error');
        $user = Auth::user();
        $user = User::find($user->id);
        if($user->confirmed === 0) return redirect()->route('payment-error', ['no-confirmed']);
             dd($request->tariff);
        $this::success($request, $request->payment);
        return view('payment.deposit_post', [
            'payment' => $payment,
            'amount' => $request->amount,
            'success_url' => $route_success,
            'error_url' => $route_error
        ]);
    }
    public function withdraw(Request $request)
    {
        $payment_request = new PaymentRequest();
        $payment_request->amount = $request->amount;
        $payment_request->currency = 'USD';
        $payment_request->user_id = Auth::user()->id;
        $payment_request->saveOrFail();
        return redirect()->back();
    }
    public function error(Request $request, $type = '')
    {
        switch($type) {
            case 'tariff-error':
                $message = __('tariffs.error_tariff');
                break;
            case 'no-confirmed':
                $message = __('tariffs.no_confirmed');
                break;
            default:
                $message = '';
            break;
        }
        return view('payment.error', [
            'message' => $message
        ]);
    }
    static public function success(
        Request $request)
    {

        $user = User::find(Auth::user()->id);
            $payment = $request->payment;
            // dd($request);
            $tariff_id = $request->tariff_id;
            $user->balance += $payment;
            $user->insurance_balance = $user->balance;

            if($tariff_id == null) {
                $all_tariffs = TariffPlan::all();
                $user_tariffs = $user->tariff_plan != null
                ? explode(',', $user->tariff_plan)
                : [];
                foreach($all_tariffs as $key => $tariff) {
                    if(!in_array($tariff->id, $user_tariffs)) {
                        // if($payment >= (int)$tariff->min_invest
                            // and $payment < (int)$tariff->max_invest) {
                            array_push($user_tariffs, $tariff->id);
                            break;
                        // }
                    }
                }
                $user->tariff_plan = implode(',', $user_tariffs);

            } else {
                    if($user->tariff_plan != '') {
                    $user->tariff_plan .= ',' . $tariff_id;
                    } else {
                        $user->tariff_plan = $tariff_id;
                }
            }
            $user->saveOrFail();

            $transfer = new Transfer;
            $transfer->deposit($payment, $user->id);
            $transfer->saveOrFail();

        return redirect()->route('profile');
    }
}

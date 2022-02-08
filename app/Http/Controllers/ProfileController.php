<?php

namespace App\Http\Controllers;

use App\Models\TariffPlan;
use App\Models\Transfer;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ProfileController extends Controller
{
    public function index($id = null, $payment = null, $currency = null, $tariff_id = null)
    {
        if($id != null) {
            $user = User::find($id);
            goto M;
        }
        if(session('user_id') != null) {
            $user_id = session('user_id');
            $user = User::find($user_id);
        } else {

            $user = Auth::user();
            $user = User::find($user->id);
        }
        if($user->is_admin == '1') return redirect()->route('admin');
        // if(!$user->hasVerifiedEmail()) {
        //     return redirect()->route('verification.notice');
        // }
        M:
        if($payment != null) {
            if($currency == 'EUR') {
                $access_key = 'dde22568048c86d151855743f4cc22e8';
                $f = file_get_contents("http://api.currencylayer.com/live?access_key={$access_key}&currencies=EUR,USD");
                $f = json_decode($f, true);
                $payment /= $f["quotes"]["USDEUR"];
                $payment = round($payment, 2);
            }
            $user->balance += $payment;
            $user->insurance_balance = $user->balance;

            if($tariff_id == null) {
                $tariffs = TariffPlan::all();
                $user_tariffs = explode(',', $user->tariff_plan);
                    foreach($tariffs as $key => $tariff) {
                        if(!in_array($tariff->id, $user_tariffs)) {
                            if($tariff->min_invest <= $payment and $tariff->max_invest >= $payment ) {
                                if($key == 0) {
                                    $user->tariff_plan = $tariff->id;
                                    continue;
                                }
                                $user->tariff_plan .= ','.$tariff->id;
                            }
                        }
                    }

            } else {

                if(!str_contains($tariff_id, $user->tariff_plan)) {
                    if($user->tariff_plan != '') {
                    $user->tariff_plan .= ',' . $tariff_id;
                    } else {
                        $user->tariff_plan = $tariff_id;
                    }
                }
            }
            $user->saveOrFail();

            $transfer = new Transfer('+', $payment, $user->id);
            $transfer->appointment = '+';
            $transfer->value = $payment;
            $transfer->user_id = $user->id;
            $transfer->saveOrFail();
        }
//        Tariff Plans
        $tariff_plans = TariffPlan::all()->where('title', '<>', 'Invest Case');
        $tariff_plan_ids = explode(',', $user->tariff_plan);
        $acquired_plans = [];
        $available_plans = [];
        foreach($tariff_plan_ids as $id)
            array_push($acquired_plans, TariffPlan::all()->where('id', $id)->first());
        if($acquired_plans[0] === null) $acquired_plans = [];
        foreach ($tariff_plans as $plan)
        {
            if(!in_array($plan, $acquired_plans))
                array_push($available_plans, $plan);
        }
        if($available_plans === null and $available_plans[0] === null) $available_plans = [];
//        --------------------------
//        Transfers
        $transfers = $user->transfers->reverse();
//        ----------------

        $referrals = $user->referrals();
        $withdraw = '';
        if($acquired_plans != []) {
            foreach($acquired_plans as $plan) {
                if($plan->id == 1) {
                    $withdraw = true;
                    break;
                }
            }
        } else {
            $withdraw = __('feed.withdraw_notify1');
            goto END;
        }

        if($withdraw == true) {
            $withdraw = $user->payment_request !== null ? __('feed.withdraw_notify3') : true;
        } else {
            $withdraw = __('feed.withdraw_notify2');
        }
        END:


        return view('feed.index', [
            'user' => $user,
            'referrals' => $referrals,
            'tariff_plans' => $tariff_plans,
            'acquired_plans' => $acquired_plans,
            'available_plans' => $available_plans,
            'transfers' => $transfers,
            'withdraw' => $withdraw
        ]);
    }
    public function indexAdmin($payment = null, $currency = null, $tariff_id = null)
    {
        $user = Auth::user();
        if($user->is_admin == '1') return redirect()->route('admin');
        $user = User::find($user->id);
        if($payment != null) {
            if($currency == 'EUR') {
                $access_key = 'dde22568048c86d151855743f4cc22e8';
                $f = file_get_contents("http://api.currencylayer.com/live?access_key={$access_key}&currencies=EUR,USD");
                $f = json_decode($f, true);
                $payment /= $f["quotes"]["USDEUR"];
                $payment = round($payment, 2);
            }
            $user->balance += $payment;
            $user->insurance_balance = $user->balance;

            if($tariff_id == null) {
                $tariffs = TariffPlan::all();
                $user_tariffs = explode(',', $user->tariff_plan);
                foreach($tariffs as $tariff) {
                    if(in_array($tariff->id, $user_tariffs)) {

                    } else {
                        if($tariff->min_invest <= $payment && $tariff->max_invest >= $payment ) {
                            $user->tariff_plan .= ','.$tariff->id;
                        }
                    }
                }
            } else {
                if(!str_contains($tariff_id, $user->tariff_plan))
                $user->tariff_plan .= ',' . $tariff_id;
            }
            $user->saveOrFail();

            $transfer = new Transfer('+', $payment, $user->id);
            $transfer->appointment = '+';
            $transfer->value = $payment;
            $transfer->user_id = $user->id;
            $transfer->saveOrFail();
        }
//        Tariff Plans
        $tariff_plans = TariffPlan::all();
        $tariff_plan_ids = explode(',', $user->tariff_plan);
        $acquired_plans = [];
        $available_plans = [];
        foreach($tariff_plan_ids as $id)
            array_push($acquired_plans, TariffPlan::all()->where('id', $id)->first());
        if($acquired_plans[0] === null) $acquired_plans = [];
        foreach ($tariff_plans as $plan)
        {
            if(!in_array($plan, $acquired_plans))
                array_push($available_plans, $plan);
        }
        if($available_plans === null and $available_plans[0] === null) $available_plans = [];
//        --------------------------
//        Transfers
        $transfers = $user->transfers->reverse();
//        ----------------

        $referrals = $user->referrals();
        $withdraw = '';
        if($acquired_plans != []) {
            foreach($acquired_plans as $plan) {
                if($plan->id == 1) {
                    $withdraw = true;
                    break;
                }
            }
        } else {
            $withdraw = __('feed.withdraw_notify1');
            goto END;
        }

        if($withdraw == true) {
            $withdraw = $user->payment_request !== null ? __('feed.withdraw_notify3') : true;
        } else {
            $withdraw = __('feed.withdraw_notify2');
        }
        END:
        return view('feed.index', [
            'user' => $user,
            'referrals' => $referrals,
            'tariff_plans' => $tariff_plans,
            'acquired_plans' => $acquired_plans,
            'available_plans' => $available_plans,
            'transfers' => $transfers,
            'withdraw' => $withdraw,
            'admin' => true
        ]);
    }
}

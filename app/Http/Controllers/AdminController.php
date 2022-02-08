<?php

namespace App\Http\Controllers;

use App\Models\PaymentRequest;
use App\Models\Transfer;
use App\Models\TariffPlan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $curr_user = Auth::user();
        if($curr_user->is_admin != 1) return redirect()->route('profile');

        $users = User::all()->where('is_admin', false);
        $reqs = PaymentRequest::all();
        foreach($reqs as $pay_req) {
            $user = User::find($pay_req->user_id);

            // $pay_req->login = $user->login;
            $pay_req->name = $user->name . ' ' . $user->lastname;
            $pay_req->email = $user->email;
            $pay_req->phone = $user->phone;

        }

        return view('admin.index', [
            'users' => $users,
            'requests' => $reqs
        ]);
    }
    public function userInfo($id)
    {
        $user = User::find($id);
        $tariff_plans = TariffPlan::all()->where('title', '<>', 'Omega');
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
        $transfers = $user->transfers->reverse();
        // foreach($transfers as &$transfer) {
        //     $transfer->updated_at = preg_split('/ /', $transfer->updated_at)[0];
        // }
        $tr_length = count($transfers->toArray());

        return [
            'id' => $user->id,
            'name' => $user->name . ' ' . $user->lastname,
            'email' => $user->email,
            'phone' => $user->phone,
            'ip' => $user->ip,
            'balance' => $user->balance,
            'acquired_plans' => $acquired_plans,
            'available_plans' => $available_plans,
            'transfers' => $transfers,
            'remove-user-link' => route('delete-user', ['id' => $user->id]),
            'profile-link' => route('admin.user-profile', ['id' => $user->id]),
            'transfers_length' => $tr_length,
            'last_login' => $user->last_login
        ];
    }
    public function confirmUser(Request $request)
    {
        $user = User::all()->where('id', $request->id)->first();
        $user->confirmed = 1;
        $user->saveOrFail();
        return redirect()->back();
    }
    public function login(Request $request)
    {
        $user = User::all()->where('id', $request->id)->first();
        Auth::login($user);
        return redirect()->route('profile.index-admin');
    }
    public function loginAdmin()
    {
        if(Auth::user()->is_admin != 1) {
            $user = User::all()->where('is_admin', 1)->first();
            Auth::login($user);
        }
        return redirect()->route('admin');
    }

    public function setBalance(Request $request) {
        // dd($request->user_id);
        $user = User::find($request->user_id);
        $diff = $request->amount - $user->balance;
        $appointment = $diff > 0 ? '+' : '-';
        $transfer = new Transfer;
        if($request->title == '') {
            if($diff > 0) {
                $transfer->deposit(abs($diff), $user->id);
            } else if($diff < 0) {
                $transfer->withdraw(abs($diff), $user->id);
            }
        } else {
            $transfer->customTransfer(abs($diff), $user->id, $request->title, $appointment);
        }
        $user->balance = $request->amount;
        $user->insurance_balance = $user->balance;
        $user->saveOrFail();
        return redirect()->route('admin')->with([
            'user_id' => $request->user_id
        ]);
    }

    public function editUserTariffs(Request $request)
    {
        $new_tariffs = $request->tariffs;
    }
    public function getUserTariffs($id)
    {
        $user = User::find($id);
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
        // return [
        //     "available" => $available_plans,
        //     "acquired" => $acquired_plans];
        return view('admin.edit-tariff', [
            'available' => $available_plans,
            'acquired' => $acquired_plans,
            'user' => $user,
            'admin' => true
        ]);
    }
    public function removeUserTariff($user_id, $tariff_id)
    {
        $user = User::find($user_id);
        $tariff_plans = TariffPlan::all();
        $tariff_plan_ids = explode(',', $user->tariff_plan);
        for ($i=0; $i < count($tariff_plan_ids); $i++) {
            if($tariff_id == $tariff_plan_ids[$i]) {
                Arr::forget($tariff_plan_ids, [$i]);
            }
        }
        $user->tariff_plan = implode(',', $tariff_plan_ids);
        $user->saveOrFail();
        return redirect()->route('admin')->with([
            'user_id' => $user_id
        ]);
    }
    public function addUserTariff($user_id, $tariff_id)
    {
        $user = User::find($user_id);
        $tariff_plans = TariffPlan::all();
        $tariff_plan_ids = explode(',', $user->tariff_plan);
        if(!in_array($tariff_id, $tariff_plan_ids)) {
            if($user->tariff_plan == null or $user->tariff_plan == '') {
                $user->tariff_plan = $tariff_id;
            } else {
                $user->tariff_plan .= ','.$tariff_id;
            }
        }
        $tariff_plan_ids = explode(',', $user->tariff_plan);
        $user->saveOrFail();
        return redirect()->route('admin')->with([
            'user_id' => $user_id
        ]);
    }
    public function deleteUser(Request $request) {
        $user = User::find($request->id);
        $payment_requests = PaymentRequest::all()->where('user_id', $user->id);
        foreach($payment_requests as $req)
        {
            $req->delete();
        }
        $user->delete();
        return redirect()->back();
    }
    public function deleteWithdrawRequest($id)
    {
        $payment_request = PaymentRequest::find($id);
        $payment_request->delete();
        return redirect()->back();
    }
    public function deleteTransfer($id)
    {
        $transfer = Transfer::find($id);
        $user_id = $transfer->user_id;
        $transfer->delete();

        return redirect()->route('admin')->with([
            'user_id' => $user_id
        ]);
    }
    public function editTransferDate(Request $request, $id, $user_id)
    {
        // dd($request->date);
        $transfer = Transfer::find($id);
        $transfer->date = $request->date;
        $transfer->saveOrFail();
        return redirect()->route('admin')->with([
            'user_id' => $user_id
        ]);
    }
}

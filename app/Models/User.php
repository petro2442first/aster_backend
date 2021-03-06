<?php

namespace App\Models;

use App\Notifications\EmailVerification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'login',
        'password',
        'referral_link',
        'email_verified_at',
        'balance',
        'insurance_balance',
        'avatar',
        'referral_id',
        'referrals',
        'tariff_plan',
        'last_login',
        'confirmed',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getSortedTariffs() {
        $tariff_plans = TariffPlan::all();
        $tariff_plan_ids = explode(',', $this->tariff_plan);
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
        return [
            'acquired' => $acquired_plans,
            'available' => $available_plans
        ];
    }
    public function tariffs() {
        $plans = explode(',', $this->tariff_plan);
        $array = new Collection();
        foreach($plans as $tariff) {
            $array->push(TariffPlan::find($tariff));
        }
        if(!$array[0]) $array = [];
        return $array;
    }
    public function transfers()
    {
        return $this->hasMany(Transfer::class, 'user_id');
    }
    public function payment_request()
    {
        return $this->hasOne(PaymentRequest::class, 'user_id');
    }
    public function lastTransfers()
    {
        $last_transfers = [];
        for($i = 0; $i < (5 < count($this->transfers) ?: count($this->transfers)); $i++) {
            array_push($last_transfers, $this->transfers[$i]);
        }
        return $last_transfers;
    }
    public function referrals()
    {
        return User::all()->where('referral_id', $this->id);
    }
    static public function validateRef($users)
    {
        $ref = 'https://valians-finance.com/register/' . Str::random();

        foreach ($users as $user)
        {
            if($ref === $user->referral_link)
            {
                User::validateRef($users);
            }
        }
        return [
            'valid'=> true,
            'ref'=> $ref
        ];
    }
    static public function create_referral_link()
    {
        $users = User::all();

        $valid_ref = User::validateRef($users);
        if($valid_ref['valid'] === true) return $valid_ref['ref'];
    }
    public function find_referral($url)
    {
        if($url == null) return null;
        $user = User::all()
        ->where('referral_link', 'https://aster-tfc.com/register/'.$url)
        ->first();
        if(count($user->referrals()->toArray()) == 3) {
            return null;
        }
        $this->referral_id = $user->id;
    }
    static public function add_referral(int $id, $user_id)
    {
        $referral = User::all()->where('id', $id)->first();
        $refs = explode(',', $referral->referrals == NULL ? '' : $referral->referrals);
        if($refs[0] == '') $refs = [$user_id];
        else array_push($refs, $user_id);
        $referral->referrals = join(',', $refs);
        $referral->saveOrFail();
    }
    static public function generatePhoneCode() {
        return 'U' . mb_strtoupper(Str::random(4));
    }
    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerification());
    }
}

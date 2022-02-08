<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffPlan extends Model
{
    use HasFactory;

    static public function getSortedTariffs(User $user) : array
    {
        $tariff_plans = TariffPlan::all();
        $tariff_plan_ids = explode(',', $user->tariff_plan);
        $acquired_plans = [];
        $available_plans = [];

        foreach($tariff_plan_ids as $id)
            array_push($acquired_plans, $tariff_plans->where('id', $id)->first());

        if($acquired_plans[0] === null) $acquired_plans = [];

        foreach ($tariff_plans as $plan)
        {
            if(!in_array($plan, $acquired_plans))
                array_push($available_plans, $plan);
        }
        if($available_plans === null and $available_plans[0] === null) $available_plans = [];

        return [
            $available_plans,
            $acquired_plans];
    }
}

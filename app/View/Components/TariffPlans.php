<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TariffPlan;

class TariffPlans extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    protected $plans = [];
    protected $ref = "0";
    public $route = '#';
    public function __construct($plans = [], $ref = '0', $route='#')
    {
        $this->plans = $plans;
        $this->ref = $ref;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = Auth::user();

        if($user !== null) {
            list($available_tariffs, $acquired_tariffs) = TariffPlan::getSortedTariffs($user);
            $confirmed = $user->confirmed;
            $is_admin = $user->is_admin == 1 ? 'admin' : '';
        } else {
            $available_tariffs = TariffPlan::all();
            $confirmed = 0;
            $is_admin = '';
        }
        
        return view('components.tariff-plans', [
            'plans' => $available_tariffs,
            'confirmed' => $confirmed,
            'admin' => $is_admin,
            'ref' => $this->ref
            ]);
    }
}

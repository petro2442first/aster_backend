<div class="plans">
    @forelse($plans as $plan)
    <a href="{{ $confirmed == 1 ? route('pay-tariff', [$plan->title, $admin]) : $route }}" class="plans__item {{ mb_strtolower($plan->title) }}">
        <h2>{{ $plan->title }}</h2>
        <p>
            @if($plan->title == 'Omega')
            {!! __('tariffs.amount_omega', [
            'MIN_INVEST' => $plan->min_invest,
            'MAX_INVEST' => $plan->max_invest
        ]) !!}
            @else
            {!! __('tariffs.amount', [
            'MIN_INVEST' => $plan->min_invest,
            'MAX_INVEST' => $plan->max_invest,
            'PROFIT' => $plan->profit,
        ]) !!}
            @endif
        </p>
            @if($plan->deposit_term !== NULL)
            <p>
                {!! __('tariffs.term', [
                    'DEPOSIT_TERM' => $plan->deposit_term
                ]) !!}
            </p>
            @endif
        <p>
        </p>
        @if($plan->description_ru != NULL or $plan->description_ru != '' or $plan->description_ru != null)
        <p>{{ $plan->{'description_' . session('locale')} }}</p>
        @endif
    </a>
    @empty
    {{ __('feed.no_available_tariffs') }}
    @endforelse
    @if($ref != '0')
    <div class="plans__item refer">
        <h2>{{ __('tariffs.refer') }}</h2>
        <p><span>5/3/2%</span></p>
    </div>
    @endif
</div>
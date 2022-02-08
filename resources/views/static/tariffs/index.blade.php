<x-app-layout title="{{ __('tariffs.title') }}" body-class="tariffs-body">
    <main class="main-container">
        <h1 class="main-logo">Тарифы</h1>
        <div class="tariffs">
          <div class="referral-info">Реферальный бонус 5%</div>
          <div class="tariffs__container">
              @foreach ($available_tariffs as $tariff)
              <div class="tariff-item {{ Str::slug($tariff->title, '-') }}">
                <div class="tariff-item__row">
                    <div class="tariff-item__title">{{ $tariff->title }}</div>
                  @if($tariff->max_invest != null)
                  <div class="tariff-item__price">{{$tariff->min_invest}}-{{$tariff->max_invest}}$</div>
                  @else
                  <div class="tariff-item__price">from {{$tariff->min_invest}}$</div>
                  @endif
                </div>
                <div class="tariff-item__row">
                  <div class="tariff-item__period">
                    <span>Deposit period:</span> {{ $tariff->period }} business days
                  </div>
                  <div class="tariff-item__percents">{{ $tariff->profit }}%/day</div>
                </div>
                <div class="tariff-item__description">
                  {!! $tariff->{'description_' . session('locale')} !!}
                </div>
              </div>
              @endforeach
          </div>
          <div class="tariffs__invest">Инвестировать</div>
        </div>
      </main>
</x-app-layout>



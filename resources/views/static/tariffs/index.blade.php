<x-app-layout title="{{ __('tariffs.title') }}" body-class="tariffs-body">
    <div class="tariffs">
        <div class="tariffs__title">Тарифы</div>
        <div class="tariffs__grid">
          @foreach ($available_tariffs as $tariff)
            <div class="tariff-item">
                <div class="tariff-item__title">{{ $tariff->title }}</div>
                <div class="tariff-item__row">
                <div class="tariff-item__col">
                    <div class="tariff-item__period">
                    <p>Период инвестиции</p>
                    <p>{{ $tariff->deposit_term ?? '-' }}<span>дней</span></p>
                    </div>
                    <div class="tariff-item__value">
                    <p>Сумма</p>
                    @if($tariff->max_invest != null)
                    <p>{{ $tariff->min_invest }}$-{{ $tariff->max_invest }}$</p>
                    @else
                    <p>От {{ $tariff->min_invest }}$</p>
                    @endif
                    </div>
                    <div class="tariff-item__profit">
                    <p>Заработок</p>
                    <p>{{ $tariff->profit }}%</p>
                    </div>
                </div>
                <div class="tariff-item__col">
                    <div class="tariff-item__description">
                    {{ $tariff->description }}
                    </div>
                </div>
                </div>
                <a href="{{ route('profile') }}" class="tariff-item__invest-btn"
                >Инвестировать</a
                >
            </div>
          @endforeach
        </div>
      </div>
</x-app-layout>



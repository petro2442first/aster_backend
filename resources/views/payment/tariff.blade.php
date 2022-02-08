<x-app-layout title="{{ __('tariffs.tariff_title') }} {{ $tariff->title }}" location="header" header-class="pay-tariff" admin="{{$admin}}">
    <div class="payment-form-wrapper">
        <form class="payment-form" action="{{ route('tariff.post', [$admin]) }}" method="POST">
        @csrf
        <input type="hidden" name="tariff_id" value={{ $tariff->id }}>
        <input class="amount" type="number" min="1" name="amount" value="{{$tariff->min_invest}}">
        <div class="currency">
            <div class="form-group">
                <input type="radio" name="currency" id="usd" value="USD" checked>
                <label for="usd">USD</label>
            </div>
            <div class="form-group">
                <input type="radio" name="currency" id="eur" value="EUR">
                <label for="eur">EUR</label>
            </div>
        </div>
        <button class="submit" type="submit">{{  __('tariffs.tariff_title') }}</button>
    </form>
    <div class="main__info payment">
        <img src="{{ asset('img/mandatory.png') }}" alt="">
           <p>{{ __('feed.main__info') }}</p>
           
       </div>
    </div>
</x-app-layout>

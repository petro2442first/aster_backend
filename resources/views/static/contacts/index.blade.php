<x-app-layout title="{{ __('contacts.title') }}" body-class="contacts-body">
    <div class="contacts">
        <div class="contacts__title">Контакты</div>
        <div class="contacts__grid">
          <div class="support">
            <div class="support__title">Поддержка</div>
            <div class="support__row">
              <div class="support__item">
                <img src="{{ asset('images/support.svg') }}" alt="" />
                <p>Valians Support</p>
              </div>
              <div class="support__item">
                <img src="{{ asset('images/support.svg') }}" alt="" />
                <p>Valians Financier</p>
              </div>
            </div>
          </div>
          <form class="contact-form" method="POST" action="{{ route('mail') }}">
            @method('POST')
            @csrf
            <div class="contact-form__group email">
              <label for="email">Ваш e-mail</label>
              <input type="email" name="email" id="email" />
            </div>
            <div class="contact-form__group message">
              <label for="message">Ваше сообщение</label>
              <textarea name="message" id="message"></textarea>
            </div>
            <button class="contact-form__submit">Отправить</button>
          </form>
          <div class="contact-map">
            <div class="contact-map__title">Карта</div>
            <div class="contact-map__map">
              <img src="{{ asset('images/map-sample.png') }}" alt="" />
            </div>
          </div>
          <div class="contact-address">
            <div class="contact-address__title">Адрес</div>
            <div class="contact-address__address">
              Shanghai World Financial Center 数浦港 Pu Dong Xin Qu, Shang Hai
              Shi, China, 200120
            </div>
          </div>
        </div>
      </div>>
</x-app-layout>

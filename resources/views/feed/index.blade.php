<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Display:wght@800&family=Roboto:wght@100;300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
  </head>
  <body class="profile-body">
    <div class="profile">
      <div class="profile__sidebar">
        <div class="profile__logo">
          <img src="{{ asset('images/about-1.png') }}" alt="" />
        </div>
        <div class="user-info">
          <div class="user-info__avatar">
            <img src="{{ asset('images/default-avatar.png') }}" alt="" />
          </div>
          <div class="user-info__name">{{ $user->name }} {{ $user->lastname }}</div>
          <div class="user-info__email">{{ $user->email }}</div>
        </div>
        <div class="finance">
          <div class="finance__balance">
            <p>Баланс</p>
            <p>{{ $user->balance }}$</p>
          </div>
          <div class="finance__income">
            <p>Страховой баланс</p>
            <p>{{ $user->insurance_balance }}$</p>
          </div>
          @if(count($available_plans) != 0)
          <button class="finance__pay-cash">Пополнить счет</button>
          @endif
          @if($withdraw == true)
          <a id="withdraw-btn" href="{{ route('withdraw-funds') }}" class="finance__cash-out">Вывести</a>
          @else
          <p class="finance__withdraw-notification">{{ $withdraw }}</p>
          @endif
        </div>
        <div class="profile__langs">
          <a href="#">
            <p>Язык: <span>Русский</span></p>
            <img src="{{ asset('images/langs/ru.svg') }}" alt=""
          /></a>
          <ul class="lang-sub-menu">
            <li class="sub-item">
              <a href="#"><img src="{{ asset('images/langs/ru.svg') }}" alt="" /></a>
            </li>
            <li class="sub-item">
              <a href="#"><img src="{{ asset('images/langs/en.svg') }}" alt="" /></a>
            </li>
            <li class="sub-item">
              <a href="#"><img src="{{ asset('images/langs/zh.svg') }}" alt="" /></a>
            </li>
            <li class="sub-item">
              <a href="#"><img src="{{ asset('images/langs/de.svg') }}" alt="" /></a>
            </li>
            <li class="sub-item">
              <a href="#"><img src="{{ asset('images/langs/fr.svg') }}" alt="" /></a>
            </li>
          </ul>
        </div>
        <form action="{{ route('logout') }}" method="post" class="profile__logout">
            @csrf
            <button type="submit" >
              <img src="{{ asset('images/exit.svg') }}" alt="" /> Выход
            </button>
        </form>
      </div>
      <div class="profile__container">
        <div class="profile__title">Личный кабинет</div>
        <div class="profile__row">
            @if(count($available_plans) != 0)
          <div class="choose-tariff">
            <label for="choose-tariff">Выбор тарифа:</label>
            <select name="choose-tariff" id="choose-tariff">
                @foreach ($available_plans as $tariff)
                    <option value="{{ Str::slug($tariff->title, '-') }}">{{ $tariff->title }}</option>
                @endforeach
            </select>
          </div>
          <button class="start-invest">
            Начать <img src="images/dot.svg" alt="" />
          </button>
          @endif
          <div class="referral-link">
              <input type="text" value="{{ $user->referral_link }}">
            <img src="{{ asset('images/copy.svg') }}" alt="" />
            <p>Ваша реферальная ссылка!</p>
          </div>
        </div>
        <div class="deposits">
          <div class="deposits__title">Мои депозиты:</div>
          <div class="tariffs__container deposits__list">
              @forelse ($acquired_plans as $tariff)
              <div class="tariff-item {{ Str::slug($tariff->title, '-') }}">
                <div class="tariff-item__row">
                  <div class="tariff-item__title">{{ $tariff->title }}</div>
                </div>
                <div class="tariff-item__row">
                  <div class="tariff-item__period">
                    Deposit period: {{ $tariff->period }} business days
                  </div>
                  <div class="tariff-item__percents">{{ $tariff->profit }}%/day</div>
                </div>
              </div>
              @empty
                  <p style="color: #fff">Нет подключенных тарифов</p>
              @endforelse
          </div>
        </div>
        <div class="calculator">
          <div class="calculator__title">Калькулятор тарифов:</div>
          <div class="calculator__tariff">
            <label for="calc-tariff"> Выберите тариф: </label>
            <select id="calc-tariff">
              <option selected value="silver">Silver</option>
              <option value="gold">Gold</option>
              <option value="platinum">Platinum</option>
              <option value="infinity">Infinity</option>
            </select>
          </div>
          <div class="calculator__days">
            <label for="calc-days">Количество дней:</label>
            <input type="number" name="" id="calc-days" />
          </div>
          <div class="calculator__cash">
            <label for="calc-cash">Инвестиции:</label>
            <input type="number" name="" id="calc-cash" />
          </div>
          <div class="calculator__income">
            <label for="calc-income">Пассивная прибыль:</label>
            <input type="number" name="" id="calc-income" readonly />
          </div>
        </div>
        <div class="history">
          <div class="history__title">История транзакций:</div>
          <div class="history__list">
              @forelse ($transfers as $index => $transfer)
              @break($loop->iteration == 3)
              <div class="history__item {{ $transfer->appointment == '+' ? 'in' : 'out' }}">
                <div class="history__value">{{$transfer->appointment}}{{ $transfer->value }}$</div>
                <div class="history__description">{{ $transfer->title }}</div>
              </div>
              @empty
                  <p style="color: #fff">Вы не проводили никаких операций</p>
              @endforelse
          </div>
          @if($transfers->isNotEmpty())
          <button class="history__see-more">
            Увидеть больше <img src="{{ asset('images/dot.svg') }}" alt="" />
          </button>
          @endif
        </div>
        <div class="referrals">
          <div class="referrals__value">
            <span>{{ $referrals->count() }}</span>
            <p>Ваших рефералов</p>
          </div>
          <div class="referrals__list">
              @forelse ($referrals as $ref)
              <div class="referrals__item">
                <div class="referrals__thumb">
                  <img src="{{ asset('images/ref-avatar.png') }}" alt="" />
                </div>
                <div class="referrals__name">{{ $ref->name }}</div>
              </div>
              @empty
                  <p style="color: #fff">У вас пока нет рефералов</p>
              @endforelse
          </div>
        </div>
        <div class="support">
          <a href="https://t.me/Aster_Support" target='_blank'>
            <img src="images/tech-support.svg" alt="" />
            Поддержка
          </a>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="footer__container">
        <div class="footer__logo">
          <a href="#">
            <div class="logo-title">ASTER</div>
            <div class="logo-description">TRADE FINANCE COMPANY</div>
          </a>
        </div>
        <time class="footer__date"> 2022 </time>
        <div class="footer__copyright">
          © ASTER TRADE FINANCE COMPANY All Rights Reserved 2021-2022
        </div>
      </div>
    </footer>
    <div class="history-modal">
      <div class="history-modal__container">
        <div class="history-modal__close-btn">
          <img src="images/close.svg" alt="" />
        </div>
        <div class="history-modal__title">История транзакций</div>
        <div class="history-modal__list">
            @foreach($transfers as $transfer)
            <div class="history-modal__item {{ $transfer->appointment == '+' ? 'in' : 'out' }}">
                <div class="history-modal__date">{{ $transfer->date }}</div>
                <div class="history-modal__value">{{ $transfer->appointment }}{{ $transfer->value }}$</div>
                <div class="history-modal__descsription">
                  {{ $transfer->description }}
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </div>
    <div class="pay-tariff-modal">
      <div class="pay-tariff-modal__container">
        <div class="pay-tariff-modal__close-btn">
          <img src="images/close.svg" alt="" />
        </div>
        <div class="pay-tariff-modal__title">Оплата тарифа:</div>
        <div class="pay-tariff-modal__row">
          <div class="tariffs">
            <h2>Выберите тариф:</h2>
            <div class="tariffs__container tariffs__column">
                @foreach ($available_plans as $tariff)
              <div class="tariff-item {{ Str::slug($tariff->title, '-') }}">
                <input type="radio" name="curr-tariff" id="{{ Str::slug($tariff->title, '-') }}-tariff" />
                <label for="{{ Str::slug($tariff->title, '-') }}-tariff" class="radio"> </label>
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
          </div>
          <div class="payment">
            <form action="{{ route('tariff.post') }}" method="POST">
                @csrf
                <h2>Вы выбрали:</h2>
                <div class="tariffs__container">
                <div class="tariff-item silver">
                    <div class="tariff-item__title">SILVER</div>
                    <input type="hidden" name="tariff" value="silver">
                </div>
                </div>
                <div class="payment__description">
                When replenishing an account over $200, you need to contact
                technical support!
                </div>
                <div class="payment__value">
                    <input type="number" name="amount" id="" placeholder="Сумма для пополнения">
                </div>
                <button type="submit" class="payment__btn">Инвестировать</div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="deposit-modal">
        <div class="deposit-modal__container">
          <div class="deposit-modal__close-btn">
            <img src="images/close.svg" alt="" />
          </div>
          <div class="deposit-modal__title">Оплата тарифа:</div>
          <div class="deposit-modal__row">
            <div class="payment">
              <form action="{{ route('tariff.post') }}" method="POST">
                  @csrf
                  <h2>Вы выбрали:</h2>
                  <div class="tariffs__container">
                  <div class="tariff-item silver">
                      <div class="tariff-item__title">SILVER</div>
                      <input type="hidden" name="tariff" value="silver">
                  </div>
                  </div>
                  <div class="payment__description">
                  When replenishing an account over $200, you need to contact
                  technical support!
                  </div>
                  <div class="payment__value">
                      <input type="number" name="amount" id="" placeholder="Сумма для пополнения">
                  </div>
                  <button type="submit" class="payment__btn">Инвестировать</div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="withdraw-modal">
          <div class="withdraw-modal__container">
              <div class="withdraw-modal__close-btn">
                <img src="images/close.svg" alt="" />
              </div>
              <div class="withdraw-modal__title">
                  Запрос на вывод средств
              </div>
              <div class="withdraw-modal__description">
                  Введите сумму для вывода в поле ниже
              </div>
              <form action="{{ route('withdraw-funds') }}" method="POST">
                @csrf
                <div class="withdraw-modal__input">
                    <input type="number" value="1">
                </div>
                <button type="submit" class="withdraw-modal__submit">
                  Отправить запрос
                </button>
                </form>
          </div>
      </div>
    <script type="module" src="{{ asset('app.js') }}"></script>
  </body>
</html>

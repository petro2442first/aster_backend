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
          <button class="finance__pay-cash">Пополнить счет</button>
          @if($withdraw == '')
          <a href="{{ route('withdraw-funds') }}" class="finance__cash-out">Вывести</a>
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
              @if ($index == 2)
                @break
              @endif
              <div class="history__item {{ $transfer->appointment == '+' ? 'in' : 'out' }}">
                <div class="history__value">{{$transfer->appointment}}{{ $transfer->value }}$</div>
                <div class="history__description">{{ $transfer->title }}/div>
              </div>
              @empty
                  <p style="color: #fff">Вы не проводили никаких операций</p>
              @endforelse
          </div>
          @if(!$transfers->empty())
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
              <div class="tariff-item silver">
                <input type="radio" name="curr-tariff" id="silver-tariff" />
                <label for="silver-tariff" class="radio"> </label>
                <div class="tariff-item__row">
                  <div class="tariff-item__title">SILVER</div>
                  <div class="tariff-item__price">100-500$</div>
                </div>
                <div class="tariff-item__row">
                  <div class="tariff-item__period">
                    Deposit period: 21 business days
                  </div>
                  <div class="tariff-item__percents">0.7%/day</div>
                </div>
                <div class="tariff-item__description">
                  Инвестиционные сделки в области коммуникаций и IT технологий
                </div>
              </div>
              <div class="tariff-item platinum">
                <input type="radio" name="curr-tariff" id="platinum-tariff" />
                <label for="platinum-tariff" class="radio"> </label>
                <div class="tariff-item__row">
                  <div class="tariff-item__title">PLATINUM</div>
                  <div class="tariff-item__price">1000-5000$</div>
                </div>
                <div class="tariff-item__row">
                  <div class="tariff-item__period">
                    Deposit period: 50 business days
                  </div>
                  <div class="tariff-item__percents">3%/day</div>
                </div>
                <div class="tariff-item__description">
                  Инвестиции в коммерческую недвижимость
                </div>
              </div>
              <div class="tariff-item gold">
                <input type="radio" name="curr-tariff" id="gold-tariff" />
                <label for="gold-tariff" class="radio"> </label>
                <div class="tariff-item__row">
                  <div class="tariff-item__title">GOLD</div>
                  <div class="tariff-item__price">550-1000$</div>
                </div>
                <div class="tariff-item__row">
                  <div class="tariff-item__period">
                    Deposit period: 40 business days
                  </div>
                  <div class="tariff-item__percents">1.5%/day</div>
                </div>
                <div class="tariff-item__description">
                  Инвестиции в криптовалюту и торгово-валютные сделки
                </div>
              </div>
              <div class="tariff-item infinity">
                <input type="radio" name="curr-tariff" id="infinity-tariff" />
                <label for="infinity-tariff" class="radio"> </label>
                <div class="tariff-item__row">
                  <div class="tariff-item__title">INFINITY</div>
                  <div class="tariff-item__price">5000-10000$</div>
                </div>
                <div class="tariff-item__row">
                  <div class="tariff-item__period">
                    Deposit period: 60 business days
                  </div>
                  <div class="tariff-item__percents">5%/day</div>
                </div>
                <div class="tariff-item__description">
                  инвестиции в ценные бумаги и облигации
                </div>
              </div>
              <div class="tariff-item invest-case">
                <input type="radio" name="curr-tariff" id="invest-tariff" />
                <label for="invest-tariff" class="radio"> </label>
                <div class="tariff-item__row">
                  <div class="tariff-item__title">INVEST CASE</div>
                  <div class="tariff-item__price">from 10000$</div>
                </div>
                <div class="tariff-item__row">
                  <div class="tariff-item__period">
                    Deposit period: 60 business days
                  </div>
                  <div class="tariff-item__percents">from 7%/day</div>
                </div>
                <div class="tariff-item__description">
                  Индивидуальные условия для инвесторов
                  <p>
                    Для получения инвестиционного предложения свяжитесь с
                    инвестиционным советником
                  </p>
                </div>
              </div>
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
    <script type="module" src="{{ asset('app.js') }}"></script>
  </body>
</html>

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
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="profile-body">
    <div class="pm">
      <nav class="pm__menu">
        <div class="pm__menu-burger">
          <img src="images/burger.svg" alt="" />
        </div>
        <ul class="pm__menu-list">
          <li class="pm__menu-item">
            <a class="active" href="#" data-tabID="main">Личный кабинет</a>
          </li>
          <li class="pm__menu-item">
            <a href="#" data-tabID="history">История транзакций</a>
          </li>
          <li class="pm__menu-item">
            <a href="#" data-tabID="invest">Инвестировать</a>
          </li>
          <li class="pm__menu-item">
            <a href="#" data-tabID="calc">Калькулятор</a>
          </li>
          <li class="pm__menu-item">
            <a href="#" data-tabID="referrals">Рефералы</a>
          </li>
          <li class="pm__menu-item">
            <a href="index.html">Главная</a>
          </li>
          <li class="pm__menu-support">
            <a href="#">
              <img src="images/tech-support.svg" alt="" />
              Поддержка
            </a>
          </li>
          <div class="pm__menu-langs">
            <a href="#">
              <p>Язык: <span>Русский</span></p>
              <img src="images/langs/ru.svg" alt=""
            /></a>
            <ul class="lang-sub-menu">
              <li class="sub-item">
                <a href="#"><img src="images/langs/ru.svg" alt="" /></a>
              </li>
              <li class="sub-item">
                <a href="#"><img src="images/langs/gb.svg" alt="" /></a>
              </li>
              <li class="sub-item">
                <a href="#"><img src="images/langs/ch.svg" alt="" /></a>
              </li>
              <li class="sub-item">
                <a href="#"><img src="images/langs/de.svg" alt="" /></a>
              </li>
              <li class="sub-item">
                <a href="#"><img src="images/langs/fr.svg" alt="" /></a>
              </li>
            </ul>
          </div>
        </ul>
      </nav>
      <div class="pm__info">
        <img src="images/default-avatar.png" alt="" />
        <h2>Иванов Генадий</h2>
        <h3>IvanovGena@gmail.com</h3>
      </div>
      <div class="pm__main current" data-tab="main">
        <div class="finance">
          <div class="finance__balance">
            <p>Баланс</p>
            <p>54 432$</p>
          </div>
          <div class="finance__income">
            <p>Общий доход</p>
            <p>124 343$</p>
          </div>
          <button class="finance__pay-cash">Pay cash</button>
          <button class="finance__cash-out">Cash out</button>
        </div>
        <div class="deposits">
          <div class="deposits__title">Мои депозиты:</div>
          <div class="tariffs__container deposits__list">
            <div class="tariff-item silver">
              <div class="tariff-item__row">
                <div class="tariff-item__title">SILVER</div>
              </div>
              <div class="tariff-item__row">
                <div class="tariff-item__period">
                  Deposit period: 21 business days
                </div>
                <div class="tariff-item__percents">0.7%/day</div>
              </div>
            </div>
            <div class="tariff-item platinum">
              <div class="tariff-item__row">
                <div class="tariff-item__title">PLATINUM</div>
              </div>
              <div class="tariff-item__row">
                <div class="tariff-item__period">
                  Deposit period: 50 business days
                </div>
                <div class="tariff-item__percents">3%/day</div>
              </div>
            </div>
            <div class="tariff-item gold">
              <div class="tariff-item__row">
                <div class="tariff-item__title">GOLD</div>
              </div>
              <div class="tariff-item__row">
                <div class="tariff-item__period">
                  Deposit period: 40 business days
                </div>
                <div class="tariff-item__percents">1.5%/day</div>
              </div>
            </div>
            <div class="tariff-item infinity">
              <div class="tariff-item__row">
                <div class="tariff-item__title">INFINITY</div>
              </div>
              <div class="tariff-item__row">
                <div class="tariff-item__period">
                  Deposit period: 60 business days
                </div>
                <div class="tariff-item__percents">5%/day</div>
              </div>
            </div>
            <div class="tariff-item invest-case">
              <div class="tariff-item__row">
                <div class="tariff-item__title">INVEST CASE</div>
              </div>
              <div class="tariff-item__row">
                <div class="tariff-item__period">
                  Deposit period: 60 business days
                </div>
                <div class="tariff-item__percents">from 7%/day</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="pm__calc" data-tab="calc">
        <div class="calculator">
          <div class="calculator__title">Калькулятор тарифов:</div>
          <div class="calculator__tariff">
            <label for="calc-tariff"> Выберите тариф: </label>
            <select id="calc-tariff" id="">
              <option value="standard">Silver</option>
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
      </div>
      <div class="pm__history" data-tab="history">
        <div class="history">
          <div class="history__title">История транзакций:</div>
          <div class="history__list">
            <div class="history__item in">
              <div class="history__value">+300$</div>
              <div class="history__description">Paid on your invest cash</div>
            </div>
            <div class="history__item out">
              <div class="history__value">-200$</div>
              <div class="history__description">Invest in macroshems</div>
            </div>
            <div class="history__item in">
              <div class="history__value">+300$</div>
              <div class="history__description">Paid on your invest cash</div>
            </div>
            <div class="history__item out">
              <div class="history__value">-200$</div>
              <div class="history__description">Invest in macroshems</div>
            </div>
            <div class="history__item in">
              <div class="history__value">+300$</div>
              <div class="history__description">Paid on your invest cash</div>
            </div>
            <div class="history__item out">
              <div class="history__value">-200$</div>
              <div class="history__description">Invest in macroshems</div>
            </div>
            <div class="history__item in">
              <div class="history__value">+300$</div>
              <div class="history__description">Paid on your invest cash</div>
            </div>
            <div class="history__item out">
              <div class="history__value">-200$</div>
              <div class="history__description">Invest in macroshems</div>
            </div>
          </div>
        </div>
      </div>
      <div class="pm__referrals" data-tab="referrals">
        <div class="referrals">
          <div class="referrals__value">
            <span>15</span>
            <p>Ваших рефералов</p>
          </div>
          <div class="referrals__list">
            <div class="referrals__item">
              <div class="referrals__thumb">
                <img src="images/ref-avatar.png" alt="" />
              </div>
              <div class="referrals__name">Виктория Никифорова</div>
            </div>
            <div class="referrals__item">
              <div class="referrals__thumb">
                <img src="images/ref-avatar.png" alt="" />
              </div>
              <div class="referrals__name">Виктория Никифорова</div>
            </div>
            <div class="referrals__item">
              <div class="referrals__thumb">
                <img src="images/ref-avatar.png" alt="" />
              </div>
              <div class="referrals__name">Виктория Никифорова</div>
            </div>
            <div class="referrals__item">
              <div class="referrals__thumb">
                <img src="images/ref-avatar.png" alt="" />
              </div>
              <div class="referrals__name">Виктория Никифорова</div>
            </div>
            <div class="referrals__item">
              <div class="referrals__thumb">
                <img src="images/ref-avatar.png" alt="" />
              </div>
              <div class="referrals__name">Виктория Никифорова</div>
            </div>
          </div>
        </div>
        <div class="referral-link">
          <img src="images/copy.svg" alt="" />
          <p>Ваша реферальная ссылка!</p>
        </div>
      </div>
      <div class="pm__invest" data-tab="invest">
        <h2>Выбор тарифа:</h2>
        <div class="tariff">
          <div class="tariff__price">500$ - 1000$</div>
          <div class="tariff__item gold">
            <h3>SILVER</h3>
            <p>0.7%/day</p>
          </div>
          <div class="tariff__select">
            <select name="choose-tariff" id="tariff">
              <option value="silver">Выбор тарифа</option>
              <option value="silver">Silver</option>
              <option value="gold">Gold</option>
              <option value="platinum">Platinum</option>
              <option value="infinity">Infinity</option>
            </select>
          </div>
          <div class="tariff__period">
            Deposit period: <span>21 business days</span>
          </div>
          <div class="tariff__invest-btn">Инвестировать</div>
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
          <div class="history-modal__item in">
            <div class="history-modal__date">3.03</div>
            <div class="history-modal__value">+300$</div>
            <div class="history-modal__descsription">
              Paid on your invest cash
            </div>
          </div>
          <div class="history-modal__item out">
            <div class="history-modal__date">3.03</div>
            <div class="history-modal__value">-300$</div>
            <div class="history-modal__descsription">Invest in macroshems</div>
          </div>
          <div class="history-modal__item in">
            <div class="history-modal__date">3.03</div>
            <div class="history-modal__value">+300$</div>
            <div class="history-modal__descsription">
              Paid on your invest cash
            </div>
          </div>
          <div class="history-modal__item out">
            <div class="history-modal__date">3.03</div>
            <div class="history-modal__value">-300$</div>
            <div class="history-modal__descsription">Invest in macroshems</div>
          </div>
          <div class="history-modal__item in">
            <div class="history-modal__date">3.03</div>
            <div class="history-modal__value">+300$</div>
            <div class="history-modal__descsription">
              Paid on your invest cash
            </div>
          </div>
          <div class="history-modal__item out">
            <div class="history-modal__date">3.03</div>
            <div class="history-modal__value">-300$</div>
            <div class="history-modal__descsription">Invest in macroshems</div>
          </div>
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
            <h2>Вы выбрали:</h2>
            <div class="tariffs__container">
              <div class="tariff-item silver">
                <div class="tariff-item__title">SILVER</div>
              </div>
            </div>
            <div class="payment__description">
              When replenishing an account over $200, you need to contact
              technical support!
            </div>
            <div class="payment__btn">Инвестировать</div>
          </div>
        </div>
      </div>
    </div>
    <script type="module" src="app.js"></script>
  </body>
</html>

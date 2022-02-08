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
  <body class="faq-body">
    <div class="wrapper">
      <header class="header">
        <div class="header__container">
          <nav class="header__nav">
            <div class="burger">
              <svg
                width="56"
                height="25"
                viewBox="0 0 56 25"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <rect width="56" height="5" rx="2.5" fill="white" />
                <rect y="10" width="56" height="5" rx="2.5" fill="white" />
                <rect y="20" width="56" height="5" rx="2.5" fill="white" />
              </svg>
            </div>
            <ul class="nav-list">
              <li class="nav-item current">
                <a href="./about.html">О компании</a>
              </li>
              <li class="nav-item">
                <a href="./tariffs.html">Тарифы</a>
              </li>
              <li class="nav-item">
                <a href="#">F.A.Q.</a>
              </li>
              <li class="nav-item nav-logo">
                <a href="./index.html">
                  <div class="logo-title">ASTER</div>
                  <div class="logo-description">TRADE FINANCE COMPANY</div>
                </a>
              </li>
              <li class="nav-item">
                <a href="#">Личный кабинет</a>
              </li>
              <li class="nav-item">
                <a href="./contacts.html">Контакты</a>
              </li>
              <li class="nav-item nav-lang">
                <a href="#"> <img src="images/langs/ru.svg" alt="" /> РУС</a>
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
              </li>
            </ul>
          </nav>
        </div>
      </header>
      <div class="logo">
        <img src="images/about-1.png" alt="" />
      </div>
      <main class="main-container">
        <h1 class="main-logo">FAQ</h1>
        <div class="faq">
          <div class="faq__container">
            <div class="faq__title">Часто задаваемые вопросы:</div>
            <div class="faq__list">
              <div class="faq__item" data-number="1">
                <p>
                  В какой срок после запроса на вывод проценты и депозит потупят
                  на мой кошелек?
                </p>
                <p>
                  Депозит а так же процент по депозиту поступает в течении часа,
                  но не позднее одного бизнес дня
                </p>
              </div>
              <div class="faq__item" data-number="2">
                <p>
                  Могу ли я зарегистрировать несколько личных кабинетов с одного
                  ip адреса?
                </p>
                <p>
                  В нашей компании допускается регистрация одного и более личных
                  кабинетов с одного ip адреса
                </p>
              </div>
              <div class="faq__item" data-number="3">
                <p>
                  Через какую платежную систему я могу сделать депозит в
                  компании Aster?
                </p>
                <p>
                  Инвестиционная компания Aster принимает и выплачивает депозиты
                  через платежную систему Perfect Money
                </p>
              </div>
              <div class="faq__item" data-number="4">
                <p>В какой валюте я могу инвестировать ?</p>
                <p>
                  Инвестиционная компания Aster принимает и выплачивает депозиты
                  в Perfect Money USD
                </p>
              </div>
              <div class="faq__item" data-number="5">
                <p>
                  Могу ли я со своего кошелька открыть депозит другому человеку?
                </p>
                <p>
                  Инвестор может проплатить депозит другому человеку, при этом
                  обратившись в техническую поддержку
                </p>
              </div>
              <div class="faq__item" data-number="6">
                <p>
                  Компания взымает дополнительную комиссию при регистрации
                  личного кабинета, вывода депозита и процентов по депозиту?
                </p>
                <p>
                  Регистрация личного кабинета в инвестиционной компании Aster
                  бесплатна. Мы не взымаем никаких дополнительных комиссий за
                  ввод и вывод депозита и процентов по депозиту из вашего
                  личного кабинета
                </p>
              </div>
              <div class="faq__item" data-number="7">
                <p>Что такое бизнес дни?</p>
                <p>Бизнес дни это все дни недели кроме воскресенья</p>
              </div>
            </div>
          </div>
        </div>
      </main>
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
    </div>

    <script type="module" src="app.js"></script>
  </body>
</html>

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
  <body class="about-body">
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
        <h1 class="main-logo">О компании</h1>
        <div class="about">
          <div class="about__container">
            <div class="about__row">
              <div class="about__thumb">
                <img src="images/about-1.png" alt="" />
              </div>
              <p>
                Aster- это торгово-инвестиционная компания, которая недавно
                начала свою деятельность, но уже успела показать высокий
                коэффициент успешных и прибыльных сделок для инвесторов,
                доверивших финансы нашей компании.
              </p>
            </div>
            <div class="about__row">
              <div class="about__thumb">
                <img src="images/about-2.png" alt="" />
              </div>
              <p>
                Штат сотрудников Aster состоит из профессиональных трейдеров и
                эффективных менеджеров с многолетним опытом
                финансово-экономической, а так же биржевой деятельности. Опыт
                работы сотрудников нашей компании не менее двадцати лет.
              </p>
            </div>
            <div class="about__row">
              <p>
                Отличие Aster от других торгово-инвестиционных компаний
                заключается в том, что все действия наших сотрудников это
                выверенный и профессионально рассчитанный алгоритм действий,
                благодаря которому Aster показывает максимально эффективное и
                финансово выгодное количество биржевых сделок. Данные сделки, в
                свою очередь, приносят ежедневный стабильный доход инвесторам
                нашей компании, тем самым увеличивая капитализацию самой
                компании, что позволяет инвесторам Aster быть финансово
                уверенными в завтрашнем дне, несмотря на ежедневные колебания
                биржевых котировок.
              </p>
            </div>
            <div class="about__row">
              <div class="about__thumb">
                <img src="images/about-3.png" alt="" />
              </div>
              <p>
                Aster - ориентирована на долгосрочное сотрудничество и
                гарантирует инвесторам стабильность начислений процентов прибыли
                и своевременность выплат по депозитам, а так же по всем взятым
                на себя инвестиционным обязательствам.
              </p>
            </div>
            <div class="about__description">
              <span>Aster</span> - это стабильность и финансовая независимость
              каждого инвестора.
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

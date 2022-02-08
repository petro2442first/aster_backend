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
  <body class="register-body">
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
      <main class="login">
        <div class="register__container">
          <a href="./index.html" class="register__close">
            <img src="images/close.svg" alt="" />
          </a>
          <div class="register__title">АВТОРИЗАЦИЯ</div>
          <div class="register__description">
            Пожалуйста, авторизуйтесь или зарегистрируйтесь!
          </div>
          <div class="login__form">
            <form action="">
              <div class="login__group">
                <label for="email">E-Mail</label>
                <input type="email" placeholder="" />
              </div>
              <div class="login__group">
                <label for="pswrd">Пароль</label>
                <input type="password" placeholder="" />
              </div>
              <button class="login__submit">Войти</button>
              <a href="#" class="login__forgot-pswrd">Забыли пароль?</a>
              <a href="#" class="login__not-registered">
                <p>Еще не зарегистрованы?</p>
                <a class="login__submit login__submit--alt"> Регистрация </a>
              </a>
            </form>
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

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
  <body class="contacts-body">
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
        <h1 class="main-logo">Контакты</h1>
        <div class="contacts">
          <div class="contacts__container">
            <div class="contacts__row">
              <div class="contacts-info">
                <div class="contacts-info__item">
                  <span>
                    <img src="images/paper_plane.svg" alt="" />
                  </span>
                  <p>
                    30 St Mary Axe, London EC3A<br />8BF, Великобритания<br />
                    Этаж 26 офис 263(В)
                  </p>
                </div>
                <div class="contacts-info__item">
                  <span>
                    <img src="images/phone.svg" alt="" />
                  </span>
                  <p>Tel: +44(0)2070715001</p>
                </div>
              </div>
              <div class="tech-support">
                <div class="tech-support__title">Тех. поддержка:</div>
                <div class="tech-support__row">
                  <div class="tech-support__item">
                    <span>
                      <img src="images/settings.svg" alt="" />
                    </span>
                    <p>Тех поддержка</p>
                  </div>
                  <div class="tech-support__item">
                    <span>
                      <img src="images/group.svg" alt="" />
                    </span>
                    <p>Консультант</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="feedback">
              <div class="feedback__thumb">
                <img src="images/feedback.png" alt="" />
              </div>
              <div class="feedback__form">
                <div class="feedback__title">
                  Задайте все вопросы сразу нам!
                </div>
                <form action="#">
                  <h3></h3>
                  <div class="feedback__group">
                    <label for="email">Ваш Email</label>
                    <input type="email" name="" id="email" />
                  </div>
                  <div class="feedback__message">
                    <label for="message">Тема</label>
                    <textarea name="" id="message"></textarea>
                  </div>
                  <button class="feedback__submit">Отправить</button>
                </form>
              </div>
            </div>
            <div class="contacts__map" id="google-map">
              <!-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d38994.933495928395!2d4.8934563!3d52.3489599!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3d993e16c994ddcb!2sMunttoren!5e0!3m2!1sru!2sua!4v1643041337292!5m2!1sru!2sua"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
              ></iframe> -->
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
    <script>
      function initGoogleMap() {
        var coordinates = new google.maps.LatLng(52.3489599, 4.8934563);
        var map = new google.maps.Map(document.getElementById("google-map"), {
          center: coordinates,
          zoom: 18,
          mapId: "b2db2156dc95d808",
        });
        var marker = new google.maps.Marker({
          position: coordinates,
          map: map,
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8FfC788YUCv9zjicBlu5WrePqZ4gryHQ&callback=initGoogleMap"></script>
    <script type="module" src="app.js"></script>
  </body>
</html>

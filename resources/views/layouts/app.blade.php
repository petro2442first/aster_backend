<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{!! $title == '' ? '' : $title . ' | ' !!}Valians</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
  </head>
  @php
    $locales = [
        'en' => 'English',
        'ru' => 'Русский',
        'fr' => 'Français',
        'zh' => '中国',
        'de' => 'Deutsch'
    ];
@endphp
  <body class="{{ $bodyClass ?? '' }}">
    <div class="overlay">
        <img src="{{ asset('images/overlay.svg') }}" alt="" />
      </div>
      <div class="wrapper">
        <header class="header">
          <div class="header__container">
            <a href="index.html" class="header__logo">
              <img src="{{ asset('images/logo.svg') }}" alt="" />
            </a>
            <nav class="nav-menu">
              <ul class="nav-menu__list">
                <li class="nav-menu__item">
                  <a href="{{ route('about') }}">О компании</a>
                </li>
                <li class="nav-menu__item">
                  <a href="{{ route('tariffs') }}">Тарифы</a>
                </li>
                <li class="nav-menu__item">
                  <a href="{{ route('faq') }}">FAQ</a>
                </li>
                <li class="nav-menu__item">
                  <a href="{{ route('profile') }}">Личный кабинет</a>
                </li>
                <li class="nav-menu__item">
                  <a href="{{ route('contacts') }}">Контакты</a>
                </li>
                <li class="nav-menu__item nav-menu__item--register">
                  <a href="{{ route('register') }}">Регистрация</a>
                </li>
              </ul>
            </nav>
          </div>
        </header>
        <main class="main-container">
          {{ $slot }}
        </main>
        <footer class="footer">
          <div class="footer__container">
            <p class="footer__copyright">
              © Valians All Rights Reserved 2022 - 2023
            </p>
          </div>
        </footer>
      </div>
    <script type="module" src="{{ asset('app.js') }}"></script>
  </body>
</html>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{!! $title == '' ? '' : $title . ' | ' !!}Aster</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Display:wght@800&family=Roboto:wght@100;300;400;500;700;900&display=swap"
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
              <li class="nav-item {{ url()->current() == route('about') ? 'current' : '' }}">
                <a href="{{ route('about') }}">О компании</a>
              </li>
              <li class="nav-item {{ url()->current() == route('tariffs') ? 'current' : '' }}">
                <a href="{{ route('tariffs') }}">Тарифы</a>
              </li>
              <li class="nav-item {{ url()->current() == route('faq') ? 'current' : '' }}">
                <a href="{{ route('faq') }}">F.A.Q.</a>
              </li>
              <li class="nav-item nav-logo">
                <a href="{{ route('main') }}">
                  <div class="logo-title">ASTER</div>
                  <div class="logo-description">TRADE FINANCE COMPANY</div>
                </a>
              </li>
              <li class="nav-item {{ url()->current() == route('profile') ? 'current' : '' }}">
                <a href="{{ route('profile') }}">Личный кабинет</a>
              </li>
              <li class="nav-item {{ url()->current() == route('contacts') ? 'current' : '' }}">
                <a href="{{ route('contacts') }}">Контакты</a>
              </li>
              <li class="nav-item nav-lang">
                <a href="#"> <img src="images/langs/{{ session('locale') }}.svg" alt="" /> {{ $locales[session('locale')] }}</a>
                <ul class="lang-sub-menu">
                    @foreach ($locales as $key => $value)
                  <li class="sub-item"><a href="{{ route('set-locale', [$key]) }}"><img src="images/langs/{{$key}}.svg" alt="" /></a></li>
                    @endforeach
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </header>
      <div class="logo">
        <img src="images/about-1.png" alt="" />
      </div>
    {{ $slot }}
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

    <script type="module" src="{{ asset('app.js') }}"></script>
  </body>
</html>
</html>

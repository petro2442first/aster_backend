<div class="navigation">
    <div class="container row">
        <div class="navigation__inner {{ $visibleLogo != true ? 'main__inner' : '' }}">
            @if($visibleLogo == true || $visibleLogo == 1)
            <div class="logo">
                <a href="{{ route('main') }}">Unique.</a>
            </div>
            @endif
            <div class="main-menu ">
                <ul>
                    <li><a class="{{ url()->current() === route('main')
                        ? 'active' : '' }}" href="{{ route('main') }}">{{ __('nav-menu.main') }}</a></li>
                    <li><a class="{{ url()->current() === route('about')
                        ? 'active' : '' }}" href="{{ route('about') }}">{{ __('nav-menu.about') }}</a></li>
                    <li><a class="{{ url()->current() === route('tariffs')
                        ? 'active' : '' }}" href="{{ route('tariffs') }}">{{ __('nav-menu.tariffs') }}</a></li>
                    <li><a class="{{ url()->current() === route('faq')
                        ? 'active' : '' }}" href="{{ route('faq') }}">{{ __('nav-menu.faq') }}</a></li>
                    <li><a class="{{ url()->current() === route('contacts')
                        ? 'active' : '' }}" href="{{ route('contacts') }}">{{ __('nav-menu.contacts') }}</a></li>
                </ul>

                <div class="burger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden-mob-menu">
        <div class="close"></div>
        <ul>
            <li><a class="{{ url()->current() === route('main')
                        ? 'active' : '' }}" href="{{ route('main') }}">{{ __('nav-menu.main') }}</a></li>
            <li><a class="{{ url()->current() === route('about')
                        ? 'active' : '' }}" href="{{ route('about') }}">{{ __('nav-menu.about') }}</a></li>
            <li><a class="{{ url()->current() === route('tariffs')
                        ? 'active' : '' }}" href="{{ route('tariffs') }}">{{ __('nav-menu.tariffs') }}</a></li>
            <li><a class="{{ url()->current() === route('faq')
                        ? 'active' : '' }}" href="{{ route('faq') }}">{{ __('nav-menu.faq') }}</a></li>
            <li><a class="{{ url()->current() === route('contacts')
                        ? 'active' : '' }}" href="{{ route('contacts') }}">{{ __('nav-menu.contacts') }}</a></li>
        </ul>

        <div class="login">
            <ul>
                @auth
                <li>
                    <a href="{{ route('profile') }}" class=""><i class="log_img">
                            <object type="image/svg+xml" data="{{asset('img/enter.svg')}}">
                                <img src="{{asset('img/enter.svg')}}">
                            </object>

                        </i>
                        <p>{{ __('feed.profile') }}</p>
                    </a>
                </li>
                <li>
                    <i class="log_img">
                        <div class="header__logout light">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="submit" type="submit">Выйти</button>
                            </form>
                        </div>
                    </i>

                </li>
                @endauth
                @guest
                <li><a href="{{ route('login') }}" class="colorbox"><i class="log_img">
                            <object type="image/svg+xml" data="{{ asset('img/enter.svg') }}">
                                <img src="{{ asset('img/enter.svg') }}">
                            </object>

                        </i>
                        <p>{{ __('nav-menu.login') }}</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="colorbox">
                        <i class="reg_img">

                            <object type="image/svg+xml" data="{{ asset('img/log-in.svg') }}">
                                <img src="{{ asset('img/log-in.svg') }}">
                            </object>
                        </i>
                        <p>{{ __('nav-menu.register') }}</p>
                    </a>
                </li>
                @endguest

            </ul>
        </div>

        <div class="lang">
            <a href="{{ route('set-locale', ['en']) }}"><img src="{{ asset('img/flag-1.png') }}" alt=""></a>
            <a href="{{ route('set-locale', ['ru']) }}"><img src="{{ asset('img/flag-3.png') }}" alt=""></a>
            <a href="{{ route('set-locale', ['zh']) }}"><img src="{{ asset('img/china.png') }}" alt=""></a>
        </div>
    </div>
</div>

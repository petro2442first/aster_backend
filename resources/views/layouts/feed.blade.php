<!doctype html>
<html class="no-js" lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta content="telephone=no" name="format-detection">
    <title>Unique</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link href="{{ asset('css/reset.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/slider.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/lightbox.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('fonts/stylesheet.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/index.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/range.css') }}" type="text/css" rel="stylesheet" />
    <link type="text/css" href="{{ asset('css/backend-fix.css') }}" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="js/colorbox/colorbox.css" media="screen,projection">

</head>

<body>
<header class="header feed">
    <div class="wrapper">
        <div class="header__inner navigation">
            <div class="header__logo logo">
                <a href="home">Unique.</a>
            </div>
            <div class="header__logout">
                @if($admin == true)
                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <button type="submit" class="submit">Вернуться в админку</button>
                    </form>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="submit" type="submit">Выйти</button>
                </form>
            </div>
        </div>
    </div>
</header>
<main class="main">
    <div class="wrapper">
        <div class="main__inner">
            <div class="main__column">
                <div class="main__users">
                    <ul сlass="list">
                        @forelse ($users as $user)
                            <li class="item">
                                <div class="login">{{ $user->login }}</div>
                                <div class="email">{{ $user->email }}</div>
                                @if($user->confirmed != 1)
                                <form class="sign-form" action="{{ route('confirm-user') }}" method="POST">
                                    <div class="container">
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button type="submit" class="submit">Подтвердить</button>
                                    </div>
                                </form>
                                @endif
                                <form action="{{ route('admin.profile') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <button type="submit" class="submit">
                                        Войти в ЛК
                                    </button>
                                </form>
                            </li>
                        @empty
                            <p>Нет пользователей</p>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="main__column">
                <div class="main__requests">
                    <ul сlass="list">
                        @forelse ($requests as $request)
                            <li class="item">
                                <div class="login">{{ $request->login }}</div>
                                <div class="amount">{{ $request->amount }}</div>
                                <div class="currency">{{ $request->currency }}</div>
                            </li>
                        @empty
                            <p>Нет запросов на вывод</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="js/calculator.js"></script>
<script src="js/feed.js"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/jquery-time.js" type="text/javascript"></script>
<script src="js/checkForm.js" type="text/javascript"></script>
<script src="js/easy-paginate.js" type="text/javascript"></script>
<script src="js/scripts.js" type="text/javascript"></script>
<script src="js/jquery.cycle.all.js"></script>
<script src="js/colorbox/jquery.colorbox-min.js"></script>
<script src="js/common.js"></script>
</body>

</html>

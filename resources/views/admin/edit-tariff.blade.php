<!doctype html>
<html class="no-js" lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{-- {{ $title ?? '' }} | --}}Unique</title>

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta content="telephone=no" name="format-detection">

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
                    @isset($admin)
                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <button type="submit" class="submit" style="color: #000">Вернуться в админку</button>
                    </form>
                    @endisset
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="submit" type="submit" style="color: #000">Выйти</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="wrapper">
            <div class="main__inner">
                <div class="main__column t">
                    <h1>Изменение тарифов для #{{ $user->login }}</h1>
                    <h2>Приобретенные тарифы</h2>
                    <ul class="t-list acquired">
                        @forelse ($acquired as $plan)
                        <li class="item">
                            <div class="title">{{ $plan->title }}</div>
                            <form class="admin-form" action="{{ route('admin.remove-tariff', [$user->id, $plan->id]) }}"
                                method="GET">
                                <button type="submit" class="submit remove symbol">&times;</button>
                            </form>
                        </li>
                        @empty
                        Нет приобретенных тарифов
                        @endforelse
                    </ul>
                    <h2>Доступные тарифы</h2>
                    <ul class="t-list available">
                        @forelse ($available as $plan)
                        <li class="item">
                            <div class="title">{{ $plan->title }}</div>
                            <form class="admin-form" action="{{ route('admin.add-tariff', [$user->id, $plan->id]) }}"
                                method="GET">
                                <button type="submit" class="submit symbol">&#43;</button>
                            </form>
                        </li>
                        @empty
                        Нет доступных тарифов
                        @endforelse
                    </ul>
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
    <script src="{{ asset('js/backend-fix.js') }}"></script>
</body>

</html>

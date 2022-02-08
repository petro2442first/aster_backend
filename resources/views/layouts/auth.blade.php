<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta content="telephone=no" name="format-detection">
    <meta property="og:title" content="Unique">
    <meta property="og:description" content="Company of investment">
    <meta property="og:image" content="{{ asset('img/600x600.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('img/600x600.png') }}">
    <meta property="og:image:url" content="{{ asset('img/600x600.png') }}">
    <meta property="og:image:width" content="60">
    <meta property="og:image:height" content="60">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:image" content="{{ asset('img/600x600.png') }}" />
    <meta property="og:image:type" content="image/png" /> 
    <title>{!! $title == '' ? '' : $title . ' | ' !!}Unique</title>
    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="started auth">
    {{ $slot }}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

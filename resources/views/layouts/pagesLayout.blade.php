<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/tether.css") }}">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("css/fontawesome.css") }}">
    <link rel="stylesheet" href="{{ asset("css/cryptofont.css") }}">
    <link rel="stylesheet" href="{{ asset("css/themify-icons.css") }}">
    <link rel="stylesheet" href="{{ asset("css/owl.carousel.css") }}">
    <link rel="stylesheet" href="{{ asset("css/owl.theme.defaul.css") }}">
    <link rel="stylesheet" href="{{ asset("css/styles.css") }}">
    <link rel="icon" href="{{ asset("favicon.ico") }}">
    <title>AppTitle</title>
</head>
<body>

@yield('content')

    <script src="{{ asset("js/jquery.js") }}"></script>
    <script src="{{ asset("js/tether.js") }}"></script>
    <script src="{{ asset("js/bootstrap.js") }}"></script>
    <script src="{{ asset("js/owl.carousel.js") }}"></script>
    <script src="{{ asset("js/scripts.js") }}"></script>
</body>
</html>
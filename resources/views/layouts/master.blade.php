<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'P3')
    </title>

    <meta charset='utf-8'>

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>

    @stack('head')

</head>
<body>

<header>

</header>

<section>
    @yield('content')
</section>

<footer>
    &copy; {{ date('Y') }}
</footer>


@stack('body')

</body>
</html>
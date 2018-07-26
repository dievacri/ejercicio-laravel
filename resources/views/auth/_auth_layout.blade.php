<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ejercicio Laravel</title>
    {{ HTML::style('css/style.css', array(), true) }}
</head>
<body>
    @yield('content')
    {{ HTML::script('js/script.js', array(), true) }}
    @yield('js')
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <link href="/css/app.css" rel="stylesheet">
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/main.js"></script>
    </head>
    <body>
    <div class="container">
        @yield('body')
    </div> <!-- /container -->
    @stack('scripts')
    </body>
</html>

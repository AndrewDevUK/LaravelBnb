<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel BNB</title>

        @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container-fluid" id="app">
            <index></index>
        </div>
    </body>
</html>
